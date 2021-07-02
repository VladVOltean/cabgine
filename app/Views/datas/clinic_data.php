<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>

<div class="card ptable" style="width: 85%;">
    <div class="card-header">Clinic data</div>
        <!-- Succes message -->
        <?php
            $validation = \Config\Services::validation();
            $session = \Config\Services::session();
                if ($session->getFlashdata('success')) 
                    {
                    echo '
                        <div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
                        ';
                    }
        ?>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('clinic_data');?>">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Clinic Name</label>
                            <input type="text" name="name" class="form-control" value="<?= set_value('name', $clinic->name) ?>">
                            <!-- Error -->
                            <?php 
                                if($validation->getError('name'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('name')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-4">         
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?= set_value('email', $clinic->cab_email) ?>">
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
                    <div class="col-4">
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="telephone" class="form-control" value="<?= set_value('telephone', $clinic->telephone) ?>">
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
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?= set_value('address', $clinic->cab_address) ?>">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="logo">Upload logo</label>
                            <input type="file" name="logo" class="form-control-file" id="logo">
                                <!-- Error -->
                            <?php
                                if($validation->getError('logo'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('logo')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Tax identification number</label>
                            <input type="text" name="tax" class="form-control" value="<?= set_value('tax', $clinic->tax_identification_code) ?>">
                            <!-- Error -->
                            <?php 
                                if($validation->getError('tax'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('tax')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Trade register number</label>
                            <input type="text" name="trn" class="form-control" value="<?= set_value('trn', $clinic->trade_register_number) ?>">
                            <!-- Error -->
                            <?php 
                                if($validation->getError('trn'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('trn')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>IBAN</label>
                            <input type="text" name="IBAN" class="form-control" value="<?= set_value('IBAN', $clinic->IBAN) ?>">
                            <!-- Error -->
                            <?php 
                                if($validation->getError('IBAN'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('IBAN')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/users" type="button" class="btn btn-secondary">Close</a>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
<?= $this->endSection() ?>
