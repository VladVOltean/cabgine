<div class="container">
    <?= \Config\Services::validation()->listErrors(); ?><br>
                <form action="<?php echo  base_url() . '/medicalrecord/' . $patient['id_patient']; ?>" method="post">
                    <div class="form">
                        <h3 style="text-align: center;">Gynecologic history</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="last_period" class="form-label">Last Period date</label>
                                    <input name="last_period" value="<?= esc($last_vizit['last_period']); ?>" type="date" class="form-control" id="id_consult" aria-describedby="sethelp">
                                    <div id="sethelp" class="form-text">If the Last Period changed pick another date.</div>
                                </div>
                                <div class="mb-4">
                                    <label for="menstrual_cycle" class="form-label">Menstrual cycle</label>
                                    <input name="menstrual_cycle" value="<?= esc($last_vizit['menstrual_cycle']); ?>" type="text" class="form-control" id="id_consult">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="births" class="form-label">Number of births</label>
                                    <input name="births" value="<?= esc($last_vizit['births']); ?>" type="text" class="form-control" id="id_consult">
                                </div>
                                <div class="mb-3">
                                    <label for="abortions" class="form-label">Number of abortions</label>
                                    <input name="abortions" value="<?= esc($last_vizit['abortions']); ?>" type="text" class="form-control" id="id_consult">
                                </div>
                                <div class="mb-3 form-check" style="margin-left: 10px;">
                                    <input type="checkbox" name="climax" <?php if ($last_vizit['climax'] == 1) : ?> checked <?php else : ?> <?php endif; ?> value="1" class="form-check-input" id="id_consult">
                                    <label class="form-check-label" for="climax">
                                        <h6>Climax</h6>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <h3>Consult records</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" mb-3">
                                    <label for="consult_reason" class="form-label">Consult reasons</label>
                                    <textarea name="consult_reason" class="form-control"></textarea>
                                </div>
                                <div class=" mb-3">
                                    <label for="antecedents" class="form-label">Medical antecedents</label>
                                    <textarea name="antecedents" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="observations" class="form-label">Observations</label>
                                    <textarea name="observations" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="diagnosis" class="form-label">Diagnosis</label>
                                    <textarea name="diagnosis" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="recommendations" class="form-label">Recommendations</label>
                                    <textarea name="recommendations" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="treatment" class="form-label">Treatment</label>
                                    <textarea name="treatment" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>