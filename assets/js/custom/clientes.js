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

    $(document).on('click', '.registerClient',function(e){

        console.log("Entrou!");

        let client = {
            "clientName" : $(".clientName").val(),
            "clientNif" : $(".clientNif").val(),
            "clientAddress" : $(".clientAddress").val(),
            "clientCity" : $(".clientCity").val(),
            "clientPostCode" : $(".clientPostCode").val(),
            "clientCountry" : $(".clientCountry").val(),
            "clientCounty" : $(".clientCounty").val(),
            "clientLanguage" : $(".clientLanguage").val(),
            "clientObservations": $(".clientObservations").val()
        };

        let contact = {
            "contactEmail" : $(".contactEmail").val(),
            "contactMobileNumber" : $(".contactMobileNumber").val(),
            "contactPhoneNumber" : $(".contactPhoneNumber").val()
        }

        let vehicle = {
            "vehicleLicensePlate" : $(".vehicleLicensePlate").val(),
            "vehicleBrand" : $(".vehicleBrand").val(),
            "vehicleModel" : $(".vehicleModel").val(),
            "vehicleYear" : $(".vehicleYear").val(),
            "vehicleChassi" : $(".vehicleChassi").val(),
            "vehicleObservations" : $(".vehicleObservations").val()
        };

        let clientData = {client, contact, vehicle};

        console.log(clientData);

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

                location.reload();
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

        $('.checkClientCode').val("");
        $('.checkClientName').val("");
        $('.checkClientNif').val("");
        $('.checkClientAddress').val("");
        $('.checkClientCity').val("");
        $('.checkClientPostCode').val("");
        $('.checkClientCountry').val("");
        $('.checkClientCounty').val("");
        $('.checkClientLanguage').val("");
        $('.checkClientObservations').val("");

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

                document.getElementById("checkContactEmail").value = '';
                document.getElementById("checkContactMobileNumber").value = '';
                document.getElementById("checkContactPhoneNumber").value = '';
                document.getElementById("checkContactObservations").value = '';

                document.getElementById("checkVehicleBrand").value = '';
                document.getElementById("checkVehicleModel").value = ''
                document.getElementById("checkVehicleYear").value = '';
                document.getElementById("checkVehicleChassi").value = ''
                document.getElementById("checkVehicleObservations").value = '';

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
                            
                            const selectedId = value;
                            const selectedContact = contacts.find(contact => contact.contact_id === selectedId);
                            console.log("Found contact:", selectedContact);

                            if (selectedContact) {
                                // Update based on your actual contact data structure
                                document.getElementById("checkContactEmail").value = selectedContact.contact_email || '';
                                document.getElementById("checkContactMobileNumber").value = selectedContact.contact_mobile_number || '';
                                document.getElementById("checkContactPhoneNumber").value = selectedContact.contact_phone_number || '';
                                document.getElementById("checkContactObservations").value = selectedContact.contact_observations || '';
                            } else {
                                document.getElementById("checkContactEmail").value = '';
                                document.getElementById("checkContactMobileNumber").value = '';
                                document.getElementById("checkContactPhoneNumber").value = '';
                                document.getElementById("checkContactObservations").value = '';
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
                            
                            const selectedId = value;
                            const selectedVehicle = vehicles.find(vehicle => vehicle.vehicle_id === selectedId);
                            console.log("Found vehicle:", selectedVehicle);

                            if (selectedVehicle) {
                                // Update these field IDs to match your actual form
                                document.getElementById("checkVehicleBrand").value = selectedVehicle.vehicle_brand || '';
                                document.getElementById("checkVehicleModel").value = selectedVehicle.vehicle_model || '';
                                document.getElementById("checkVehicleYear").value = selectedVehicle.vehicle_year || '';
                                document.getElementById("checkVehicleChassi").value = selectedVehicle.vehicle_chassi || '';
                                document.getElementById("checkVehicleObservations").value = selectedVehicle.vehicle_observations || '';
                            } else {
                                document.getElementById("checkVehicleBrand").value = '';
                                document.getElementById("checkVehicleModel").value = ''
                                document.getElementById("checkVehicleYear").value = '';
                                document.getElementById("checkVehicleChassi").value = ''
                                document.getElementById("checkVehicleObservations").value = '';
                            }
                        }
                    });
                } else {
                    console.log("No vehicles found in response");
                }

                console.log("TomSelect instances created successfully");

                $(".ts-dropdown").css("z-index", "9999");
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error:");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    var contacts = [];
    var vehicles = [];
    var selectContact, selectVehicle;

    $(document).on('click', '.editarButton', function(e) {
        let codigo = $(this).data('code');
        console.log(codigo);

        $('.editClientCode').val("");
        $('.editClientName').val("");
        $('.editClientNif').val("");
        $('.editClientAddress').val("");
        $('.editClientCity').val("");
        $('.editClientPostCode').val("");
        $('.editClientCountry').val("");
        $('.editClientCounty').val("");
        $('.editClientLanguage').val("");
        $('.editClientObservations').val("");

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
                $('.editClientCode').val(response['client']['client_code']);
                $('.editClientName').val(response['client']['client_name']);
                $('.editClientNif').val(response['client']['client_nif']);
                $('.editClientAddress').val(response['client']['client_address']);
                $('.editClientCity').val(response['client']['client_city']);
                $('.editClientPostCode').val(response['client']['client_post_code']);
                $('.editClientCountry').val(response['client']['client_country']);
                $('.editClientCounty').val(response['client']['client_county']);
                $('.editClientLanguage').val(response['client']['client_language']);
                $('.editClientObservations').val(response['client']['client_observations']);

                document.getElementById("editContactEmail").value = '';
                document.getElementById("editContactMobileNumber").value = '';
                document.getElementById("editContactPhoneNumber").value = '';
                document.getElementById("editContactObservations").value = '';

                document.getElementById("editVehicleBrand").value = '';
                document.getElementById("editVehicleModel").value = ''
                document.getElementById("editVehicleYear").value = '';
                document.getElementById("editVehicleChassi").value = ''
                document.getElementById("editVehicleObservations").value = '';

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
                    selectContact = new TomSelect('#editSelectContacto', {
                        options: contactsOptions,
                        maxItems: 1,
                        dropdownClass: 'dropdown-menu ts-dropdown',
                        optionClass: 'dropdown-item',
                        dropdownParent: 'body',
                        placeholder: 'Select a contact...',
                        onChange: function(value) {
                            console.log("Contact selected:", value);
                            if (!value) return;
                            
                            const selectedId = value;
                            const selectedContact = contacts.find(contact => contact.contact_id === selectedId);
                            console.log("Found contact:", selectedContact);

                            if (selectedContact) {
                                // Update based on your actual contact data structure
                                document.getElementById("editContactEmail").value = selectedContact.contact_email || '';
                                document.getElementById("editContactMobileNumber").value = selectedContact.contact_mobile_number || '';
                                document.getElementById("editContactPhoneNumber").value = selectedContact.contact_phone_number || '';
                                document.getElementById("editContactObservations").value = selectedContact.contact_observations || '';
                            } else {
                                document.getElementById("editContactEmail").value = '';
                                document.getElementById("editContactMobileNumber").value = '';
                                document.getElementById("editContactPhoneNumber").value = '';
                                document.getElementById("editContactObservations").value = '';
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
                    selectVehicle = new TomSelect('#editSelectVehicle', {
                        options: vehiclesOptions,
                        maxItems: 1,
                        dropdownClass: 'dropdown-menu ts-dropdown',
                        optionClass: 'dropdown-item',
                        dropdownParent: 'body',
                        placeholder: 'Select a vehicle...',
                        onChange: function(value) {
                            console.log("Vehicle selected:", value);
                            if (!value) return;
                            
                            const selectedId = value;
                            const selectedVehicle = vehicles.find(vehicle => vehicle.vehicle_id === selectedId);
                            console.log("Found vehicle:", selectedVehicle);

                            if (selectedVehicle) {
                                // Update these field IDs to match your actual form
                                document.getElementById("editVehicleBrand").value = selectedVehicle.vehicle_brand || '';
                                document.getElementById("editVehicleModel").value = selectedVehicle.vehicle_model || '';
                                document.getElementById("editVehicleYear").value = selectedVehicle.vehicle_year || '';
                                document.getElementById("editVehicleChassi").value = selectedVehicle.vehicle_chassi || '';
                                document.getElementById("editVehicleObservations").value = selectedVehicle.vehicle_observations || '';
                            } else {
                                document.getElementById("editVehicleBrand").value = '';
                                document.getElementById("editVehicleModel").value = ''
                                document.getElementById("editVehicleYear").value = '';
                                document.getElementById("editVehicleChassi").value = ''
                                document.getElementById("editVehicleObservations").value = '';
                            }
                        }
                    });
                } else {
                    console.log("No vehicles found in response");
                }

                console.log("TomSelect instances created successfully");

                $(".ts-dropdown").css("z-index", "9999");
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error:");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    $(document).on('click', '.deleteClientButton', function(e) {
        let codigo = $(this).data('id');
        console.log(codigo);

        $.ajax({
            type: "post",
            url: `${baseURL}clients/deleteClient`,
            data: {
                'client_code': codigo
            },
            dataType: "json",
            success: function (response) {
                console.log("Response received:", response);
                if (response.error == true) {
                    $.each(response.popUpMessages, function(key, value) {
                        notyf.error(value);
                    });
                } else {
                    $.each(response.popUpMessages, function(key, value) {
                        notyf.success(value);
                    });
                }
                location.reload();
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