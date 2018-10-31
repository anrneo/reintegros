
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reintegros Sumimedical</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">       

    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   

</head>

<body>
<div class="container-fluid">
    <div class="card">
            <img class="img-fluid" src="img/reintegro.PNG" alt="">
    </div>

<br>
<div class="alert alert-primary" style="text-align:justify" role="alert">
Pensando en tu comodidad creamos opciones para ofrecerte mayor accesibilidad a nuestros servicios. Por esta razón tramitar tu solicitud de reintegros ahora es más sencillo, únicamente debes llenar el siguiente formulario.

Señor usuario, tenga en cuenta que los reintegros por transporte se reconocen en los siguientes casos: <a href="https://redvitalut.com/requisitos-para-reintegros/" target="_blank" rel="noopener">Ver requisitos.</a>
    </div>
    </div>
<div class="col-sm-12">
<div class="card bg-light text-black text-center shadow p-2 mb-2">
    <div class="card-body">
	<h3>Datos del Usuario</h3>
	</div>
  </div>	
    <form action="guardar.php" method="post" enctype="multipart/form-data" id='dataform' class="was-validated">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="f_atencion">Fecha de Atención Médica<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="date" class="form-control" id="f_atencion" name="f_atencion" required>
            </div>
            <div class="form-group col-md-3">
                <label for="nombres">Primer Nombre<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="text" class="form-control" id="pnombre" name="pnombre" required>
            </div>
            <div class="form-group col-md-3">
                <label for="apellidos">Segundo Nombre<b class="text-danger" style="font-size:20px"></b></label>
                <input type="text" class="form-control" id="snombre" name="snombre" >
            </div>
            <div class="form-group col-md-3">
                <label for="nombres">Primer Apellido<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="text" class="form-control" id="papellido" name="papellido" required>
            </div>
            <div class="form-group col-md-3">
                <label for="apellidos">Segundo Apellido<b class="text-danger" style="font-size:20px"></b></label>
                <input type="text" class="form-control" id="sapellido" name="sapellido" >
            </div>
            <div class="form-group col-md-3">
                <label for="edad">Edad<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-group col-md-3">
                <label for="t_afiliado">Tipo de Afiliado<b class="text-danger" style="font-size:20px"> *</b></label>
                <select id="t_afiliado" class="form-control" name="t_afiliado" required>
                    <option selected>Docente Cotizante</option>
                    <option>Beneficiario</option>
                    <option>Sustituto Pensional</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="t_id">Tipo de Identificación<b class="text-danger" style="font-size:20px"> *</b></label>
                <select id="t_id" class="form-control" name="t_id" required>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cédula de Extranjeria</option>
                    <option value="PA">Pasaporte</option>
                    <option value="RC">Registro Civil</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="num_id">Número de Identificación<b id="ident" style="font-size:20px; color:red">  * </b><b id="ident2" class="text-danger"></b></label>
                <input type="number" class="form-control" id="num_id" name="num_id" required>
            </div>
            <div class="form-group col-md-3">
                <label for="tel1">Teléfono 1<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="number" class="form-control" id="tel1" name="tel1" required>
            </div>
            <div class="form-group col-md-3">
                <label for="tel2">Teléfono 2<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="number" class="form-control" id="tel2" name="tel2" required>
            </div>
            <div class="form-group col-md-3">
                <label for="email">Correo<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group col-md-2">
                <label for="dpto1">Departamento de Origen<b class="text-danger" style="font-size:20px"> *</b></label>
                <select  class="form-control" id="dpto1" name="dpto1" require>
                   
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="ciudad1">Ciudad de Origen<b class="text-danger" style="font-size:20px"> *</b></label>
                <select id="ciudad1" class="form-control" name="ciudad1" require>
                        
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="dpto2">Departamento de Destino<b class="text-danger" style="font-size:20px"> *</b></label>
                <select  class="form-control" id="dpto2" name="dpto2" require>
                   
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="ciudad2">Ciudad de Destino<b class="text-danger" style="font-size:20px"> *</b></label>
                <select id="ciudad2" class="form-control" name="ciudad2" require>
                      
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="direccion">Dirección de Residencia<b class="text-danger" style="font-size:20px"> *</b></label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
           <div class="col-sm-12">
                <div class="card bg-light text-black text-center shadow p-2 mb-2">
                    <div class="card-body">
                    <h3> Datos del servicio médico atendido </h3>
                    </div>
                  </div>
           </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="servicio">Servicio Médico Atendido<b class="text-danger" style="font-size:20px"> *</b></label>
              <input type="text" class="form-control" id="servicio" name="servicio" required>
            </div>
            <div class="form-group col-md-4">
              <label for="ins_medica">Institución Médica<b class="text-danger" style="font-size:20px"> *</b></label>
              <input type="text" class="form-control" id="ins_medica" name="ins_medica" required>
            </div>
            <div class="form-group col-md-4">
              <label for="municipiomedica">Municipio de la Institución Médica<b class="text-danger" style="font-size:20px"> *</b>
                </label>
              <input type="text" class="form-control" id="municipiomedica" name="municipiomedica" required>
            </div>
            <div class="form-group col-md-3">
              <label for="profesional">Nombre del profesional que lo atendió<b class="text-danger" style="font-size:20px"> *</b></label>
              <input type="text" class="form-control" id="profesional" name="profesional" required>
            </div>
            <div class="form-group col-md-3">
              <label for="acompanante">Acompañante<b class="text-danger" style="font-size:20px"> *</b></label>
              <select id="acompanante" class="form-control" name="acompanante" id="acompanante">
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </div>
            <div class="form-group col-md-3" id="divdacompa">
              <label for="dacompanante">Nombres del acompañante<b class="text-danger" style="font-size:20px"> *</b></label>
              <input type="text" class="form-control" id="dacompanante" name="dacompanante" required>
            </div>
            <div class="form-group col-md-3">
              <label for="mtransporte">Medio de transporte<b class="text-danger" style="font-size:20px"> *</b></label>
              <select id="mtransporte" class="form-control" name="mtransporte" required>
                    <option>Terrestre</option>
                    <option>Aéreo </option>
                </select>
            </div>
            <div class="col-sm-12">
                    <div class="card bg-light text-black text-center shadow p-2 mb-2">
                        <div class="card-body">
                        <h3> Datos de la cuenta para efectuar reintegro </h3>
                        </div>
                      </div>
               </div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="nombretitular">Nombre completo del titular de la cuenta<b class="text-danger" style="font-size:20px"> *</b></label>
                  <input type="text" class="form-control" id="nombretitular" name="nombretitular" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="documentotitular">Número de documento del titular<b id="docuti" style="font-size:20px; color:red"> * </b><b id="docuti2" class="text-danger"></b></label>
                  <input type="number" class="form-control" id="documentotitular" name="documentotitular" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="numerocuenta">Número de cuenta bancaria<b id="numcue" style="font-size:20px; color:red"> * </b><b id="numcue2" class="text-danger"></b></label>
                  <input type="number" class="form-control" id="numerocuenta" name="numerocuenta" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="entidadcuenta">Entidad Bancaria<b class="text-danger" style="font-size:20px"> *</b></label>
                  <select id="entidadcuenta" class="form-control" name="entidadcuenta">
                        <option value="1040">BANCO AGRARIO</option>
                        <option value="6013677">BANCO AV VILLAS</option>
                        <option value="5600829">BANCO CAJA SOCIAL</option>
                        <option value="5600191">BANCO COLPATRIA</option>
                        <option value="1067">BANCO COMPARTIR S.A</option>
                        <option value="1066">BANCO COOPERATIVO COOPCENTRAL</option>
                        <option value="5895142">BANCO DAVIVIENDA S.A</option>
                        <option value="5600010">BANCO DE BOGOTA</option>
                        <option value="5600230">BANCO DE OCCIDENTE</option>
                        <option value="1062">BANCO FALABELLA S.A</option>
                        <option value="1063">BANCO FINANDINA S.A</option>
                        <option value="5600120">BANCO GNB SUDAMERIS</option>
                        <option value="1064">BANCO MULTIBANK S.A.</option>
                        <option value="1060">BANCO PICHINCHA </option>
                        <option value="5600023">BANCO POPULAR</option>
                        <option value="1058">BANCO PROCREDIT COLOMBIA</option>
                        <option value="1065">BANCO SANTANDER DE NEGOCIOS COLOMBIA S.A</option>
                        <option value="5600078">BANCOLOMBIA</option>
                        <option value="1061">BANCOOMEVA</option>
                        <option value="5600133">BBVA</option>
                        <option value="5600094">CITIBANK</option>
                        <option value="1370">COLTEFINANCIERA S.A</option>
                        <option value="1292">CONFIAR COOPERATIVA FINANCIERA</option>
                        <option value="1283">COOPERATIVA FINANCIERA DE ANTIOQUIA</option>
                        <option value="1289">COOTRAFA COOPERATIVA FINANCIERA</option>
                        <option value="1121">JURISCOOP </option>
                        <option value="5600146">CORPBANCA-ITU</option>
                        <option value="5600065">BANCO CORPBANCA COLOMBIA S.A </option>

                    </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="tipocuenta">Tipo de cuenta<b class="text-danger" style="font-size:20px"> *</b></label>
                  <select id="tipocuenta" class="form-control" name="tipocuenta">
                        <option value="7">Ahorros</option>
                        <option value="1">Corriente</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="valor">Valor<b id="valu" style="font-size:20px; color:red"> * </b><b id="valu2" class="text-danger"></b></label>
                  <input type="number" class="form-control" id="valor" name="valor" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="adhistoria"><b>Copia de la historia clínica o constancia de asistencia</b><b class="text-danger" style="font-size:20px"> *</b>
                  <br>
                  <b><i class="text-danger">Formato permitido: Pdf, Max: 3Mb</i></b>
                  </label>
                  <input type="file" class="form-control-file border" name="adhistoria" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="addocumento"><b>Copia del documento de identidad</b><b class="text-danger" style="font-size:20px"> *</b><br>
                  <b><i class="text-danger"> Formato permitido: Pdf, Max: 3Mb</i></b>
                  </label>
                  <input type="file" name="addocumento" class="form-control-file border" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="adtiquete"><b>Copia del tiquete</b><b class="text-danger" style="font-size:20px"> *</b><br>
                  <b><i class="text-danger">Formato permitido: Pdf, Max: 3Mb</i></b>
                  </label>
                  <input type="file" class="form-control-file border" name="adtiquete" required>
                </div>
          </div>
          <br>
          <div class="alert alert-success" role="alert">
          Señor usuario, asegúrese de que los datos suministrados en el presente documente sean correctos. Tenga en cuenta que el reintegro solicitado se depositará al número de cuenta ingresado y que, en caso de que exista algún error en el diligenciamiento RedVital U.T. no se hará responsable.
          </div>
          <div class="was-validated">
                <div class="custom-control custom-checkbox mb-3 text-center">
                    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                    <label class="custom-control-label" for="customControlValidation1"><b> * Con el diligenciamiento de este formato autorizo expresamente el uso de mis datos personales según Ley 1581 de 2012</b></label>
                </div>
        </div>
          
          <button type="submit" class="btn btn-info btn-block"><b style="">Enviar solicitud</b></button>
          <br>
    </form>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="botonmodal" hidden>
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
      </div>
      <div class="modal-body">
        <button class="btn btn-primary btn-lg btn-block" id="buttonload">
          <i class="fa fa-spinner fa-spin"></i> Procesando, espere por favor...
        </button>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
