<link rel="stylesheet" href="/assets/css/style2.css">
<div class="full-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
        <div class="card">
          <div class="image"><img src="../assets/img/med1.jpg" width="100%" />
          </div>
          <div class="text">
            <h5><a href="/lista_pacienti" class="btn btn-primary">Lista Pacienti</a></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
        <div class="card">
          <div class="image"><img src="../assets/img/med3.jpg" width="100%" /></div>
          <div class="text">
            <h5><a href="/medicalrecord" class="btn btn-primary">Medical report</a></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
        <div class="card">
          <div class="image"><img src="../assets/img/med2.jpg" width="100%" />
          </div>
          <div class="text">
            <h5><a href="/dosar_pacienti" class="btn btn-primary">Dosar Pacienti</a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if (session()->get('is_admin') == 1) : ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
          <div class="card">
            <div class="image"><img src="../assets/img/med4.jpg" width="100%" /></div>
            <div class="text">
              <h5><a href="/mod_financiar" class="btn btn-primary">Mod Financiar</a></h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
          <div class="card">
            <div class="image"><img src="" width="100%" /></div>
            <div class="text">
              <h5><a href="/administrare" class="btn btn-primary">Administrare</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>