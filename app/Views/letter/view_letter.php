<?php if (!$letter): ?>
    <div class="alert alert-danger" role="alert">
    <?= esc($message); ?>
    </div>
    <?php redirect()->to('medicalrecord/'.$patient);?>
<?php else: ?>
<div class="card ptable" style="width: 85%;">
    <div class="card body">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 pt-1">
                    <address><br />
                        <strong>Medical center:</strong> <?= esc($letter->name); ?><br />
                        <strong>Address:</strong> <?= esc($letter->cab_address); ?><br />
                        <strong>Telephone:</strong> <?= esc($letter->telephone); ?><br />
                        <strong>Email:</strong> <?= esc($letter->cab_email); ?><br />
                        <strong>Tax Identification code:</strong> <?= esc($letter->tax_identification_code); ?><br />
                        <strong>Trade registration number:</strong> <?= esc($letter->trade_register_number); ?><br />
                        <strong>Account number:</strong> <?= esc($letter->IBAN); ?><br>
                        <strong>Doctor:</strong> <?= esc($letter->firstname); ?> <?= esc($letter->lastname); ?></p>
                    </address>
                </div>
                <div class="col-sm-3">
                    <?php echo '<img class="letter-logo" src="data:image/jpeg;base64,'.base64_encode( $letter->logo ).'"/>';?>
                </div>
            </div>
            <div class="container-fluid">
                <h1 style="text-align:center">Medical letter</h1><br>
                <p><strong>Patient <?= esc($letter->first_name); ?> <?= esc($letter->last_name); ?></strong>
                resident at <?= esc($letter->address); ?> city <?= esc($letter->city); ?> county <?= esc($letter->county); ?>
                having the age of <?= esc($age); ?> had a medical consult today: <?= esc($letter->date);?>.</p>
                <h5>She had the follow examinations: </h5>
                <?php foreach ($examinations as $each_examination) : ?>
                    <li><?= esc($each_examination['examination_name']); ?></li>
                <?php endforeach; ?>
            </div><br>
            <div class="container">
                <h5>Consult reasons: </h5> <p><?= esc($letter->consult_reason); ?></p>
                <h5>Observations: </h5> <p><?= esc($letter->observations); ?></p>
                <h5>Recommendations </h5> <p><?= esc($letter->recommendations); ?></p>
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
                    <a href="<?php echo base_url('download_ML/'. $letter->id_patient . '/' . $letter->id_consult); ?>" class="btn btn-primary btn-lg" style="margin:auto;" >Print</a>
            </div><br><br>
        </div>
    </div>
</div>
<?php endif; ?>


