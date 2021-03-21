<?= $this->extend('medicalletter/letterlayout') ?>

<?= $this->section('content') ?>

<?= \Config\Services::validation()->listErrors(); ?>
<div class="container mx-auto">
    <form action="letter" method="post">
        <?= csrf_field() ?>
        <div class="form"></div>
        <div class="row mb-3">
            <label for="consult_reason" class="col-sm-2">
                <h6>Consult reasons: </h6>
            </label>
            <textarea id="id_consult" name="consult_reason" class="col-sm-10"></textarea><br />
        </div>
        <div class="row mb-3">
            <label for="observations" class="col-sm-2 col-form-label">
                <h6>Observations: </h6>
            </label>
            <textarea id="id_consult" name="observations" class="col-sm-10"></textarea><br />
        </div>
        <div class="row mb-3">
            <label for="recommendations" class="col-sm-2">
                <h6>Recommendations: </h6>
            </label>
            <textarea id="id_consult" name="recommendations" class="col-sm-10"></textarea><br />
        </div>

        <button class="btn btn-secondary btn-sm">Save</button>
    </form>
</div>
<?= $this->endSection() ?>