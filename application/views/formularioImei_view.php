    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Verifica tu número IMEI</h1>
                <hr>
                <p>Esta herramienta te permite verificar la información del número IMEI de tú aparato celular. Solo escribe el número IMEI y verifícalo!</p>
                <div class="row">
                <form action="<?php echo site_url('principal/procesarImei'); ?>" method="post">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <input id="txtImei" name="txtImei"  class="form-control input-lg text-center imeiVerificar" required="true" placeholder="Ej:012345678987654" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" id="btnGuardarImei" class="btn btn-primary btn-xl page-scroll">Verificar</button>
                  </div>
                  </div>
                </form>
                </div>
                <p class="leyenda">Servicio brindado por la Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes</p>
            </div>
        </div>
    </header>