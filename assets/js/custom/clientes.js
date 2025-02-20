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
    var contactsOptions = [];

    var vehicles = [];
    var vehiclesOptions = [];

    var selectContact = new TomSelect('#selectContacto', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        // onChange: () => {
        //     const selectedId = parseInt(this.value); // Get the selected contact ID
        //     const selectedContact = contacts.find(contact => contact.id === selectedId);

        //     if (selectedContact) {
        //         // Fill the input fields with the selected contact's details
        //         document.getElementById("name").value = selectedContact.name;
        //         document.getElementById("email").value = selectedContact.email;
        //         document.getElementById("phone").value = selectedContact.phone;
        //     } else {
        //         // Clear the input fields if no contact is selected
        //         document.getElementById("name").value = "";
        //         document.getElementById("email").value = "";
        //         document.getElementById("phone").value = "";
        //     }
        // }
    });

    var selectVehicle = new TomSelect('#selectVehicle', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        // onChange: () => {
        //     const selectedId = parseInt(this.value); // Get the selected contact ID
        //     const selectedContact = contacts.find(contact => contact.id === selectedId);

        //     if (selectedContact) {
        //         // Fill the input fields with the selected contact's details
        //         document.getElementById("name").value = selectedContact.name;
        //         document.getElementById("email").value = selectedContact.email;
        //         document.getElementById("phone").value = selectedContact.phone;
        //     } else {
        //         // Clear the input fields if no contact is selected
        //         document.getElementById("name").value = "";
        //         document.getElementById("email").value = "";
        //         document.getElementById("phone").value = "";
        //     }
        // }
    });


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
                console.log(response);

                $('.clientCode').val(response['client']['client_code']);
                $('.clientName').val(response['client']['client_name']);
                $('.clientNif').val(response['client']['client_nif']);
                $('.clientAddress').val(response['client']['client_address']);
                $('.clientCity').val(response['client']['client_city']);
                $('.clientPostCode').val(response['client']['client_post_code']);
                $('.clientCountry').val(response['client']['client_country']);
                $('.clientCounty').val(response['client']['client_county']);
                $('.clientLanguage').val(response['client']['client_language']);
                $('.clientObservations').val(response['client']['client_observations']);


                response['contacts'].forEach(element => {
                    contacts.push(element);

                    var item = {value: element.contact_id, text: element.contact_description};
                    contactsOptions.push(item);
                });

                console.log("contact options: ")
                console.log(contactsOptions)

                selectContact.clearOptions();
                selectContact.addOptions(contactsOptions);
                selectContact.sync();

                response['vehicles'].forEach(element => {
                    vehicles.push(element);
                    vehiclesOptions.push({value: element.vehicle_id, text: element.vehicle_license_plate});
                });

                selectVehicle.clearOptions();
                selectVehicle.addOptions(vehiclesOptions);
                selectVehicle.sync();
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });
});
