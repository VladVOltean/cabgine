<?= $this->extend('layouts/mainpage.php') ?>

<?= $this->section('content') ?>
<div class="card ptable" style="width: 85%;">
    <div class="card body">
            <div class="container">
                <div class="row">
                <div class="col-sm-9 pt-1">
                <address><br />
                    <strong>Medical center:</strong> <?= esc($cabinet['name']); ?><br />
                    <strong>Address:</strong> <?= esc($cabinet['address']); ?><br />
                    <strong>Telephone:</strong> <?= esc($cabinet['telephone']); ?><br />
                    <strong>Email:</strong> <?= esc($cabinet['email']); ?><br />
                    <strong>Tax Identification code:</strong> <?= esc($cabinet['tax_identification_code']); ?><br />
                    <strong>Trade registration number:</strong> <?= esc($cabinet['trade_register_number']); ?><br />
                    <strong>Account number:</strong> <?= esc($cabinet['IBAN']); ?><br>
                    <strong>Doctor:</strong> <?= esc($user['firstname']); ?> <?= esc($user['lastname']); ?></p>
                </address>
            </div>
            <div class="col-sm-3">
        <?php echo '<img class="letter-logo" src="data:image/jpeg;base64,'.base64_encode( $cabinet['logo'] ).'"/>';?>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <h1 style="text-align:center">Medical letter</h1><br>

        <p><strong>Patient <?= esc($patient['first_name']); ?> <?= esc($patient['last_name']); ?></strong>
            resident at <?= esc($patient['address']); ?> city <?= esc($patient['city']); ?> county <?= esc($patient['county']); ?>
            having the age of <?= esc($age); ?> had a medical consult today: <?= esc($consult['date']);?>.</p>
        <h5>She had the follow examinations: </h5>
        <?php foreach ($examinations as $each_examination) : ?>
            <li><?= esc($each_examination['examination_name']); ?></li>
        <?php endforeach; ?>
    </div><br>
    <div class="container">
    <h5>Consult reasons: </h5> <p><?= esc($consult['consult_reason']); ?></p>
    <h5>Observations: </h5> <p><?= esc($consult['observations']); ?></p>
    <h5>Recommendations </h5> <p><?= esc($consult['recommendations']); ?></p>
    </div>

    <div class="container">
    <h4>Recommendet analysis: </h4>
    <ul>
        <?php foreach ($consult_analysis as $consult_analysis_item) : ?>
            <li><?= esc($consult_analysis_item['analysis_name']); ?></li>
        <?php endforeach; ?>
    </ul><br><br>
    </div>
    <div class="text-center">

    <a href="<?php echo base_url('Medicalletter/htmlToPDF/'. $patient['id_patient'] . '/' . $consult['id_consult']); ?>" class="btn btn-secondary btn-lg" style="margin:auto;" >Print</a>
    </div><br><br>
</div>
    <?= $this->endSection() ?>