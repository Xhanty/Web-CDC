$(document).ready(function () {
    var filaEliminada; //Para capturar la fila eliminada
    var filaEditada; //Para capturar la fila editada o actualizada

    //Creamos constantes para los iconos editar y borrar 
    const iconoEditar = '<svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>';
    const iconoBorrar = '<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>';
    const iconoReporte = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="5" x="1" y="10" rx="1"/><rect width="4" height="9" x="6" y="6" rx="1"/><rect width="4" height="14" x="11" y="1" rx="1"/><path fill-rule="evenodd" d="M0 14.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/></svg>';

    var db = firebase.database();
    var coleccionProductos = db.ref().child("Forestales").child("Inventario");
    var coleccionEspecie = db.ref().child("Forestales").child("Especies");
    var coleccionFamilia = db.ref().child("Forestales").child("Familias");

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
        dom: 'Bfrtilp',
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
        dataSet = [datos.key, i, datos.child("Nombre_Regional").val(), datos.child("Familia").val(),
            datos.child("Especie").val(), datos.child("Numero_Campo").val()];
        table.row(filaEditada).data(dataSet).draw();
    });

    coleccionProductos.on("child_removed", function () {
        table.row(filaEliminada.parents('tr')).remove().draw();
        i--;
    });

    $('form').submit(function (e) {
        e.preventDefault();
        let id = $.trim($('#id').val());
        let numero_campo, nombre_regional, especie, familia, altura_total, altura_comercial;
        let imagen, cap_1, cap_2, cap_3, cap_4, cap_5;
        let coor_x, coor_y, cap, dap, area_basa, volumen_to, volumen_co, ps, rn, clase_diam;
        numero_campo = $.trim($('#numero_campo').val());
        nombre_regional = $.trim($('#nombre_regional').val());
        especie = $.trim($('#especie').val());
        familia = $.trim($('#familia').val());
        altura_total = $.trim($('#altura_total').val());
        altura_comercial = $.trim($('#altura_comercial').val());
        imagen = "https://img.lovepik.com/original_origin_pic/18/03/26/9cfc97e5567a451ecb4344a3b82c79c4.png_wh860.png";
        cap_1 = $.trim($('#cap_1').val());
        cap_2 = $.trim($('#cap_2').val());
        cap_3 = $.trim($('#cap_3').val());
        cap_4 = $.trim($('#cap_4').val());
        cap_5 = $.trim($('#cap_5').val());
        coor_x = $.trim($('#coor_x').val());
        coor_y = $.trim($('#coor_x').val());
        cap = $.trim($('#cap').val());
        dap = $.trim($('#dap').val());
        area_basa = $.trim($('#area_basa').val());
        volumen_to = $.trim($('#volumen_to').val());
        volumen_co = $.trim($('#volumen_co').val());
        ps = $.trim($('#ps').val());
        rn = $.trim($('#rn').val());
        clase_diam = $.trim($('#clase_diam').val());

        let idFirebase = id;
        if (idFirebase == '') {
            idFirebase = coleccionProductos.push().key;
        };
        data = { 
            Altura_Comercial: altura_comercial,
            Altura_Total: altura_total,
            CAP: cap,
            CAP_1: cap_1,
            CAP_2: cap_2,
            CAP_3: cap_3,
            CAP_4: cap_4,
            CAP_5: cap_5,
            Clase_Diam: clase_diam,
            Coor_X: coor_x,
            Coor_Y: coor_y,
            DAP: dap,
            Area_Basa: area_basa,
            Especie: especie,
            Familia: familia,
            Imagen: imagen,
            Nombre_Regional: nombre_regional,
            Numero_Campo: numero_campo,  
            PS: ps,
            RN: rn,
            Volumen_Co: volumen_co,
            Volumen_To: volumen_to
            
        };
        actualizacionData = {};
        actualizacionData[`/${idFirebase}`] = data;
        coleccionProductos.update(actualizacionData);
        id = '';
        $("form").trigger("reset");
        $('#modalAltaEdicion').modal('hide');
        Swal.fire({
            title: '¡Éxito!',
            text: "Acción realizada correctamente!",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#143153',
            confirmButtonText: 'Aceptar'
        })
    });

    //Botones
    $('#btnNuevo').click(function () {
        var imagen = "https://img.lovepik.com/original_origin_pic/18/03/26/9cfc97e5567a451ecb4344a3b82c79c4.png_wh860.png";
        $('#id').val('');
        $('#numero_campo').val('');
        $('#nombre_regional').val('');
        $('#especie').val('');
        $('#familia').val('');
        $('#altura_total').val('');
        $('#altura_comercial').val('');
        $('#ver_imagen').attr('src', imagen);
        $('#cap_1').val('');
        $('#cap_2').val('');
        $('#cap_3').val('');
        $('#cap_4').val('');
        $('#cap_5').val('');
        $('#cap_6').val('');
        $('#coor_x').val('');
        $('#coor_y').val('');
        $('#cap').val('');
        $('#dap').val('');
        $('#area_basa').val('');
        $('#volumen_to').val('');
        $('#volumen_co').val('');
        $('#ps').val('');
        $('#rn').val('');
        $('#clase_diam').val('');
        $("form").trigger("reset");
        $('#modalAltaEdicion').modal('show');
    });

    $("#tablaForestales").on("click", ".btnEditar", function () {
        let id = "";
        filaEditada = table.row($(this).parents('tr'));
        let fila = $('#tablaForestales').dataTable().fnGetData($(this).closest('tr'));
        id = fila[0];
        let nombre_regional, familia, especie, numero_campo, altura_total, altura_comercial;
        let imagen, cap_1, cap_2, cap_3, cap_4, cap_5, cap_6;
        let coor_x, coor_y, cap, dap, area_basa, volumen_to, volumen_co, ps, rn, clase_diam;

        var coleccioneditar = db.ref().child("Forestales/Inventario/"+id);
        coleccioneditar.once("value").then(function (snapshot) {
            nombre_regional = snapshot.child("Nombre_Regional").val();
            familia = snapshot.child("Familia").val();
            especie = snapshot.child("Especie").val();
            numero_campo = snapshot.child("Numero_Campo").val();
            altura_total = snapshot.child("Altura_Total").val();
            altura_comercial = snapshot.child("Altura_Comercial").val();
            imagen = snapshot.child("Imagen").val();
            cap_1 = snapshot.child("CAP_1").val();
            cap_2 = snapshot.child("CAP_2").val();
            cap_3 = snapshot.child("CAP_3").val();
            cap_4 = snapshot.child("CAP_4").val();
            cap_5 = snapshot.child("CAP_5").val();
            cap_6 = snapshot.child("CAP_6").val();
            coor_x = snapshot.child("Coor_X").val();
            coor_y = snapshot.child("Coor_Y").val(); 
            cap = snapshot.child("CAP").val();
            dap = snapshot.child("DAP").val();
            area_basa = snapshot.child("Area_Basa").val(); 
            volumen_to = snapshot.child("Volumen_To").val();
            volumen_co = snapshot.child("Volumen_Co").val();
            ps = snapshot.child("PS").val();
            rn = snapshot.child("RN").val();
            clase_diam = snapshot.child("Clase_Diam").val();

            $('#id').val(id);
            $('#nombre_regional').val(nombre_regional);
            $('#familia').val(familia);
            $('#especie').val(especie);
            $('#numero_campo').val(numero_campo);
            $('#altura_total').val(altura_total);
            $('#altura_comercial').val(altura_comercial);
            $('#ver_imagen').attr('src', imagen);
            $('#cap_1').val(cap_1);
            $('#cap_2').val(cap_2);
            $('#cap_3').val(cap_3);
            $('#cap_4').val(cap_4);
            $('#cap_5').val(cap_5);
            $('#cap_6').val(cap_6);
            $('#coor_x').val(coor_x);
            $('#coor_y').val(coor_y);
            $('#cap').val(cap);
            $('#dap').val(dap);
            $('#area_basa').val(area_basa);
            $('#volumen_to').val(volumen_to);
            $('#volumen_co').val(volumen_co);
            $('#ps').val(ps);
            $('#rn').val(rn);
            $('#clase_diam').val(clase_diam);
        });
        $('#modalAltaEdicion').modal('show');
    });

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

    $("#tablaForestales").on("click", ".btnReporteU", function () {
        let fila = $('#tablaForestales').dataTable().fnGetData($(this).closest('tr'));
        let id = fila[0];
        var coleccionreporte = db.ref().child("Forestales/Inventario/" + id);
        Swal.fire({
            title: '¿Elige una opción?',
            text: "¡Tipo de reporte!",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'PDF',
            confirmButtonColor: '#0D930B',
            cancelButtonColor: '#3265DC',
            confirmButtonText: 'EXCEL'
        }).then((result) => {
            if (result.value) {
                reportexcel(coleccionreporte);
                Swal.fire({
                    title: 'EXCEL',
                    text: id,
                    icon: 'question'
                });
            } 

            else{
                Swal.fire({
                    title: 'PDF',
                    text: id,
                    icon: 'question'
                });
            }
        })
    });

    function reportexcel(coleccionreporte){
        console.log(coleccionreporte);
        /*coleccionreporte.once("value").then(function (snapshot) {

        });*/
    }

    //LENNAR SELECTS
    var selectespecie = document.getElementById("especie");
    let arrayespecie = [];
    var selectfamilia = document.getElementById("familia");
    let arrayfamilia = [];

    coleccionEspecie.on("child_added", function (snapshot) {
        arrayespecie.push(snapshot.child("Nombre").val());
        for (var i = 0; i < arrayespecie.length; i++) {
            selectespecie.options[i] = new Option(arrayespecie[i], arrayespecie[i]);
        };
    });

    coleccionFamilia.on("child_added", function (snapshot) {
        arrayfamilia.push(snapshot.child("Nombre").val());
        for (var i = 0; i < arrayfamilia.length; i++) {
            selectfamilia.options[i] = new Option(arrayfamilia[i], arrayfamilia[i]);
        };
    });
});