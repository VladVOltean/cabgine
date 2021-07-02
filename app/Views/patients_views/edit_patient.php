<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>
        <?php 
        $validation = \Config\Services::validation();
        ?>
        <div class="card ptable" style="width: 85%;">
            <div class="card-header"><?php if($patient):?>Edit Patient Informations<?php else:?>Add Patient<?php endif;?></div>
            <div class="card-body">
                <form method="post" action="<?php if($patient): echo base_url('patient/'.$patient['id_patient']); else: echo base_url('patient/0'); endif;?>">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?= set_value('first_name', $patient['first_name']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('first_name'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('first_name')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">         
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?= set_value('last_name', $patient['last_name']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('last_name'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('last_name')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                            <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" value="<?= set_value('date_of_birth', $patient['date_of_birth']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('date_of_birth'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('date_of_birth')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Civil Status</label>
                                <div class="form-check" style="margin-left: 20px; padding-top: 5px">
                                    <input class="form-check-input" name="civil_status" type="checkbox" <?php if($patient['civil_status']==1):?>checked<?php endif;?> value="1" id="civil_status">
                                    <label class="form-check-label" for="civil_status">
                                        Married
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>ID Nr.</label>
                                <input type="text" name="identification_number" class="form-control" value="<?= set_value('identification_number', $patient['identification_number']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('identification_number'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('identification_number')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>County</label>
                                <select name="county" id="county" class="form-control" data-live-search="true" >
                                    <?php if($patient):?>
                                        <option value="<?= set_value('county', $patient['id_county']) ?>"selected><?=$patient['county']?></option>
                                    <?php else:?>
                                        <option value=""selected>Choose your county</option>
                                    <?php endif;?>
                                    <?php foreach ($countys as $county):?>
                                        <option value="<?=$county['id_county']?>"><?=$county['county']?></option>
                                    <?php endforeach;?>
                                </select>
                                <!-- Error -->
                                <?php
                                if($validation->getError('county'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('county')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>City</label>
                                <select name="city" id="city" class="form-control city_select" data-live-search="true" >
                                <?php if($patient):?>
                                    <option value="<?= set_value('city', $patient['id_city']) ?>"selected><?=$patient['city']?></option>
                                <?php else:?>
                                    <option value="" disabled selected>Choose your city</option>
                                <?php endif;?>
                                </select>
                                <!-- Error -->
                                <?php
                                if($validation->getError('city'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('city')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?= set_value('address', $patient['address']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('address'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('address')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="telephone" class="form-control" value="<?= set_value('telephone', $patient['telephone']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('telephone'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('telephone')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" value="<?= set_value('email', $patient['email']) ?>">
                                <!-- Error -->
                                <?php 
                                if($validation->getError('email'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('email')."
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                            <div class="col-3">
                            <div class="form-group">
                                <label>Job title</label>
                                <input type="text" name="ocuppation" class="form-control" value="<?= set_value('ocuppation', $patient['ocuppation']) ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Work place</label>
                                <input type="text" name="job" class="form-control" value="<?= set_value('job', $patient['job']) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary"><?php if($patient):?>Update<?php else:?>Save<?php endif;?></button>
                            <button type="submit" name="consult" class="btn btn-primary">Consult</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/patients_list" type="button" class="btn btn-primary">Close</a>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/edit_patient.js');?>" ></script>
<?= $this->endSection() ?>