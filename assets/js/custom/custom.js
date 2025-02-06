"use strict";

const tablesLanguange = {
    decimal: "",
    emptyTable: "A tabela está vazia!",
    info: "A mostrar _START_ a _END_ de _TOTAL_ entradas",
    infoEmpty: "A tabela está vazia!",
    infoFiltered: "(filtrado do total de _MAX_ entradas)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Mostrar _MENU_ entradas",
    loadingRecords: "A carregar...",
    processing: "A processar...",
    search: "Procurar:",
    zeroRecords: "Não foram encontrados dados!",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": 'Seguinte <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg> Anterior'
    },
};

const notyf = new Notyf({
    duration: 2000,
    position: {x:'right', y:'top'}
});