<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario 1</title>

		 <link href="<?php echo base_url();?>resources/css/bootstrap.css" rel="stylesheet">

</head>
<body>
	
		<div id="container">
        <fieldset>

          <!-- Form Name -->
          <legend>IMEI</legend>
          <h3>Operador Movil</h3>

          <!-- Text input-->
          <!--<form action="<?php echo site_url('principal/procesarImei'); ?>" method="post">-->
          <form>
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtImei">Ingrese el IMEI:</label>  
              <div class="col-md-4">
                <input id="txtImei" name="txtImei"  class="form-control input-md" required="" type="text">                
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8">
                <button id="btnGuardarImei" class="btn btn-success">Guardar</button>
                <button id="Limpar" name="Limpar" class="btn btn-primary">Limpar</button>
                <a href="<?php echo site_url('principal'); ?>" class="btn btn-warning">Volver</a>
              </div>
            </div>
          </form>
        </fieldset>
		</div>

    <script src="<?php echo base_url();?>resources/js/jquery-1.11.2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btnGuardarImei').click(function(){
              
              var imei = $('#txtImei').val();
              var html = $.getJSON('http://www.imei.info/?' + imei);

              console.log('valor html ' + html);

              //console.log($(html).children());

              //$.get();
            });
        });
    </script>

    
</body>
</html>