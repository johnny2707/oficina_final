"use strict";


$(document).ready(function () {

    $('#page-loader').hide();

    var productsTable = new DataTable("#productList", {
        responsive: true,
        ajax: {
            url: `${baseURL}stock/populateProductsTable`,
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
            { data: 'product_code', title: 'Código' },
            { data: 'product_description', title: 'Descrição' },
            { data: 'product_price', title: 'Preço' },
            { data: 'product_unit', title: 'Unidade' },
            { data: 'product_stock', title: 'Stock' },
            { data: 'actions', title: 'Ações' }
        ],
        processing: true,
        serverSide: false,
        dom: 'Brtip',
        pageLength: 10
    });

    $('#searchProduct').on('keyup', function () {
        productsTable.search(this.value).draw();
    });


    $('#createProductForm').on('submit', function (e) {
        e.preventDefault();

        var formData = {
            productCode: $('#productCode').val(),
            productDescription: $('#productDescription').val(),
            productPrice: $('#productPrice').val(),
            productUnit: $('#productUnit').val(),
            productStock: $('#productStock').val()
        };

        $.ajax({
            type: 'POST',
            url: `${baseURL}products/criarProduto`,
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.error) {
                    response.messages.forEach(function (message) {
                        alert(message); // You can replace this with a more user-friendly notification
                    });
                } else {
                    alert('Produto criado com sucesso!');
                    productsTable.ajax.reload(); // Reload the table data
                    $('#createProductForm')[0].reset(); // Reset the form
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                console.error('Status:', status);
                console.error('Response:', xhr);
            }
        });
    });


    // let productOptions = [];

    // let selectProduct = new TomSelect('#selectProduct', {
    //     options: [],
    //     maxItems: 1, 
    //     dropdownClass: 'dropdown-menu ts-dropdown',
    //     optionClass: 'dropdown-item',
    //     dropdownParent: 'body',
    //     onInitialize: () => {
    //         $.ajax({
    //             type: "get",
    //             url: `${baseURL}stock/getAllProducts`,
    //             success: function (data) {
    //                 if (data.length === 0) {
    //                     productOptions.push({value: 0, text: "no items found"})
    //                 } 
    //                 else {
    //                     data.forEach(element => {
        
    //                         var newItem = {value: element.product_id, text: element.product_description}
    //                         productOptions.push(newItem);
    //                     });

    //                     console.log(productOptions)
    //                     selectProduct.addOptions(productOptions)
    //                     selectProduct.sync();
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log(xhr);
    //                 console.log(status);
    //                 console.log(error);
    //             }
    //         });
    //     },
    //     onChange: () => {
    //         let selectedProduct = selectProduct.getValue();
    //         console.log(selectedProduct);

    //         $.ajax({
    //             type: "post",
    //             url: `${baseURL}stock/getProduct`,
    //             data: {
    //                 product_id: selectedProduct
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 if(response.error == true) {
    //                     response.popUpMessages.forEach(element => {
    //                         notyf.error(element);
    //                     });
    //                 }
    //                 else {
    //                     console.log(response.product);
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log(xhr);
    //                 console.log(status);
    //                 console.log(error);
    //             }
    //         });

    //     }
    // });

});