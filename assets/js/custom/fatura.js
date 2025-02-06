"use strict";

$(document).ready(function () { 

    $("#page-loader").hide();

    function calculatePriceValues() {
        $("#totalBrutoValor").text("0");
        $("#totalLiquidoValor").text("0");
        $("#totalValor").text("0");

        $("#tableBody").find('tr').each(function() {
            let precoFinalProduto = parseFloat($(this).find('.precoFinalProduto').text());
            let totalBrutoValor = parseFloat($("#totalBrutoValor").text());

            if(!isNaN(precoFinalProduto)){
                $("#totalBrutoValor").text((totalBrutoValor + precoFinalProduto).toFixed(2));
            }

            $("#totalLiquidoValor").text((parseFloat($("#totalBrutoValor").text()) - (parseFloat($("#totalBrutoValor").text()) * parseFloat($('#descontoGlobalValor').text()))).toFixed(2));
            $("#totalValor").text((parseFloat($("#totalLiquidoValor").text()) + (parseFloat($("#totalLiquidoValor").text()) * 0.23)).toFixed(2));
        });
    }

    $('#tableBody').sortable({
        cursor: 'move',
        animation: 150,
    });

    $("#tableBody").on('keydown', '.quantidadeProduto', function(e) {
        
        let value = $(this).val();

        if(e.key === 'Enter' && value != "") {

            $(this).closest('tr').find('.precoFinalProduto').text((parseFloat($(this).closest("tr").find(".precoSemIva").text()) * value).toFixed(2));

            $(this).prop('disabled', true);
            $(this).closest('tr').find('.descontoProduto').prop('disabled', false);            

            calculatePriceValues();
        }
    });

    $("#tableBody").on('keydown', '.descontoProduto', function(e) {
        
        let value = $(this).val();

        if(e.key === 'Enter' && value != "") {

            let element = $(this).closest('tr').find('.precoFinalProduto');

            element.text((element.text() - parseFloat(element.text()) * (parseFloat(value) / 100)).toFixed(2));
            $(this).prop('disabled', true);

            calculatePriceValues();
        }
    });

    $('#serviceSelect').on('change', function(event) {

        console.log('Changed!');
        console.log($('#serviceSelect').val());

        if($('#serviceSelect').val() != "") {
            
            $.ajax({
                type: "post",
                url: `${baseURL}products/getProductByCode`,
                data: {
                    codigo: $('#serviceSelect').val()
                },
                dataType: "json",
                success: function(data) {
                    if (data.error == true) {
                        $.each( data.popUpMessages, function( key, value ) {
                            notyf.error(value);
                        });
                    } else {

                        $('#tableBody').append(`
                            <tr>
                                <td scope="row"><input class="form-control" type="text" value="${data[0]['service_code']}" disabled></td>
                                <td>${data[0]['service_description']}</td>
                                <td><input class="form-control quantidadeProduto" type="text"></td>
                                <td>${data[0]['unit_code']}</td>
                                <td class="precoSemIva">${data[0]['service_price_without_iva']}</td>
                                <td><input class="form-control descontoProduto" type="text" disabled></td>
                                <td class="precoFinalProduto">${data[0]['service_price_without_iva']}</td>
                            </tr>
                        `);

                        calculatePriceValues();
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

    var settingsService = {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    };

    $.ajax({
        type: "get",
        url: `${baseURL}products/getAllProducts`,
        success: function (data) {
            if (data.length === 0) {
                settingsService.options.push({value: 0, text: "no items found"})
            } 
            else {
                data.forEach(element => {
                    console.log(element);

                    var newItem = {value: element.service_code, text: element.service_code}
                    settingsService.options.push(newItem);
                });

                new TomSelect('#serviceSelect', settingsService);
                $(".ts-dropdown").css("z-index", "9999");
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
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
        url: `${baseURL}vehicles/getAllVehicles`,
        success: function (data) {
            if (data.length === 0) {
                settingsVehicles.options.push({value: 0, text: "no items found"})
            } 
            else {
                data.forEach(element => {
                    console.log(element);

                    var newItem = {value: element.service_code, text: element.service_code}
                    settingsVehicles.options.push(newItem);
                });

                new TomSelect('#vehicleSelect', settingsVehicles);
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