</body>
<script>
$(document).ready(function(){

   /* $('#email').on('focusout', function(){
        $.ajax({
        method: "POST",
        url: "validaremail.php",
        data: { email: $(this).val() }
      })
        .done(function( msg ) {
            //console.log(msg);
            
        })
    })*/

    $("#dataform").on("submit", function(event) {
    if  (!/^([0-9])*$/.test($('#num_id').val())  || !/^([0-9])*$/.test($('#valor').val()) || !/^([0-9])*$/.test($('#documentotitular').val())
    || !/^([0-9])*$/.test($('#numerocuenta').val())) {
        toastr.options = { "closeButton": true, "progressBar": true};
        toastr.error("Por favor valida la información y los campos obligatorios, gracias");
    event.preventDefault();
     }
     $('#botonmodal').click()
}),

    $('#num_id').on({
   focusout:function(){
if($(this).val()=='' || !/^([0-9])*$/.test($(this).val())){
$('#ident').html(' <i class="fa fa-times-circle"></i>').css({"color":"Red"})
$('#ident2').html('(0-9)').css({"color":"Red"}).show()
}else{
   $('#ident').html(' <i class="fa fa-check-circle"></i>').css({"color":"LimeGreen"})
   $('#ident2').hide()
}
}
}),

    $('#valor').on({
   focusout:function(){
if($(this).val()=='' || !/^([0-9])*$/.test($(this).val())){
$('#valu').html(' <i class="fa fa-times-circle"></i>').css({"color":"Red"})
$('#valu2').html('(0-9)').css({"color":"Red"}).show()
}else{
   $('#valu').html(' <i class="fa fa-check-circle"></i>').css({"color":"LimeGreen"})
   $('#valu2').hide()
}
}
}),

$('#documentotitular').on({
   focusout:function(){
if($(this).val()=='' || !/^([0-9])*$/.test($(this).val())){
$('#docuti').html(' <i class="fa fa-times-circle"></i>').css({"color":"Red"})
$('#docuti2').html('(0-9)').css({"color":"Red"}).show()
}else{
   $('#docuti').html(' <i class="fa fa-check-circle"></i>').css({"color":"LimeGreen"})
   $('#docuti2').hide()
}
}
}),


    $('#numerocuenta').on({
   focusout:function(){
if($(this).val()=='' || !/^([0-9])*$/.test($(this).val())){
$('#numcue').html(' <i class="fa fa-times-circle"></i>').css({"color":"Red"})
$('#numcue2').html('(0-9)').css({"color":"Red"}).show()
}else{
   $('#numcue').html(' <i class="fa fa-check-circle"></i>').css({"color":"LimeGreen"})
   $('#numcue2').hide()
}
}
}),

$('#acompanante').on('change', function(){
   if($(this).val()=='NO'){
    $('#divdacompa').hide()
    $('#dacompanante').val('n/a')
   }else{
    $('#divdacompa').show()
    $('#dacompanante').val('')
   }
})


    


  $(document).on('change','input[type="file"]',function(){
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 3000000){
        toastr.options = { "closeButton":true, "progressBar": true};
        toastr.error("El archivo no debe superar los 3MB");
		this.value = '';
		this.files[0].name = '';
	}else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();

		 console.log(ext);
		switch (ext) {
            case 'PDF':
			case 'pdf': break;
			default:
            toastr.options = { "closeButton":true, "progressBar": true};
            toastr.error("El archivo no tiene la extensión adecuada");				
            this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});

dptos =[  
  
   {  
       "id":0,
       "departamento":"Antioquia",
       "ciudades":[  
           "Abejorral",
           "Abriaqu\u00ed",
           "Alejandr\u00eda",
           "Amag\u00e1",
           "Amalfi",
           "Andes",
           "Angel\u00f3polis",
           "Angostura",
           "Anor\u00ed",
           "Anz\u00e1",
           "Apartad\u00f3",
           "Arboletes",
           "Argelia",
           "Armenia",
           "Barbosa",
           "Bello",
           "Belmira",
           "Betania",
           "Betulia",
           "Brice\u00f1o",
           "Buritic\u00e1",
           "C\u00e1ceres",
           "Caicedo",
           "Caldas",
           "Campamento",
           "Ca\u00f1asgordas",
           "Caracol\u00ed",
           "Caramanta",
           "Carepa",
           "Carolina del Pr\u00edncipe",
           "Caucasia",
           "Chigorod\u00f3",
           "Cisneros",
           "Ciudad Bol\u00edvar",
           "Cocorn\u00e1",
           "Concepci\u00f3n",
           "Concordia",
           "Copacabana",
           "Dabeiba",
           "Donmat\u00edas",
           "Eb\u00e9jico",
           "El Bagre",
           "El Carmen de Viboral",
           "El Pe\u00f1ol",
           "El Retiro",
           "El Santuario",
           "Entrerr\u00edos",
           "Envigado",
           "Fredonia",
           "Frontino",
           "Giraldo",
           "Girardota",
           "G\u00f3mez Plata",
           "Granada",
           "Guadalupe",
           "Guarne",
           "Guatap\u00e9",
           "Heliconia",
           "Hispania",
           "Itag\u00fc\u00ed",
           "Ituango",
           "Jard\u00edn",
           "Jeric\u00f3",
           "La Ceja",
           "La Estrella",
           "La Pintada",
           "La Uni\u00f3n",
           "Liborina",
           "Maceo",
           "Marinilla",
           "Medell\u00edn",
           "Montebello",
           "Murind\u00f3",
           "Mutat\u00e1",
           "Nari\u00f1o",
           "Nech\u00ed",
           "Necocl\u00ed",
           "Olaya",
           "Peque",
           "Pueblorrico",
           "Puerto Berr\u00edo",
           "Puerto Nare",
           "Puerto Triunfo",
           "Remedios",
           "Rionegro",
           "Sabanalarga",
           "Sabaneta",
           "Salgar",
           "San Andr\u00e9s de Cuerquia",
           "San Carlos",
           "San Francisco",
           "San Jer\u00f3nimo",
           "San Jos\u00e9 de la Monta\u00f1a",
           "San Juan de Urab\u00e1",
           "San Luis",
           "San Pedro de Urab\u00e1",
           "San Pedro de los Milagros",
           "San Rafael",
           "San Roque",
           "San Vicente",
           "Santa B\u00e1rbara",
           "Santa Fe de Antioquia",
           "Santa Rosa de Osos",
           "Santo Domingo",
           "Segovia",
           "Sons\u00f3n",
           "Sopetr\u00e1n",
           "T\u00e1mesis",
           "Taraz\u00e1",
           "Tarso",
           "Titirib\u00ed",
           "Toledo",
           "Turbo",
           "Uramita",
           "Urrao",
           "Valdivia",
           "Valpara\u00edso",
           "Vegach\u00ed",
           "Venecia",
           "Vig\u00eda del Fuerte",
           "Yal\u00ed",
           "Yarumal",
           "Yolomb\u00f3",
           "Yond\u00f3",
           "Zaragoza"
       ]
   },
  
   {  
       "id":1,
       "departamento":"Choc\u00f3",
       "ciudades":[  
           "Acand\u00ed",
           "Alto Baud\u00f3",
           "Bagad\u00f3",
           "Bah\u00eda Solano",
           "Bajo Baud\u00f3",
           "Bojay\u00e1",
           "Cant\u00f3n de San Pablo",
           "C\u00e9rtegui",
           "Condoto",
           "El Atrato",
           "El Carmen de Atrato",
           "El Carmen del Dari\u00e9n",
           "Istmina",
           "Jurad\u00f3",
           "Litoral de San Juan",
           "Llor\u00f3",
           "Medio Atrato",
           "Medio Baud\u00f3",
           "Medio San Juan",
           "N\u00f3vita",
           "Nuqu\u00ed",
           "Quibd\u00f3",
           "R\u00edo Ir\u00f3",
           "R\u00edo Quito",
           "Riosucio",
           "San Jos\u00e9 del Palmar",
           "Sip\u00ed",
           "Tad\u00f3",
           "Uni\u00f3n Panamericana",
           "Ungu\u00eda"
       ]
   },
   
]

var dpto1 = $('#dpto1')
               dpto1.html('') 
               dptos.forEach(function(depar) {
                   dpto1.append('<option>'+depar.departamento+'</option>')
                })

var city1 = $('#ciudad1')
               city1.html('') 
               dptos[0].ciudades.forEach(function(depar) {
                city1.append('<option>'+depar+'</option>')
                })

var city2 = $('#ciudad2')
               city2.html('') 
               dptos[0].ciudades.forEach(function(depar) {
                city2.append('<option>'+depar+'</option>')
                })
  
$('#dpto1').on('click',function(){
    nom = $('#dpto1').val()
        for(i=0; i<dptos.length;i++){
          if(dptos[i].departamento==nom){
           ide = i
          }
        }
   var ciudad = $('#ciudad1')
   ciudad.html('')  
   dptos[ide].ciudades.forEach(function(cities) {
       ciudad.append('<option>'+cities+'</option>')
        })
   })

   var dpto2 = $('#dpto2')
               dpto2.html('') 
               dptos.forEach(function(depar) {
                   dpto2.append('<option>'+depar.departamento+'</option>')

})
   $('#dpto2').on('click',function(){
   nom = $('#dpto2').val()
   
   for(i=0; i<dptos.length;i++){
          if(dptos[i].departamento==nom){
           ide = i
           
          }
           
   }

   var ciudad = $('#ciudad2')
   ciudad.html('')  
   dptos[ide].ciudades.forEach(function(cities) {
       ciudad.append('<option>'+cities+'</option>')

   })
   

   })

})
</script>
</html>