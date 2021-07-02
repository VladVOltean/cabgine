<?= $this->extend('mainpage.php') ?>

<?= $this->section('content') ?>

<div class="card ptable" style="width: 95%;">
	<div class="card-header">
		<div class="row">
			<div class="col">Users</div>
			<div class="col text-right">
				<a href="<?php echo base_url('profile/0') ?>" class="btn btn-success btn-sm">Add User</a>
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
		<table class="table table-bordered" id="users_table">
			<thead>
				<tr>
                    <th>Title</th>
					<th>First Name</th>
					<th>Last Name</th>
                    <th>Email</th>
					<th>Rights</th>
                    <th></th>
				</tr>
			</thead>
				<tbody class="usersdata">
					<?php if($users):?>
						<?php foreach($users as $user):?>
						<tr>
							<td><?= esc($user->title); ?></td>
							<td><?= esc($user->firstname); ?></td>
							<td><?= esc($user->lastname); ?></td>
							<td><?= esc($user->email); ?></td>
                            <?php if ($user->is_admin==1):?>
							<td>Admin</td>
                            <?php else: ?>
							<td>User</td>
                            <?php endif; ?>
							<td>
								<a href="<?php echo base_url('profile/'. $user->id); ?>" class="btn btn-secondary btn-sm" style="margin-left:20px">Edit</a>
								<button type="button" onclick="delete_user(<?= $user->id; ?>)" class="btn btn-danger btn-sm" style="margin-left:20px">Delete</button>
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
<script src="<?= base_url('assets/js/users.js');?>" ></script>
<script>
	function delete_user(id) {
		if (confirm("Are you sure you want delete User?")) {
			window.location.href = "/delete/" + id;
		}
		return false;
	}
</script>
<?= $this->endSection() ?>