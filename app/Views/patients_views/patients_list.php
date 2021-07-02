
<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>

<div class="card ptable" style="width: 95%;">
	<div class="card-header">
		<div class="row">
			<div class="col">Patient List</div>
			<div class="col text-right">
				<a href="<?php echo base_url('patient/0') ?>" class="btn btn-success btn-sm">Add Patient</a>
			</div>
		</div>
	</div>
	<?php
		$session = \Config\Services::session();
		if ($session->getFlashdata('success')) {
			echo '
		<div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
		';
		}
	?>
	<div class="card-body">
		<table class="table table-bordered" id="patients_table">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>ID-No</th>
					<th>Date of Birth</th>
					<th>Address</th>
					<th>City</th>
					<th></th>
				</tr>
			</thead>
				<tbody class="patientsdata">
					<?php if($patients):?>
						<?php foreach($patients as $patient):?>
						<tr>
							<td><?= esc($patient['first_name']); ?></td>
							<td><?= esc($patient['last_name']); ?></td>
							<td><?= esc($patient['identification_number']); ?></td>
							<td><?= esc($patient['date_of_birth']); ?></td>
							<td><?= esc($patient['address']); ?></td>
							<td><?= esc($patient['city']); ?></td>
							<td>
								<a href="<?= base_url('patient/'.$patient["id_patient"]) ?>" class="btn btn-danger btn-sm" style="margin-left:20px">Edit</a>
								<a href="<?= base_url('medicalrecord/'.$patient["id_patient"]) ?>" class="btn btn-danger btn-sm" style="margin-left:20px">Consult</a>
								<a href="<?= base_url('history/'.$patient["id_patient"]) ?>" class="btn btn-danger btn-sm" style="margin-left:20px">History</a>
								<?php if (session()->get('is_admin') == 1) : ?>
									<button type="button" onclick="delete_data(<?= esc($patient['id_patient']); ?>)" class="btn btn-danger btn-sm" style="margin-left:20px">Delete</button>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; ?>
					<?php endif; ?>
                </tbody>
		</table>
	</div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/patients_list.js');?>" ></script>
<script>
	function delete_data(id) {
		if (confirm("Are you sure you want to remove it?")) {
			window.location.href = "<?php echo base_url(); ?>/PatientsList/delete/" + id;
		}
		return false;
	}
</script>
<?= $this->endSection() ?>