<?= $this->extend('layouts/mainpage.php') ?>

<?= $this->section('content') ?>

        <?php

        $validation = \Config\Services::validation();

        ?>

        <div class="card ptable">
            <div class="card-header">
                <div class="row">
                    <div class="col text-left">New Patient</div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("/PatientsList/add_validation");?>">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" />
                        <?php
                        if($validation->getError('first_name'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('first_name').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" />
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

                    <div class="form-group">
                        <label>ID Nr.</label>
                        <input type="number" name="identification_number" class="form-control" />
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

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" >
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

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>

<?= $this->endSection() ?>
