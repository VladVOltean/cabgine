<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>

<div class="card ptable" style="width: 75%;">
	<div class="card-header">
		<div class="row">
			<div class="col">Analyses</div>
			<div class="col text-right">
				<a href="<?php echo base_url('edit_analysis/0') ?>" class="btn btn-success btn-sm">Add Analysis</a>
			</div>
		</div>
	</div>
    <!-- Succes message -->
    <?php
        $session = \Config\Services::session();
            if ($session->getFlashdata('success')) 
				{
	            echo '
                    <div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
                    ';
                }
    ?>
	<div class="card-body">
		<table class="table table-bordered list" id="exam">
			<thead>
				<tr>
                    <th>Name</th>
                    <th></th>
				</tr>
			</thead>
				<tbody class="examsdata">
					<?php if($analyses): ?>
						<?php foreach($analyses as $ana):?>
							<tr>
							<td><?= esc($ana->analysis_name); ?></td>
							<td>
								<a href="<?php echo base_url('edit_analysis/'. $ana->id_analysis); ?>" class="btn btn-secondary btn-sm">Edit</a>
								<button type="button" onclick="delete_examinatio(<?= $ana->id_analysis?>)" class="btn btn-danger btn-sm">Delete</button>
							</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
                </tbody>
		</table>
	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/datas.js');?>" ></script>
<script>
	function delete_examinatio(id) {
		if (confirm("Delete analysis?")) {
			window.location.href = "<?php echo base_url(); ?>/delete_data/analysis/" + id;
		}
		return false;
	}
</script>
<?= $this->endSection() ?>