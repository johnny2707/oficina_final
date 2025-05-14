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
                    $.each( data.popUpMessages, function(key, value ) {
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

    $(document).on('click', '.btnValidar', function(e) {
        $(this).attr('disabled', 'disabled');
        let element = $(this);
        setTimeout(function() {
            element.removeAttr('disabled');
        }, 1000);

        let d1 = $('input[name=code1]').val();
        let d2 = $('input[name=code2]').val();
        let d3 = $('input[name=code3]').val();
        let d4 = $('input[name=code4]').val();

        let code = d1 + d2 + d3 + d4;

        console.log(code);

        if (code == '') {
            notyf.error('Por favor insira o código!');
            return;
        }

        if (typeof grecaptcha === 'undefined' || !recaptchaReady) {
            notyf.error('reCAPTCHA não carregado. Recarregue a página!');
            return;
        }

        grecaptcha.execute(recaptchaWidgetId).then((token) => {
            $.ajax({
                method: "POST",
                url: `${baseURL}/auth/validateCode`,
                dataType: 'json',
                data: {
                    'code': code,
                    'g-recaptcha-response': token  // Match backend expected parameter name
                },
                success: function(data) {
                    // Reset reCAPTCHA after successful verification
                    grecaptcha.reset(recaptchaWidgetId);

                    if (data.error) {
                        $.each(data.popUpMessages, function(key, value) {
                            notyf.error(value);
                        });
                    } else {
                        $.each(data.popUpMessages, function(key, value) {
                            notyf.success(value);
                        });
                        
                        // Add slight delay for success message display
                        setTimeout(() => {
                            window.location.href = baseURL + 'auth/changePassword/' + email;
                        }, 1500);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    console.error(status);
                    console.error(error);
                    grecaptcha.reset(recaptchaWidgetId);
                    notyf.error('Ocorreu um erro. Tente novamente!');
                }
            });
        }).catch((error) => {
            console.error('reCAPTCHA Error:', error);
            notyf.error('Falha na verificação reCAPTCHA. Tente novamente!');
            grecaptcha.reset(recaptchaWidgetId);
        });
    });
});