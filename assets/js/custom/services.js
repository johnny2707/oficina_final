"use strict";

$(document).ready(function () {

    $("#page-loader").hide();

    let tomselect = new TomSelect('#selectVehicle', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onChange: () => {
            $.ajax({
                type: "post",
                url: `${baseURL}vehicles/getVehicleByLicensePlate`,
                data: {
                    license_plate: $("#selectVehicle").val()
                },
                dataType: "json",
                success: function (response) {
                    if(response.length === 0) {
                        notyf.error('Unable to fetch vehicle data.');
                    }
                    else {
                        
                        $('.vehicleBrand').val(response[0]['vehicle_brand']);
                        $('.vehicleModel').val(response[0]['vehicle_model']);
                        $('.vehicleYear').val(response[0]['vehicle_year']);
                        $('.vehicleChassi').val(response[0]['vehicle_chassi']);

                    }
                }
            });
        }
    });

    var vehicleOptions;
    var clientsOptions = [];

    let selectClient = new TomSelect('#selectClient', {
        options: [],
        onInitialize: () =>{
            $.ajax({
                type: "get",
                url: `${baseURL}clients/getAllClients`,
                success: function (data) {
                    if (data.length === 0) {
                        clientsOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.client_code, text: "C" + element.client_code}
                            clientsOptions.push(newItem);
                        });

                        console.log(clientsOptions)
                        selectClient.addOptions(clientsOptions)
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    console.log(status)
                    console.log(error)
                }
            });
        },
        onChange: () => {
            vehicleOptions = [];
            tomselect.setValue('', true);
            tomselect.clearOptions();
    
            if($('#selectClient').val() != "") {

                $.ajax({
                    type: "post",
                    url: `${baseURL}clients/getClientInfoByCode`,
                    data: {
                        client_code: $('#selectClient').val()
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.length === 0) {
                            notyf.error("Couldn't fetch client data.");
                        } 
                        else {
                            console.log(data);
                            
                            $('.clientName').val(data[0]['client_name']);
                            $('.clientNif').val(data[0]['client_nif']);
                            $('.clientAddress').val(data[0]['client_address']);
                            $('.clientCity').val(data[0]['client_city']);
                            $('.clientPostCode').val(data[0]['client_post_code']);
                            $('.clientCounty').val(data[0]['client_county']);
                            $('.clientCountry').val(data[0]['client_country']);
                            $('.clientPhoneNumber').val(data[0]['contact_phone_number']);
                            $('.clientEmail').val(data[0]['contact_email']);
                            
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
    
                        notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                    }
                });
    
                $.ajax({
                    type: "post",
                    url: `${baseURL}clients/getVehiclesByCode`,
                    data: {
                        codigo: $('#selectClient').val()
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.length === 0) {
                            vehicleOptions.push({value: 0, text: "no items found"})
                        } 
                        else {
                            data.forEach(element => {
                                console.log(element);
            
                                var newItem = {value: element.vehicle_license_plate, text: element.vehicle_license_plate}
                                vehicleOptions.push(newItem);
                            });
    
                            tomselect.addOptions(vehicleOptions);
                            tomselect.sync();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
    
                        notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                    }
                });
            }
        },
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    });

    $(".ts-dropdown").css("z-index", "9999");
});