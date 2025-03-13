"use strict";


$(document).ready(function () {

    $('#page-loader').hide();

    let productOptions = [];

    let selectProduct = new TomSelect('#selectProduct', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onInitialize: () => {
            $.ajax({
                type: "get",
                url: `${baseURL}stock/getAllProducts`,
                success: function (data) {
                    if (data.length === 0) {
                        productOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.product_id, text: element.product_description}
                            productOptions.push(newItem);
                        });

                        console.log(productOptions)
                        selectProduct.addOptions(productOptions)
                        selectProduct.sync();
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
            let selectedProduct = selectProduct.getValue();
            console.log(selectedProduct);

            $.ajax({
                type: "post",
                url: `${baseURL}stock/getProduct`,
                data: {
                    product_id: selectedProduct
                },
                dataType: "json",
                success: function (response) {
                    if(response.error == true) {
                        response.popUpMessages.forEach(element => {
                            notyf.error(element);
                        });
                    }
                    else {
                        console.log(response.product);
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

});