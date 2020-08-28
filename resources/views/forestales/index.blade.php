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
              
              <div class='wrapper text-right'>
                <div class='btn-group'>
                  <a class='btn btn-success' href="#" id="excelg">Excel</a>
                </div>
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
                                      <img id="ver_imagen" data-toggle='tooltip' title='Miniatura de la imagen' width="100px" height="100px">
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
      <div id="imprimir" style="display: none">
        <style>
          .clearfix:after {
            content: "";
            display: table;
            clear: both;
          }

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 110px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  font-size: 1.1em;
  font-family: normal;
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 10px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1em;
}

table tbody tr:last-child td {
  border: none;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


        </style>
            <header class="clearfix">
            <div id="logo">
              <img src="assets/img/alcaldia.png">
            </div>
            <div id="company">
              <h2 class="name" style="font-family: bold;">FICHA TÉCNICA DE REGISTRO</h2>
              <div>Radicado: xxx</div>
              <div>Elaboró: xxx</div>
              <div>Fecha Aprob: xxx</div>
              <div>Revisó: xxx</div>
              <div>Aprobó: xxx</div>
              <div>Página: 3 de 32</div>
            </div>
          </header>
          <main>
            <div id="details" class="clearfix">
              <div id="client" style="font-size: 1.1em;">
                <div>Fecha: 20/02/2020</div>
                <div>Especie: Ciprés</div>
                <div>Nombre Cien: Cupressus lusitanica</div>
                <div>Arbol: 3</div><br>
                <img width="200px" height="200px" src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Raunkiaer.jpg">
              </div>
              <div id="invoice">
                <div class="date">Sitio de visita: Medellín-Antioquia</div>
                <div class="date">Solicitante: xxx</div>
                <div class="date">Dirección Solic: xxx</div>
                <div class="date">CC O NIT: xxx</div>
                <img width="200px" height="200px" src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Raunkiaer.jpg">
              </div>
            </div>
            <div style="margin-top: -30px" id="notices">
              <div style="font-family: bold;">ESTADO FÍSICO:</div>
              <div class="notice">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</div>
            </div><br>
            <div id="notices">
              <div style="font-family: bold;">ESTADO SANITARIO:</div>
              <div class="notice">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</div>
            </div><br>
            <div style="display: flex;">
            <table style="max-width: 40%;" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style="text-align: left; width: 60%;" class="no">DAP (CM)</td>
                  <td class="unit">400 (CM)</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Altura Total (M)</td>
                  <td class="unit">40 (M)</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Altura Comercial (M)</td>
                  <td class="unit">40 (M)</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Volumen (M3)</td>
                  <td class="unit">400 (M3)</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Diam Copa (M)</td>
                  <td class="unit">40.00 (M)</td>
                </tr>
              </tbody>
            </table>
            <table style="max-width: 40%; margin-left: 150px;" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style="text-align: left; width: 60%;" class="no">Poda</td>
                  <td class="unit">_</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Tala</td>
                  <td class="unit">X</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Bloqueo y Traslado</td>
                  <td class="unit">_</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Conservar</td>
                  <td class="unit">_</td>
                </tr>
                <tr>
                  <td style="text-align: left;" class="no">Tratamiento integral</td>
                  <td class="unit">_</td>
                </tr>
              </tbody>
            </table>
          </div>
            <div id="notices">
              <div style="font-family: bold;">CONCEPTO TÉCNICO:</div>
              <div class="notice">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</div>
            </div><br>
            <div id="notices">
              <div style="font-family: bold;">CAUSAS DE INTERVENCIÓN:</div>
              <div class="notice">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</div>
            </div>
          </main>
          <footer>
            SOFWARE CDC
          </footer>
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
    <script src="assets/js/jspdf.min.js"></script>
    <script src="assets/js/jspdf.plugin.autotable.min.js"></script>
    <script lang="javascript" src="assets/js/FileSaver.min.js"></script>
    <script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.10.3/xlsx.full.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/Firebasejs/forestales.js"></script>
@endsection