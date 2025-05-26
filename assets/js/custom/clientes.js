"use strict";

$(document).ready(function () {

    $("#page-loader").hide();

    function showResult(result)
    {
        result["features"].forEach(element => {

            console.log(element);

            $(".clientCity").val(element["properties"]["city"]);
            $(".clientPostCode").val(element["properties"]["postcode"]);
            $(".clientCountry").val(element["properties"]["country"]);
            $(".clientCounty").val(element["properties"]["county"]);

        });
    }

    let controller = null;

    $("input[name='clientAddress']").on("keyup", function(){

        if(controller) {
            controller.abort("Cancelling previous request");
        }

        controller = new AbortController();
        const signal = controller.signal;

        let inputText = $(this).val();
        
        let requestOptions = {
            signal,
            method: 'GET',
        };

        console.log(inputText);

        fetch("https://api.geoapify.com/v1/geocode/autocomplete?text="+ inputText +"&type=street&apiKey=e94e44ae271e4a0ea83445285bef3aa5", requestOptions)
            .then(response => response.json())
            .then(result => {
                showResult(result);
            })
            .catch(error => {
                if (error.name === 'AbortError') {
                    console.log('Request was deliberately cancelled:', error.message);
                }
                else {
                    console.error('Fetch error:', error);
                }
            })
            .finally(() => {
                controller = null;
            });
    });

    $('.registerClient').on('click', function(e){

        console.log("Entrou!");

        let client = {
            "clientCode": $(".clientCode").val(),
            "clientName" : $(".clientName").val(),
            "clientNif" : $(".clientNif").val(),
            "clientAddress" : $(".clientAddress").val(),
            "clientCity" : $(".clientCity").val(),
            "clientPostCode" : $(".clientPostCode").val(),
            "clientCountry" : $(".clientCountry").val(),
            "clientCounty" : $(".clientCounty").val(),
            "clientLanguage" : $(".clientLanguage").val(),
            "clientEmail" : $(".clientEmail").val(),
            "clientPhoneNumber" : $(".clientPhoneNumber").val(),
            "clientGroup" : $(".clientGroup").val(),
            "clientObservations": $(".clientObservations").val()
        };

        let vehicle = {
            "vehicleLicensePlate" : $(".vehicleLicensePlate").val(),
            "vehicleBrand" : $(".vehicleBrand").val(),
            "vehicleModel" : $(".vehicleModel").val(),
            "vehicleYear" : $(".vehicleYear").val(),
            "vehicleChassi" : $(".vehicleChassi").val(),
            "vehicleObservations" : $(".vehicleObservations").val()
        };

        let clientData = {client, vehicle};

        $.ajax({
            type: "post",
            url: `${baseURL}clients/createClient`,
            data: clientData,
            dataType: "json",
            success: function(data) {
                console.log(data)
                
                if (data.error == true) {
                    $.each( data.popUpMessages, function(key, value) {
                        notyf.error(value);
                    });
                } else {
                    $.each(data.popUpMessages, function(key, value) {
                        notyf.success(value);
                    });
                }
            },
            error: function(xhr, status, error){
                console.log(xhr);
                console.log(status);
                console.log(error);

                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
            }
        });

    });

    var clientsTable = new DataTable("#clientList", {
        responsive: true,
        ajax: {
            url: `${baseURL}clients/populateClientsTable`,
            type: 'GET',
            dataSrc: '',
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
                console.error('Status:', status);
                console.error('Response:', xhr);
            }
        },
        columnDefs: [
            { targets: '_all', className: 'align-middle' }
        ],
        columns: [
            { data: 'client_code', title: 'Código' },
            { data: 'client_nif', title: 'NIF' },
            { data: 'client_name', title: 'Nome' },
            { data: 'actions', title: 'Ações' }
        ],
        processing: true,
        serverSide: false,
        dom: 'Brtip',
        pageLength: 10
    });

    $('#searchClient').on('keyup', function () {
        clientsTable.search(this.value).draw();
    });

   var contacts = [];
var vehicles = [];
var selectContact, selectVehicle;

$(document).on('click', '.consultarButton', function(e) {
    let codigo = $(this).data('code');
    console.log(codigo);

    $.ajax({
        type: "post",
        url: `${baseURL}clients/getClientInfoByCode`,
        data: {
            'client_code': codigo
        },
        dataType: "json",
        success: function (response) {
            console.log("Response received:", response);

            // Fill client data
            $('.checkClientCode').val(response['client']['client_code']);
            $('.checkClientName').val(response['client']['client_name']);
            $('.checkClientNif').val(response['client']['client_nif']);
            $('.checkClientAddress').val(response['client']['client_address']);
            $('.checkClientCity').val(response['client']['client_city']);
            $('.checkClientPostCode').val(response['client']['client_post_code']);
            $('.checkClientCountry').val(response['client']['client_country']);
            $('.checkClientCounty').val(response['client']['client_county']);
            $('.checkClientLanguage').val(response['client']['client_language']);
            $('.checkClientObservations').val(response['client']['client_observations']);

            // Clear existing data
            contacts = [];
            vehicles = [];

            // Destroy existing TomSelect instances if they exist
            if (selectContact) {
                selectContact.destroy();
                selectContact = null;
            }
            if (selectVehicle) {
                selectVehicle.destroy();
                selectVehicle = null;
            }

            // Process contacts and create TomSelect
            let contactsOptions = [];
            if (response['contacts'] && response['contacts'].length > 0) {
                response['contacts'].forEach(element => {
                    contacts.push(element);
                    contactsOptions.push({
                        value: element.contact_id.toString(),
                        text: element.contact_description || `Contact ${element.contact_id}`
                    });
                });

                console.log("Creating contact TomSelect with options:", contactsOptions);

                // Create contact TomSelect with data
                selectContact = new TomSelect('#checkSelectContacto', {
                    options: contactsOptions,
                    maxItems: 1,
                    dropdownClass: 'dropdown-menu ts-dropdown',
                    optionClass: 'dropdown-item',
                    dropdownParent: 'body',
                    placeholder: 'Select a contact...',
                    onChange: function(value) {
                        console.log("Contact selected:", value);
                        if (!value) return;
                        
                        const selectedId = parseInt(value);
                        const selectedContact = contacts.find(contact => contact.contact_id === selectedId);
                        console.log("Found contact:", selectedContact);

                        if (selectedContact) {
                            // Update based on your actual contact data structure
                            document.getElementById("name").value = selectedContact.contact_name || '';
                            document.getElementById("email").value = selectedContact.contact_email || '';
                            document.getElementById("phone").value = selectedContact.contact_phone || '';
                        } else {
                            document.getElementById("name").value = "";
                            document.getElementById("email").value = "";
                            document.getElementById("phone").value = "";
                        }
                    }
                });
            } else {
                console.log("No contacts found in response");
            }

            // Process vehicles and create TomSelect
            let vehiclesOptions = [];
            if (response['vehicles'] && response['vehicles'].length > 0) {
                response['vehicles'].forEach(element => {
                    vehicles.push(element);
                    vehiclesOptions.push({
                        value: element.vehicle_id.toString(),
                        text: element.vehicle_license_plate || `Vehicle ${element.vehicle_id}`
                    });
                });

                console.log("Creating vehicle TomSelect with options:", vehiclesOptions);

                // Create vehicle TomSelect with data
                selectVehicle = new TomSelect('#selectVehicle', {
                    options: vehiclesOptions,
                    maxItems: 1,
                    dropdownClass: 'dropdown-menu ts-dropdown',
                    optionClass: 'dropdown-item',
                    dropdownParent: 'body',
                    placeholder: 'Select a vehicle...',
                    onChange: function(value) {
                        console.log("Vehicle selected:", value);
                        if (!value) return;
                        
                        const selectedId = parseInt(value);
                        const selectedVehicle = vehicles.find(vehicle => vehicle.vehicle_id === selectedId);
                        console.log("Found vehicle:", selectedVehicle);

                        if (selectedVehicle) {
                            // Update these field IDs to match your actual form
                            document.getElementById("vehicleName").value = selectedVehicle.vehicle_name || '';
                            document.getElementById("vehiclePlate").value = selectedVehicle.vehicle_license_plate || '';
                            document.getElementById("vehicleModel").value = selectedVehicle.vehicle_model || '';
                        } else {
                            document.getElementById("vehicleName").value = "";
                            document.getElementById("vehiclePlate").value = "";
                            document.getElementById("vehicleModel").value = "";
                        }
                    }
                });
            } else {
                console.log("No vehicles found in response");
            }

            console.log("TomSelect instances created successfully");
        },
        error: function (xhr, status, error) {
            console.log("AJAX Error:");
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
});
});
