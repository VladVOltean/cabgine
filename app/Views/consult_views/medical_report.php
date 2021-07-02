<?= $this->extend('mainpage.php') ?>
<?= $this->section('content') ?>
<!-- History Modal -->
<?= $this->include('consult_views/modal') ?>
<!--Patient data -->
<?= $this->include('consult_views/patient_data') ?>
<!-- Medical records -->
<?= $this->include('consult_views/records') ?>
<!--Medical Form-->
<?= $this->include('consult_views/forms') ?>
<!-- Check boxes & Save buttons-->
<?= $this->include('consult_views/checks') ?>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/medical_report.js');?>" ></script>
<script>
    function medical_letter(id_patient,id_consult) {
		window.location.href = "<?php echo base_url(); ?>/medicalletter/" + id_patient + "/" + id_consult;
	}
</script>
<script>
    $(document).ready(function()
     {
        <?php if (session()->getFlashdata('status')) 
            { ?>
            swal(
            {
                title: "Amount to be payed!",
                text: "<?= session()->getFlashdata('status') ?>",
                button: "Close",
            });
        <?php } ?>
    });
</script>
<?= $this->endSection() ?>