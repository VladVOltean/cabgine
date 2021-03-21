<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/style.css">

<?php 

        $validation = \Config\Services::validation();


        ?>
        
        
        <div class="card ptable">
            <div class="card-header">Edit Patient Informations</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('ListaPacienti/edit_validation'); ?>">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user_data['first_name']; ?>">

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
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user_data['last_name']; ?>">

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
                    <div class="form-group">
                        <label>ID Nr.</label>
                        <input type="number" name="identification_number" class="form-control" value="<?php echo $user_data['identification_number']; ?>">

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
                        <input type="date" name="date_of_birth" class="form-control" value="<?php echo $user_data['date_of_birth']; ?>">

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
                        <input type="hidden" name="id_patient" value="<?php echo $user_data["id_patient"]; ?>" />
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>