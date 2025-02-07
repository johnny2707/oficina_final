"use strict";

$(document).ready(function () {
    
    $("#page-loader").hide();

    $(document).on('click', '.createAccountButton', function(e){
        
        let password = $('input[name="accountCreationPassword"]').val();
        let passwordConfirmation = $('input[name="accountCreationPasswordConfirmation"]').val();
        let token = $('.createAccountButton').data('token');

        if(password === passwordConfirmation) {
            $.ajax({
                type: "post",
                url: `${baseURL}users/createAccount`,
                data: {
                    token,
                    password,
                    passwordConfirmation
                },
                dataType: "json",
                success: function (data) {
                    if (data.error == true) {
                        $.each(data.popUpMessages, function(key, value) {
                            notyf.error(value);
                        });
                    } 
                    else {
                        $.each(data.popUpMessages, function(key, value) {
                            notyf.success(value);
                        });
                        
                        window.location.href = `${baseURL}`;
                    }
                },
                error: function(xhr, status, error){
                    console.log(xhr);
                    console.log(status);
                    console.log(error);

                    notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
                }
            });
        }
        else {
            notyf.error('As palavras-passe não coincidem!');
        }
    });

    $(document).on('click', '.changePasswordButton', function(e){

        $.ajax({
            type: "post",
            url: `${baseURL}users/createAccount`,
            data: {
                token,
                password,
                passwordConfirmation
            },
            dataType: "json",
            success: function (data) {
                if (data.error == true) {
                    $.each(data.popUpMessages, function(key, value) {
                        notyf.error(value);
                    });
                } 
                else {
                    $.each(data.popUpMessages, function(key, value) {
                        notyf.success(value);
                    });
                    
                    window.location.href = `${baseURL}`;
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