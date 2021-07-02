<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>

<div class="card ptable" style="width: 75%;">
	<div class="card-header">
		<div class="row">
			<div class="col">Examinations</div>
			<div class="col text-right">
				<a href="<?php echo base_url('edit_exam/0') ?>" class="btn btn-success btn-sm">Add Examination</a>
			</div>
		</div>
	</div>
    <!-- Succes message -->
    <?php
        $session = \Config\Services::session();
            if ($session->getFlashdata('success')) {
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
					<th>Price</th>
                    <th></th>
				</tr>
			</thead>
				<tbody class="examsdata">
					<?php if($examinations):?>
						<?php foreach($examinations as $exam):?>
							<tr>
							<td><?= esc($exam->examination_name); ?></td>
							<td><?= esc($exam->price); ?></td>
							<td>
								<a href="<?php echo base_url('edit_exam/'. $exam->id_examination); ?>" class="btn btn-secondary btn-sm">Edit</a>
								<button type="button" onclick="delete_examinatio(<?= $exam->id_examination?>)" class="btn btn-danger btn-sm">Delete</button>
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
			window.location.href = "<?php echo base_url(); ?>/delete_data/exam/" + id;
		}
		return false;
	}
</script>
<?= $this->endSection() ?>