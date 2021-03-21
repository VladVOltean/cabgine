<?= $this->extend('medicalletter/letterlayout') ?>

<?= $this->section('content') ?>

<h4>Consult reasons: </h4>
<p><?= esc($consult['consult_reason']); ?></p>
<h4>Observations: </h4>
<p><?= esc($consult['observations']); ?></p>
<h4>Recommendations </h4>
<p><?= esc($consult['recommendations']); ?></p>

<button id="printPageButton" onclick="window.print()">Print and Save</button>
<?= $this->endSection() ?>