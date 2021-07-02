<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstratp.min.css');?>"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>"/>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <title>Mainpage</title>
</head>

<body>
  <?php
  $uri = service('uri');
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container">
      <a class="navbar-logo" href="#" style="max-width: 10%;">
        <img src="/assets/img/logot.png" class="img-fluid">
      </a>
      <a class="navbar-brand" href="/">CabGine</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (session()->get('isLoggedIn')) : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'patients_list' ? 'active' : null) ?>">
              <a class="nav-link" href="/patients_list">Patients</a>
            </li>
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
          <?php if (session()->get('is_admin') == 1) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
               </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/users">Users</a>
                <a class="dropdown-item" href="/examinations">Examinations</a>
                <a class="dropdown-item" href="/analyses">Analysis</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/clinic_data">Clinic info</a>
               </div>
            </li>
          <?php endif; ?>
            <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
              <a class="nav-link" href="<?= base_url('profile/'.session()->get('id')) ?>" >Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
              <a class="nav-link" href="/">Login</a>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <div class="app">

  <?= $this->renderSection('content') ?>
  </div>
<script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"> </script>
<script src="<?= base_url('assets/js/popper.min.js');?>" ></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>" ></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<?= $this->renderSection('scripts') ?>
</body>

</html>