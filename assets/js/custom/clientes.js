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
});
