<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>
<?php 
        $validation = \Config\Services::validation();
?>
<div class="card ptable" style="width: 60%;">
    <div class="card-header"><?php if($exam):?>Edit Examination <?php else:?>Add Examination<?php endif;?></div>
        <div class="card-body">
            <form method="post" action="<?php if($exam): echo base_url('edit_exam/'.$exam['id_examination']); else: echo base_url('edit_exam/0'); endif;?>">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Examination </label>
                            <input type="text" name="examination" class="form-control" value="<?= set_value('examination', $exam['examination_name']) ?>">
                            <!-- Error -->
                             <?php 
                                if($validation->getError('examination'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('examination')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-4">         
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?= set_value('price', $exam['price']) ?>">
                            <!-- Error -->
                            <?php 
                                if($validation->getError('price'))
                                {
                                    echo "
                                    <div class='alert alert-danger mt-2'>
                                    ".$validation->getError('price')."
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button type="submit" class="btn btn-primary"><?php if($exam):?>Update<?php else:?>Save<?php endif;?></button>
                    </div>
                    <div class="col-12 col-sm-8 text-right">
                        <a href="/examinations" type="button" class="btn btn-secondary">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


