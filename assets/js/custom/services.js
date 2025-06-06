"use strict";

$(document).ready(function () {

    $("#page-loader").hide();

    $(document).on('click', '.createServiceBtn', function() {

        console.log("Create Service Button Clicked");

        const serviceData = {
            service_name: $('#service_name').val(),
            service_price: $('#service_price').val(),
            service_description: $('#service_description').val(),
            service_duration: $('#service_duration').val(),
            service_status: $('#service_status').val(),
            products: []
        };

        // Collect all products
        $('.product-row').each(function() {
            const productData = {
                product_id: $(this).find('.product-select').val(),
                product_quantity: $(this).find('.product-quantity').val()
            };

            console.log(productData);

            if (productData.product_id && productData.product_quantity) {
                serviceData.products.push(productData);
            }
        });

        // Validation
        if (!serviceData.service_name || !serviceData.service_price || 
            !serviceData.service_description || !serviceData.service_duration || 
            !serviceData.service_status) {
            notyf.error('Por favor, preencha todos os campos obrigatórios.');
            return;
        }

        $.ajax({
            type: "post",
            url: `${baseURL}services/createService`,
            data: serviceData,
            dataType: "json",
            success: function(response) {
                if (!response.error) {
                    notyf.success('Serviço criado com sucesso!');
                    // Reset form
                    $('#service_name, #service_price, #service_description, #service_duration, #service_status').val('');
                    $('.product-row').remove();
                } else {
                    notyf.error('Erro ao criar serviço.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                notyf.error('Ocorreu um erro. Tente novamente!');
            }
        });
    });

    var servicesTable = new DataTable("#serviceList", {
        responsive: true,
        ajax: {
            url: `${baseURL}services/populateServicesTable`,
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
            { data: 'service_code', title: 'Código' },
            { data: 'service_name', title: 'Nome' },
            { data: 'service_duration', title: 'Duração Prevista (min)' },
            { data: 'service_price', title: 'Preço' },
            { data: 'actions', title: 'Ações' }
        ],
        processing: true,
        serverSide: false,
        dom: 'Brtip',
        pageLength: 10
    });

    $('#searchService').on('keyup', function () {
        servicesTable.search(this.value).draw();
    });

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
    var mechanicOptions = [];
    var serviceOptions = [];

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
                            
                            $('.clientName').val(data['client']['client_name']);
                            $('.clientNif').val(data['client']['client_nif']);
                            $('.clientAddress').val(data['client']['client_address']);
                            $('.clientCity').val(data['client']['client_city']);
                            $('.clientPostCode').val(data['client']['client_post_code']);
                            $('.clientCounty').val(data['client']['client_county']);
                            $('.clientCountry').val(data['client']['client_country']);
                            $('.clientPhoneNumber').val(data['contacts'][0]['contact_phone_number']);
                            $('.clientEmail').val(data['contacts'][0]['contact_email']);
                            
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

    let selectMechanic = new TomSelect('#selectMechanic', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onInitialize: () => {
            $.ajax({
                type: "get",
                url: `${baseURL}mechanics/getAllMechanics`,
                success: function (data) {
                    if (data.length === 0) {
                        mechanicOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.employee_id, text: element.employee_name}
                            mechanicOptions.push(newItem);
                        });

                        console.log(mechanicOptions)
                        selectMechanic.addOptions(mechanicOptions)
                        selectMechanic.sync();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });

    let selectServiceType = new TomSelect('#selectServiceType', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onInitialize: () => {
            $.ajax({
                type: "get",
                url: `${baseURL}services/getAllServices`,
                success: function (data) {
                    if (data.length === 0) {
                        serviceOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.service_code, text: element.service_description}
                            serviceOptions.push(newItem);
                        });

                        console.log(serviceOptions)
                        selectServiceType.addOptions(serviceOptions)
                        selectServiceType.sync();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        },
        onChange: () => {
            if($('#selectServiceType').val() != "") {
                if($('#selectServiceType').val() == "S000001") {

                    $("#descricao-li").removeClass("d-none");
                }
            }
        }
    });

    $(".ts-dropdown").css("z-index", "9999");
    
});