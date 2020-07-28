$(document).ready(function () {
    var filaEliminada; //Para capturar la fila eliminada
    var filaEditada; //Para capturar la fila editada o actualizada

    //Creamos constantes para los iconos editar y borrar 
    const iconoEditar = '<svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>';
    const iconoBorrar = '<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>';
    const iconoReporte = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="5" x="1" y="10" rx="1"/><rect width="4" height="9" x="6" y="6" rx="1"/><rect width="4" height="14" x="11" y="1" rx="1"/><path fill-rule="evenodd" d="M0 14.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/></svg>';

    var db = firebase.database();
    var coleccionProductos = db.ref().child("Forestales").child("Inventario");

    var dataSet = []; //Array para guardar los valores de los campos inputs del form
    var table = $('#tablaForestales').DataTable({
        destroy: true,
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Resultados",
        "infoEmpty": "Mostrando 0 to 0 of 0 Resultados",
        "infoFiltered": "(Filtrado de _MAX_ total resultados)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Resultados",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero ",
            "last": " 'Último",
            "next": " Siguiente",
            "previous": "Anterior "
            }
        },
        paging: true,
        lengthChange: true,
        processing: true,
        ordering: true,
        info: true,
        responsive: true,
        autoWidth: false,
        lengthMenu: [[50, 300, 500, 1000, -1], [50, 300, 500, 1000, 'Todos']],
        pageLength: 50,
        data: dataSet,
        columnDefs: [
            {
                targets: [0],
                visible: false, //ocultamos la columna de ID que es la [0]                        
            },
            {
                targets: -1,
                defaultContent: "<div class='wrapper text-center'><div class='btn-group'><button class='btnReporteU btn btn-warning' data-toggle='tooltip' title='Seguimiento'>" + iconoReporte + "<button class='btnEditar btn btn-success' data-toggle='tooltip' title='Editar'>" + iconoEditar + "</button><button class='btnBorrar btn btn-danger' data-toggle='tooltip' title='Borrar'>" + iconoBorrar + "</button></div></div>"
            }
        ]
    });

    var i = 1;
    coleccionProductos.on("child_added", datos => {
        dataSet = [datos.key, i, datos.child("Nombre_Regional").val(), datos.child("Familia").val(),
            datos.child("Especie").val(), datos.child("Numero_Campo").val()];
        table.rows.add([dataSet]).draw();

        i++;
    });

    coleccionProductos.on('child_changed', datos => {
        dataSet = [datos.key, datos.child("Nombre_Regional").val(), datos.child("Familia").val(),
            datos.child("Especie").val(), datos.child("Numero_Campo").val()];
        table.row(filaEditada).data(dataSet).draw();
    });

    coleccionProductos.on("child_removed", function () {
        table.row(filaEliminada.parents('tr')).remove().draw();
    });
    

    $('form').submit(function (e) {
        e.preventDefault();
        let id = $.trim($('#id').val());
        let codigo = $.trim($('#codigo').val());
        let descripcion = $.trim($('#descripcion').val());
        let cantidad = $.trim($('#cantidad').val());
        let idFirebase = id;
        if (idFirebase == '') {
            idFirebase = coleccionProductos.push().key;
        };
        data = { codigo: codigo, descripcion: descripcion, cantidad: cantidad };
        actualizacionData = {};
        actualizacionData[`/${idFirebase}`] = data;
        coleccionProductos.update(actualizacionData);
        id = '';
        $("form").trigger("reset");
        $('#modalAltaEdicion').modal('hide');
    });

    //Botones
    $('#btnNuevo').click(function () {
        $('#id').val('');
        $('#codigo').val('');
        $('#descripcion').val('');
        $('#cantidad').val('');
        $("form").trigger("reset");
        $('#modalAltaEdicion').modal('show');
    });

    /*
    $("#tablaForestales").on("click", ".btnEditar", function () {
        filaEditada = table.row($(this).parents('tr'));
        let fila = $('#tablaForestales').dataTable().fnGetData($(this).closest('tr'));
        let id = fila[0];
        console.log(id);
        let codigo = $(this).closest('tr').find('td:eq(0)').text();
        let descripcion = $(this).closest('tr').find('td:eq(1)').text();
        let cantidad = parseInt($(this).closest('tr').find('td:eq(2)').text());
        $('#id').val(id);
        $('#codigo').val(codigo);
        $('#descripcion').val(descripcion);
        $('#cantidad').val(cantidad);
        $('#modalAltaEdicion').modal('show');
    });*/

    $("#tablaForestales").on("click", ".btnBorrar", function () {
        filaEliminada = $(this);
        Swal.fire({
            title: '¿Estás seguro de eliminarlo?',
            text: "¡Está operación no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#143153',
            confirmButtonText: 'Borrar'
        }).then((result) => {
            if (result.value) {
                let fila = $('#tablaForestales').dataTable().fnGetData($(this).closest('tr'));
                let id = fila[0];
                db.ref(`Forestales/Inventario/${id}`).remove()
                Swal.fire({
                    title: '¡Eliminado!',
                    text: "Ha sido eliminado correctamente.",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#143153',
                    confirmButtonText: 'Aceptar'
                })

            }
        })
    });

});