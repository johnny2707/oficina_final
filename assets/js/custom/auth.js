"use strict";

$(document).ready(function() {
    
    $(document).on('click', '.authButton', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 2000);

        let email = $('input[name=email]').val();
        let password = $('input[name=password]').val();

        $.ajax({
            url: `${baseURL}/auth`,
            method: "POST",
            dataType: 'json',
            data : { 
                email,
                password
            },
            success: function(data) {
                if (data.error == true) {
                    $.each( data.popUpMessages, function( key, value ) {
                        notyf.error(value);
                    });
                } else {
                    $.each(data.popUpMessages, function(key, value) {
                        notyf.success(value);
                    });

                    location.reload();
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

    $(document).on('click', '.changePassword', function(e) {

        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let email = $('input[name=email]').val();

        $.ajax({
            method: "post",
            url: `${baseURL}/auth/sendPasswordEmail`,
            dataType: 'json',
            data : { 
                email
            },
            success: function(data) {
                if (data.error == true) {
                    $.each( data.popUpMessages, function( key, value ) {
                        notyf.error(value);
                    });
                } else {
                    $.each(data.popUpMessages, function(key, value) {
                        notyf.success(value);
                    });
                    
                    window.location.href = baseURL+'auth/emailSentConfirmation/'+ email;
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