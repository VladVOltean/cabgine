<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>

<div class="container">
  <div class="row">
    <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <?php if ($user):?>
        <h3><?= $user['firstname'].' '.$user['lastname'] ?></h3>
        <?php else:?>
          <h3>Add user</h3>
        <?php endif;?>
        <hr>
        <form class="" enctype="multipart/form-data" action="<?php base_url('profile/'.$user["id"]); ?>" method="post">
          <div class="row">
          <div class="col-12">
          <div class="form-group">
              <label for="sel">Title:</label>
              <select name="title" class="form-control" id="sel">
                  <option value="<?= set_value('title', $user['title']) ?>"><?= set_value('title', $user['title']) ?></option>
                  <option value="Dr.">Dr(Doctor)</option>
                  <option value="RN.">RN(Registered Nurses)</option>
                  <option value="ACCT.">ACCT(Accountant)</option>
                  <option value="Admin.">Admin(Administrator)</option>
              </select>
            </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="firstname">First Name</label>
               <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname', $user['firstname']) ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="lastname">Last Name</label>
               <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname', $user['lastname']) ?>">
              </div>
            </div>
            <div class="col-12">
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload Signature</label>
                <input type="file" name="signature" class="form-control-file" id="exampleFormControlFile1ime">
            </div>
            </div>
            <?php if(session()->get('is_admin') == 1) :?>
            <div class="col-12">
              <div class="form-check" style="margin-left: 10px;">
                  <input type="checkbox" name="admin" <?php if($user['is_admin']==1): ?> checked <?php endif;?> value="1" class="form-check-input" id="admin">
                        <label class="form-check-label" for="admin"> Is Admin </label>
              </div>
            </div>
            <?php endif; ?>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= $user['email'] ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>
          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary"><?php if($user):?>Update<?php else:?>Save<?php endif;?></button>
            </div>
            <div class="col-12 col-sm-8 text-right">
            <?php if(session()->get('is_admin') == 1) :?>
              <a href="/users" type="button" class="btn btn-primary">Close</a>
            <?php else:?>
              <a href="/patients_list" type="button" class="btn btn-primary">Close</a>
              <?php endif; ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>