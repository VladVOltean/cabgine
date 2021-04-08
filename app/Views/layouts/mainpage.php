<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstratp.min.css');?>"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

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
      <a class="navbar-brand" href="/patients_list">Gynecology</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php if (session()->get('isLoggedIn')) : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
              <a class="nav-link" href="/patients_list">Patients</a>
            </li>
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
              <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
              <a class="nav-link" href="/">Login</a>
            <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
              <a class="nav-link" href="/register">Register</a>
            </li>
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
<?= $this->renderSection('scripts') ?>
</body>

</html>