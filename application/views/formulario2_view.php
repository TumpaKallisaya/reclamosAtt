<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario 2</title>

		 <link href="<?php echo base_url();?>resources/css/bootstrap.css" rel="stylesheet">

</head>
<body>
	
		<div id="container">
      <form class="form-horizontal" action="<?php site_url('principal/guardarFormulario2'); ?>">
        <fieldset>

          <!-- Form Name -->
          <legend>formulario 2</legend>
          <h3>Titular</h3>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Nome do Proprietário">Carnet de Identidad</label>  
            <div class="col-md-4">
            <input id="" name="ci" placeholder="Carnet de Identidad" class="form-control input-md" required="" type="text">
              
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="Nome do Proprietário">Nombres</label>  
            <div class="col-md-4">
            <input id="" name="nombres" placeholder="Nombres" class="form-control input-md" required="" type="text">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Apellido Paterno</label>  
            <div class="col-md-4">
            <input id="" name="ap_paterno" placeholder="Apellido Paterno" class="form-control input-md" required="" type="text">s
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Apellido Materno</label>  
            <div class="col-md-4">
            <input id="" name="ap_materno" placeholder="Apellido Materno" class="form-control input-md" required="" type="text">s
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Apellido Casada</label>  
            <div class="col-md-4">
            <input id="" name="ap_casada" placeholder="Apellido Casada" class="form-control input-md" required="" type="text">s
              
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Dirección</label>  
            <div class="col-md-4">
            <input id="" name="direccion" placeholder="Direción" class="form-control input-md" required="" type="text">
              
            </div>
          </div>

           <div class="form-group">
            <label class="col-md-4 control-label" for="Celular">Fecha de Nacimiento</label>  
            <div class="col-md-4">
            <input id="" name="fecha_nacimiento" placeholder="Fecha de Naciemiento" class="form-control input-md" required="" type="text">
              
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