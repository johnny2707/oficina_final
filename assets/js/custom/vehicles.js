"use strict";

$(document).ready(function() {

    $("#page-loader").hide();

    $('#vehicleSelection').on('change', function(event) {

        console.log('Changed!');
        console.log($('#vehicleSelection').val());

        if($('#vehicleSelection').val() != "") {
            
            $.ajax({
                type: "post",
                url: `${baseURL}vehicles/getVehicleData`,
                data: {
                    vehicleId: $('#vehicleSelection').val()
                },
                dataType: "json",
                success: function(data) {
                    if (data.error == true) {
                        $.each( data.popUpMessages, function( key, value ) {
                            notyf.error(value);
                        });
                    } else {

                        $('input[name="licensePlate"]').val(data[0]['vehicle_license_plate']);
                        $('input[name="brand"]').val(data[0]['vehicle_brand']);
                        $('input[name="model"]').val(data[0]['vehicle_model']);
                        $('input[name="year"]').val(data[0]['vehicle_year']);

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
    
    var settingsVehicles = {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    };

    $.ajax({
        type: "get",
        url: `${baseURL}vehicles/getUserVehicles`,
        success: function (data) {
            if (data.length === 0) {
                settingsVehicles.options.push({value: 0, text: "no items found"})
            } 
            else {
                data.forEach(element => {
                    console.log(element);

                    var newItem = {value: element.vehicle_id, text: element.vehicle_license_plate}
                    settingsVehicles.options.push(newItem);
                });

                new TomSelect('#vehicleSelection', settingsVehicles);
                $(".ts-dropdown").css("z-index", "9999");
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });

});