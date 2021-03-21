<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/style.css">

<?php
$session = \Config\Services::session();
if ($session->getFlashdata('success')) {
	echo '
<div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
';
}
?>
<div class="card ptable">
	<div class="card-header">
		<div class="row">
			<div class="col">Patient List</div>
			<div class="col text-right">
				<a href="<?php echo base_url("/ListaPacienti/add") ?>" class="btn btn-success btn-sm">Add Patient</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>

					<th>First Name</th>
					<th>Last Name</th>
					<th>CNP</th>
					<th>Date of Birth</th>
					<th>Edit</th>
					<th>Delete</th>
					<th>Consult</th>

				</tr>
				<?php
				if ($user_data) {
					foreach ($user_data as $user) {
						echo '
				<tr>
					
					<td>' . $user["first_name"] . '</td>
					<td>' . $user["last_name"] . '</td>
					<td>' . $user["identification_number"] . '</td>
					<td>' . $user["date_of_birth"] . '</td>
					<td><a href="' . base_url() . '/ListaPacienti/fetch_single_data/' . $user["id_patient"] . '" class="btn btn-sm btn-warning">Edit</a></td>
					<td><button type="button" onclick="delete_data(' . $user["id_patient"] . ')" class="btn btn-danger btn-sm">Delete</button></td>
					<td><button type="button" onclick="consult_page(' . $user["id_patient"] . ')" class="btn btn-danger btn-sm">Consult</button></td>
				</tr>';
					}
				}
				?>
			</table>
		</div>
		<div>
			<?php
			if ($pagination_link) {
				$pagination_link->setPath('lista_pacienti');
				echo $pagination_link->links();
			}

			?>
		</div>
	</div>
</div>
</div>

<script>
	function delete_data(id) {
		if (confirm("Are you sure you want to remove it?")) {
			window.location.href = "<?php echo base_url(); ?>/ListaPacienti/delete/" + id;
		}
		return false;
	}

	function consult_page(id) {
		window.location.href = "<?php echo base_url(); ?>/medicalrecord/" + id;

	}
</script>