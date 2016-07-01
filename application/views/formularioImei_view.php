<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ATT - Autoridad de Telecomunicaciones y Transportes">
        <meta name="author" content="Veronica Gutierrez Sanga">
        <title>Formulario 1</title>

        <link rel="stylesheet" href="<?php echo base_url();?>resources/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resources/css/bootstrap-theme.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resources/css/magnific-popup.css" type="text/css"> <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>resources/css/creative.css" type="text/css"> <!-- Custom CSS -->

    </head>
<body style="background:black;">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container-fluid -->
    </nav>
	
		<div id="container">
        <fieldset>

          <!-- Form Name -->
          <legend>IMEI</legend>
          <h3>Operador Movil</h3>

          <!-- Text input-->
          <form action="<?php echo site_url('principal/procesarImei'); ?>" method="post">
          <!--<form>-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtImei">Ingrese el IMEI:</label>  
              <div class="col-md-4">
                <input id="txtImei" name="txtImei"  class="form-control input-md" required="" type="text">                
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8">
                <button type="submit" id="btnGuardarImei" class="btn btn-success">Guardar</button>
                <button id="Limpar" name="Limpar" class="btn btn-primary">Limpar</button>
                <a href="<?php echo site_url('principal'); ?>" class="btn btn-warning">Volver</a>
              </div>
            </div>
          </form>
        </fieldset>
		</div>

    <script src="<?php echo base_url();?>resources/js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>resources/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>resources/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery.fittext.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery.magnific-popup.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>resources/js/creative.js"></script>

    <script type="text/javascript">
       /* $(document).ready(function(){
            $('#btnGuardarImei').click(function(){
              
              var imei = $('#txtImei').val();
              var html = $.getJSON('http://www.imei.info/?' + imei);

              $.get(
                  'http://www.imei.info/?' + imei,
                  function (response) {
                      console.log("> ", response);
                      $("#viewer").html(response);
              });

              
            });


        });*/
    </script>

    
</body>
</html>