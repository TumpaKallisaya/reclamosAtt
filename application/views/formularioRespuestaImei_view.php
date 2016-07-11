    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Datos del IMEI</h1>
                <hr>
                <p></p>
                <div class="row">
                  <div class="imeiBack">
                    <label><b>Imei introducido: </b></label>
                    <?php echo $imei; ?>
                  </div>
                  <div class="row datosImeiInfo">
                    <div class="col-md-6 col-md-offset-3">
                      <table border="0">
                        <tr>
                          <th>Modelo: </th>
                          <th> <?php echo $modelo; ?></th>
                        </tr>
                        <tr>
                          <th>Marca: </th>
                          <th> <?php echo $marca; ?></th>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <a href="<?php echo site_url('principal/irFormularioImei'); ?>" class="btn btn-primary btn-xl page-scroll" style="margin-top:20px;">Volver a consultar</a>
                  
                </div>
                <p class="leyenda">Servicio brindado por la Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes</p>
            </div>
        </div>
    </header>