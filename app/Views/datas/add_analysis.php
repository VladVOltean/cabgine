<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>
<?php 
        $validation = \Config\Services::validation();
?>
<div class="card ptable" style="width: 60%;">
    <div class="card-header"><?php if($analysis):?>Edit Analysis<?php else:?>Add Analysis<?php endif;?></div>
        <div class="card-body">
            <form method="post" action="<?php if($analysis): echo base_url('edit_analysis/'.$analysis['id_analysis']); else: echo base_url('edit_analysis/0'); endif;?>">
                <div class="form-group">
                    <label>Analysis</label>
                    <input type="text" name="analysis" class="form-control" value="<?= set_value('analysis', $analysis['analysis_name']) ?>">
                    <!-- Error -->
                    <?php 
                        if($validation->getError('analysis'))
                        {
                        echo "
                        <div class='alert alert-danger mt-2'>
                        ".$validation->getError('analysis')."
                         </div>
                         ";
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button type="submit" class="btn btn-primary"><?php if($analysis):?>Update<?php else:?>Save<?php endif;?></button>
                    </div>
                    <div class="col-12 col-sm-8 text-right">
                        <a href="/analyses" type="button" class="btn btn-secondary">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


