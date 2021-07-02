<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>
</style>
<div class="cotainer">
    <div class="card ptable " style="width: 95%;">
        <div class="card-header">
            <h3 style="text-align: center;">Consult history</h3>
        </div>
        <div class="card-body">
        <?php if($consult):?>
            <div class="row">
                <div class="col-3 mt-1">
                <h5>Select consult date</h5>
                    <select class="form-control" id="selectId">
                        <?php foreach ($consult as $consult_item) : ?>
                            <option value="<?= esc($consult_item['id_consult']); ?>"><?= esc($consult_item['date']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-9">
                    <div class="card ptable consult-info">
                        <div class="card-header">
                        <h3>Consult info:</h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-6">
                <h3 style="text-align: center;">No medical history available</h3>
                </div>
                <div class="col-6 text-center">
                <a href="<?= base_url('medicalrecord/'.$patient) ?>" class="btn btn-secondary btn-lg">Consult</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Add File Modal-->
<?= $this->include('patient_history/addfile_modal') ?>
<!-- Delete File -->
<?= $this->include('patient_history/delete_modal') ?>
<!-- Show Picture -->
<?= $this->include('patient_history/picture_modal') ?>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/history.js');?>"> </script> 
<?= $this->endSection() ?>