"use strict";

$(document).ready(function () {

    $("#page-loader").hide();

    var settingsClients = {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    };

    var settingsVehicles = {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    };

    $.ajax({
        type: "get",
        url: `${baseURL}clients/getAllClients`,
        success: function (data) {
            if (data.length === 0) {
                settingsClients.options.push({value: 0, text: "no items found"})
            } 
            else {
                data.forEach(element => {
                    console.log(element);

                    var newItem = {value: element.client_code, text: "C" + element.client_code}
                    settingsClients.options.push(newItem);
                });

                new TomSelect('#selectClient', settingsClients);
                $(".ts-dropdown").css("z-index", "9999");
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr)
            console.log(status)
            console.log(error)
        }
    });

    $(document).on("change", ".selectClient", function (e) { 
        
        if($('#selectClient').val() != "") {
            
            $.ajax({
                type: "post",
                url: `${baseURL}clients/getVehiclesByCode`,
                data: {
                    codigo: $('#selectClient').val()
                },
                dataType: "json",
                success: function(data) {
                    if (data.length === 0) {
                        settingsVehicles.options.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
                            console.log(element);
        
                            var newItem = {value: element.vehicle_license_plate, text: element.vehicle_license_plate}
                            settingsVehicles.options.push(newItem);
                        });
        
                        new TomSelect('#selectVehicle', settingsVehicles);
                        $(".ts-dropdown").css("z-index", "9999");
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

    });

});