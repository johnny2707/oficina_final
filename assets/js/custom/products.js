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


    $(document).on('click', '.createProductButton', function (e) {

        console.log($('#productCode').val());
        console.log($('#productDescription').val());
        console.log($('#productPrice').val());
        console.log($('#selectUnit').val());
        console.log($('#productStock').val());

        var formData = {
            productCode: $('#productCode').val(),
            productDescription: $('#productDescription').val(),
            productPrice: $('#productPrice').val(),
            productUnit: $('#selectUnit').val(),
            productStock: $('#productStock').val()
        };

        if( !formData.productCode || !formData.productDescription || !formData.productPrice || !formData.productUnit || !formData.productStock) {
            notyf.error('Por favor, preencha todos os campos obrigatórios.');
            return;
        }

        $.ajax({
            type: 'POST',
            url: `${baseURL}stock/criarProduto`,
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.error) {
                    response.messages.forEach(function (message) {
                        notyf.error(message); // You can replace this with a more user-friendly notification
                    });
                } else {
                    notyf.success('Produto criado com sucesso!');
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


    let unitsOptions = [];

    let selectUnit = new TomSelect('#selectUnit', {
        options: [],
        onInitialize: () =>{
            $.ajax({
                type: "get",
                url: `${baseURL}products/getAllUnits`,
                success: function (data) {
                    if (data.length === 0) {
                        unitsOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.unit_id, text: element.unit_code}
                            unitsOptions.push(newItem);
                        });

                        console.log(unitsOptions)
                        selectUnit.addOptions(unitsOptions)
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    console.log(status)
                    console.log(error)
                }
            });
        },
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body'
    });

});