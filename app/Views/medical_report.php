<div class="container">
    <h1 style="text-align: center;">Medical report</h1>
    <hr>
    <h3>Patient: <?= esc($patient['first_name']); ?> <?= esc($patient['last_name']); ?></h3>
    <div class="description">
        <div class="row">
            <div class="col-md-6">
                </p>Date of birth: <?= esc($patient['date_of_birth']); ?></p>
                <p>Adress: <?= esc($patient['address']); ?> </p>
                <p>City: <?= esc($patient['city']); ?> </p>
                <p>County: <?= esc($patient['county']); ?></p>
            </div>
            <div class="col-md-6">
                <p>Work position: <?= esc($patient['ocuppation']); ?></p>
                <p>Phone number: <?= esc($patient['telephone']); ?> </p>
                <p>e-mail: <?= esc($patient['email']); ?> </p>
                <p>Identification number: <?= esc($patient['identification_number']); ?> </p>
                <?php if ($patient['civil_status'] == 1) : ?>
                    <p>Civil status: maried </p>
                <?php else : ?>
                    <p>Civil status: single </p>
                <?php endif; ?>
            </div>
        </div>
    </div><br>

    <div class="container">
        <h3 style="text-align: center;">Previous Medical records</h3><br>
        <?php foreach ($consult as $consult_item) : ?>
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?= esc($consult_item['id_consult']); ?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5> <?= esc($consult_item['date']); ?></h5>
                    </button>
                </h2>
            </div>
            <div id="<?= esc($consult_item['id_consult']); ?>" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">
                    <p>Consult reason: <?= esc($consult_item['consult_reason']); ?></p>
                    <p>Observations: <?= esc($consult_item['observations']); ?></p>
                    <p>Recommendations: <?= esc($consult_item['recommendations']); ?></p>
                    <p>Treatment: <?= esc($consult_item['treatment']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div><br>
<div class="container">
    <form action="<?php echo  base_url() . '/medicalrecord/' . $patient['id_patient']; ?>" method="post">
        <div class="form">
            <h3>Gynecologic history</h3>
            <hr>
            <div class="mb-3">
                <label for="last_period" class="form-label">Last Period date</label>
                <input name="last_period" value="<?= esc($last_vizit['last_period']); ?>" type="date" class="form-control" id="id_consult" aria-describedby="sethelp">
                <div id="sethelp" class="form-text">If the Last Period changed pick another date.</div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="climax" <?php if ($last_vizit['climax'] == 1) : ?> checked <?php else : ?> <?php endif; ?> value="1" class="form-check-input" id="id_consult">
                <label class="form-check-label" for="climax">Climax</label>
            </div>
            <div class="mb-3">
                <label for="menstrual_cycle" class="form-label">Menstrual cycle</label>
                <input name="menstrual_cycle" value="<?= esc($last_vizit['menstrual_cycle']); ?>" type="text" class="form-control" id="id_consult">
            </div>
            <div class="mb-3">
                <label for="births" class="form-label">Number of births</label>
                <input name="births" value="<?= esc($last_vizit['births']); ?>" type="text" class="form-control" id="id_consult">
            </div>
            <div class="mb-3">
                <label for="abortions" class="form-label">Number of abortions</label>
                <input name="abortions" value="<?= esc($last_vizit['abortions']); ?>" type="text" class="form-control" id="id_consult">
            </div>
        </div>
        <div class="form">
            <h3>Consult records</h3>
            <hr>
            <div class=" mb-3">
                <label for="consult_reason" class="form-label">Consult reasons</label>
                <textarea id="id_consult" name="consult_reason" class="form-control"></textarea>
            </div>
            <div class=" mb-3">
                <label for="antecedents" class="form-label">Medical antecedents</label>
                <textarea id="id_consult" name="antecedents" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="observations" class="form-label">Observations</label>
                <textarea id="id_consult" name="observations" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="diagnosis" class="form-label">Diagnosis</label>
                <textarea id="id_consult" name="diagnosis" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="recommendations" class="form-label">Recommendations</label>
                <textarea id="id_consult" name="recommendations" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="treatment" class="form-label">Treatment</label>
                <textarea id="id_consult" name="treatment" class="form-control"></textarea>
            </div>
        </div>
        <?= \Config\Services::validation()->listErrors(); ?><br>

        <div class="form">
            <div class="row">
                <div class="col-md-6">
                    <h3>Gynecologic examinations</h3>
                    </h3><br>
                    <div class="mb-3">
                        <?php foreach ($examination as $item_exam) : ?>
                            <div class="form-check">
                                <input class="form-check-input" name="set_examinations[]" type="checkbox" value="<?= esc($item_exam['id_examination']); ?>" id="<?= esc($item_exam['id_examination']); ?>">
                                <label class="form-check-label" for="<?= esc($item_exam['examination_name']); ?>"> <?= esc($item_exam['examination_name']); ?> </label>
                                <label class="form-check-label" for="<?= esc($item_exam['price']); ?>"> <?= esc($item_exam['price']); ?> </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Recommended analysis</h3>
                    </h3><br>
                    <div class="mb-3">
                        <?php foreach ($analysis as $item_ana) : ?>
                            <div class="form-check">
                                <input class="form-check-input" name="set_analysis[]" type="checkbox" value="<?= esc($item_ana['id_analysis']); ?>" id="<?= esc($item_ana['id_analysis']); ?>">
                                <label class="form-check-label" for="<?= esc($item_ana['analysis_name']); ?>"> <?= esc($item_ana['analysis_name']); ?> </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
</div><br>
<button type="submit" name="save" formaction="<?php echo  base_url() . '/medicalrecord/' . $patient['id_patient']; ?>" class="btn btn-success">Save consult</button>
<button type="submit" name="save_print" formaction="<?php echo  base_url() . '/medicalletter/' . $patient['id_patient'] . '/' . $last_vizit['id_consult']; ?>" class="btn btn-success">Medical letter</button>

<!--<a href="<?php echo  base_url() . '/medicalletter/' . $patient['id_patient'] . '/' . $last_vizit['id_consult']; ?>" type="submit" class=" btn btn-success">Medical letter</a>-->
</form>
</div>

</div>