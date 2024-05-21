function showLoadingAlert() {
    Swal.fire({
        type: 'info',
        html: '<span class="iconify me-3" data-icon="line-md:uploading-loop" data-width="150" style="color: rgb(87, 24, 176)"></span><span class="fw-bold h3">Cargando...</span>',
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        willClose: () => {
            $('#fileModal').modal('hide');
        }
    });
}

$(document).on('click', '.viewFileLink', function (e) {
    e.preventDefault();
    var fileUrl = $(this).data('url');
    $('#fileFrame').attr('src', fileUrl);
    $('#fileModal').modal('show');
});


$('#listPayform').DataTable({
    responsive: true,
    order: [[1, "desc"]],
    ajax: {
        url: listUrl,
        dataSrc: "data",
        beforeSend: function () {
            showLoadingAlert();
        },

    },
    columns: [
        {
            data: 'id'
        },
        {
            data: 'name'
        },
        {
            data: 'payment_name'
        },
        {
            data: 'email'
        },
        {
            data: 'payment_date',
            render: function (data, type, row) {
                var date = new Date(data);
                var utcDate = new Date(date.getTime() + date.getTimezoneOffset() * 60000);
                var year = utcDate.getFullYear();
                var month = ("0" + (utcDate.getMonth() + 1)).slice(-2);
                var day = ("0" + utcDate.getDate()).slice(-2);
                return day + "/" + month + "/" + year;
            }
        },
        {
            data: 'created_at'
        },
        {
            data: 'file_url',
            render: function (data, type, row) {
                if (data) {
                    return '<a href="#" class="viewFileLink" data-url="' + data + '">Ver archivo</a>';
                } else {
                    return 'Archivo no disponible';
                }
            }
        },
        {
            data: null,
            render: function (data, type, row) {
                var showUrlDynamic = showUrl.replace(':id', row.id);
                var editUrlDynamic = editUrl.replace(':id', row.id);

                var buttonsHtml = '<div class="row-reverse">' +
                    '<div class="col d-flex justify-content-center mb-1">';

                buttonsHtml += '<a href="' + showUrlDynamic + '" class="btn btn-sm btn-primary "><span class="iconify text-white" data-icon="ic:baseline-remove-red-eye"></span></a>';

                buttonsHtml += '</div>' +
                    '<div class="col d-flex justify-content-center">';
                buttonsHtml += '<a href="' + editUrlDynamic + '" class="btn btn-sm btn-warning "><span class="iconify text-white" data-icon="material-symbols:edit-document"></span></a>';

                buttonsHtml += '<a data-id="' + row.id + '" class="btn btn-sm btn-danger  btnDelete"><span class="iconify text-white" data-icon="material-symbols:delete-forever"></span></a>';

                buttonsHtml += '</div>' +
                    '</div>';

                return buttonsHtml;
            }
        }
    ],
    drawCallback: function () {
        Swal.close();
    },
    dom: 'Bfrtilp',
    searching: true,
    ordering: false,
    paging: true,
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'Todos']
    ],
    pageLength: 10,
    language: {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing": "Procesando...",
    },
    buttons: [{
        extend: 'excelHtml5',
        text: '<span class="iconify" data-icon="vscode-icons:file-type-excel" data-width="25"></span> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-white border border-2 border-primary btn-sm rounded-5'
    },
    {
        extend: 'pdfHtml5',
        text: '<span class="iconify" data-icon="vscode-icons:file-type-pdf2" data-width="25"></span>',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-white border border-2 border-primary btn-sm rounded-5'
    },
    {
        extend: 'print',
        text: '<span class="iconify" data-icon="flat-color-icons:print" data-width="25"></span>',
        titleAttr: 'Imprimir',
        className: 'btn btn-white border border-2 border-primary btn-sm rounded-5'
    },
    ]
});