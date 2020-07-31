@extends('menu.index')

@section('index')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <style>table th {
        background: #143153;
        color: white;
    }
    .subir{
    padding: 5px 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
    }
 
    .subir:hover{
        color:#fff;
        background: #f7cb15;
    }
    </style>
 
 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <button id="btnNuevo" style="width: 49%" class="btn btn-success" data-toggle="tooltip" title="Agregar"><svg class="bi bi-plus-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/></svg></button>
            <button id="btnReporte" style="width: 50%" class="btn btn-warning" data-toggle="tooltip" title="Reporte"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="5" x="1" y="10" rx="1"/><rect width="4" height="9" x="6" y="6" rx="1"/><rect width="4" height="14" x="11" y="1" rx="1"/><path fill-rule="evenodd" d="M0 14.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/></svg></button>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de árboles</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tablaForestales" name="tablaForestales" class="table table-striped table-bordered">
                    <thead class="text-primary">
                      <tr>
                      <th>ID</th>
                      <th>#</th>
                      <th>Nombre_Regional</th>
                      <th>Familia</th>
                      <th>Especie</th>
                      <th>Número_Campo</th>
                      <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Modal-->
      <div class="modal fade" id="modalAltaEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header text-light" style="background: #143153">
                <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: #fff" aria-hidden="true">&times;</span></button>
                            </div>
                            <form id="form" name="form">
                              @csrf
                                <div class="modal-body">
                                   <div class="form-group" style="margin-bottom: 20px;"> 
                                  <select class="form-control" data-toggle='tooltip' title='Seleccione un tipo de formulario' onChange="formulario(this)">
                                  <option value="0">Sencillo</option>
                                  <option value="1">Compuesto</option>
                                </select>
                                   </div>
                                    <input id="id" type="hidden"> <!-- ID que vamos a recibir de firebase -->
                                    <div class="form-group" style="display: flex">       
                                    <input id="numero_campo" data-toggle='tooltip' title='Ingrese número de campo' type="text" placeholder="Ingrese número de campo*" class="form-control" required>
                                    <input id="nombre_regional" data-toggle='tooltip' title='Ingrese nombre regional' type="text" placeholder="Ingrese nombre regional*"  class="form-control" required>
                                    </div>
                                    <div class="form-group" style="display: flex">
                                    <select id="familia" data-toggle='tooltip' title='Seleccione un tipo de familia' required class="form-control"></select>
                                    <select id="especie" data-toggle='tooltip' title='Seleccione un tipo de especie' required class="form-control"></select>
                                    </div>  
                                    <div class="form-group" style="display: flex">
                                       <input id="altura_total" data-toggle='tooltip' title='Ingrese altura total (M)' placeholder="Ingrese altura total (M)*" type="text" class="form-control" required>
                                       <input id="altura_comercial" data-toggle='tooltip' title='Ingrese altura comercial (M)' type="text" placeholder="Ingrese altura comercial (M)*" class="form-control" required>
                                    </div>
                                    <div class="form-group" style="display: flex">
                                       <input id="cap_1" data-toggle='tooltip' title='Ingrese CAP 1 (CM)' placeholder="Ingrese CAP 1 (CM)*" type="text" class="form-control" required>
                                       <input id="cap_2" data-toggle='tooltip' title='Ingrese CAP 2 (CM)' type="text" placeholder="Ingrese CAP 2 (CM)*" class="form-control" required>
                                    </div>
                                     <div class="form-group" style="display: flex">
                                       <input id="cap_3" data-toggle='tooltip' title='Ingrese CAP 3 si posee (CM)' placeholder="Ingrese CAP 3 si posee (CM)" type="text" class="form-control">
                                       <input id="cap_4" data-toggle='tooltip' title='Ingrese CAP 4 si posee (CM)' type="text" placeholder="Ingrese CAP 4 si posee (CM)" class="form-control">
                                    </div>
                                    <div class="form-group" style="display: flex">
                                       <input id="cap_5" data-toggle='tooltip' title='Ingrese CAP 5 si posee (CM)' placeholder="Ingrese CAP 5 si lo tiene (CM)" type="text" class="form-control">
                                       <input id="cap_6" data-toggle='tooltip' title='Ingrese CAP 6 si posee (CM)' type="text" placeholder="Ingrese CAP 6 si posee (CM)" class="form-control">
                                    </div>
                                    <!--COMPUESTO-->
                                    <div id="compuesto" style="display:none;">
                                      <div class="form-group" style="display: flex">
                                       <input id="coor_x" data-toggle='tooltip' title='Ingrese Coordenada X' placeholder="Ingrese Coordenada X*" type="text" class="form-control">
                                       <input id="coor_y" data-toggle='tooltip' title='Ingrese Coordenada Y' type="text" placeholder="Ingrese Coordenada Y*" class="form-control">
                                    </div>
                                     <div class="form-group" style="display: flex">
                                       <input id="cap" data-toggle='tooltip' title='Ingrese CAP total (CM)' placeholder="Ingrese CAP total (CM)*" type="text" class="form-control">
                                       <input id="dap" data-toggle='tooltip' title='Ingrese DAP total (CM)' type="text" placeholder="Ingrese DAP total (CM)*" class="form-control">
                                    </div>
                                     <div class="form-group" style="display: flex">
                                       <input id="area_basa" data-toggle='tooltip' title='Ingrese Área Basa' placeholder="Ingrese Área Basa*" type="text" class="form-control">
                                       <input id="volumen_to" data-toggle='tooltip' title='Ingrese Volumen Total' type="text" placeholder="Ingrese Volumen Total*" class="form-control">
                                    </div>
                                    <div class="form-group" style="display: flex">
                                       <input id="volumen_co" data-toggle='tooltip' title='Ingrese Volumen Comercial' placeholder="Ingrese Volumen Comercial*" type="text" class="form-control">
                                         <select id="ps" data-toggle='tooltip' title='Seleccione un tipo de PS' class="form-control">
                                          <option>Seleccione una PS*</option>
                                          <option value="Medio">Medio</option>
                                          <option value="Inferior">Inferior</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="display: flex">
                                       <select id="rn" data-toggle='tooltip' title='Seleccione un tipo de RN' class="form-control">
                                          <option>Seleccione un RN*</option>
                                          <option value="Ct3">Ct3</option>
                                        </select>
                                        <select id="clase_diam" data-toggle='tooltip' title='Seleccione una Clase_Diam' class="form-control">
                                          <option>Seleccione Clase_diam*</option>
                                          <option value="I">I</option>
                                          <option value="II">II</option>
                                          <option value="III">III</option>
                                          <option value="IV">IV</option>
                                          <option value="V">V</option>
                                          <option value="VI">VI</option>
                                          <option value="VII">VII</option>
                                          <option value="VIII">VIII</option>
                                          <option value="IX">IX</option>
                                        </select>
                                    </div>
                                    </div>
                                    <!--FIN COMPUESTO-->
                                    <center>
                                    <div class="form-group">
                                      <label for="imagen" class="subir">
                                          <i class="fas fa-cloud-upload-alt"></i> Subir archivo
                                      </label>
                                      <input data-toggle='tooltip' title='Seleccione una imagen' 
                                      type="file" id="imagen" onchange='cambiar()' type="file" style='display: none;' 
                                      class="form-control">
                                      <div id="info"></div>
                                    </div>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" style="background: #143153" data-dismiss="modal" tabindex="2">Cancelar</button>
                                    <button type="submit" value="btnGuardar" class="btn btn-success" translate="1">Guardar</button>
                                </div>
                            </form>
                    </div>
                </div>
                </div>
      
      <script>
        function cambiar(){
        var pdrs = document.getElementById('imagen').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
        }

        function formulario(sel) {
          if (sel.value=="1"){
              divT = document.getElementById("compuesto");
              divT.style.display = "";
          }else{
              divC = document.getElementById("compuesto");
              divC.style.display="none";
          }
        }
      </script>
    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/Firebasejs/forestales.js"></script>
  
@endsection