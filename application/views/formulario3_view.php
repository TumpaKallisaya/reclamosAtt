<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario 3</title>

		 <link href="<?php echo base_url();?>resources/css/bootstrap.css" rel="stylesheet">

</head>
<body>
	
		<div id="container">
      <form class="form-horizontal" action="<?php site_url('principal/guardarFormulario1'); ?>">
        <fieldset>

          <!-- Form Name -->
          <legend>formulario 3</legend>
          <h3>Operador Movil</h3>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Nome do Proprietário">Razon Social</label>  
            <div class="col-md-4">
            <input id="" name="razonSocial" placeholder="Razon Social" class="form-control input-md" required="" type="text">
              
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="Nome do Proprietário">Representante Legal</label>  
            <div class="col-md-4">
            <input id="" name="representanteLegal" placeholder="Representante Legal" class="form-control input-md" required="" type="text">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Datos Contacto</label>  
            <div class="col-md-4">
            <input id="" name="datosContacto" placeholder="Datos Contacto..." class="form-control input-md" required="" type="text">s
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Dirección</label>  
            <div class="col-md-4">
            <input id="" name="direccion" placeholder="Direción" class="form-control input-md" required="" type="text">
              
            </div>
          </div>



          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="button1id"></label>
            <div class="col-md-8">
              <button type="submit" id="button1id" name="button1id" class="btn btn-success">Guardar</button>
              <button id="Limpar" name="Limpar" class="btn btn-primary">Limpar</button>
              <a href="<?php echo site_url('principal'); ?>" class="btn btn-warning">Volver</a>
            </div>
          </div>

          <!-- Multiple Checkboxes (inline) -->
          <div class="form-group">
            <div class="col-md-4"></div>
          </div>

          <!-- Multiple Checkboxes (inline) -->
          <div class="form-group">
            <div class="col-md-4"></div>
          </div>

        </fieldset>
      </form>
    </div>
</body>
</html>