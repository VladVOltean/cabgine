<div class="container">
<?php
$session = \Config\Services::session();
if ($session->getFlashdata('letter')) {
	echo '
<div class="alert alert-success">' . $session->getFlashdata("letter") . '</div>
';
}
?>
                <h3 class="card-title" style="text-align: center;">Previous medical records</h3><br>
                <select class="form-control" id="selectId">
                <?php if ($consult):?>
                    <?php foreach ($consult as $consult_item) : ?>
                        <option value="<?= esc($consult_item['id_consult']); ?>">Consult date: <?= esc($consult_item['date']); ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option value="">No previous consults</option>
                <?php endif; ?>
                </select>
</div><br>
