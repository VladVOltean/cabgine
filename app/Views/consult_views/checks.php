                    <div class="form">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Gynecologic examinations</h3><br>
                                <div class="mb-3">
                                    <?php foreach ($examination as $item_exam) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" name="set_examinations[]" type="checkbox" value="<?= esc($item_exam['id_examination']); ?>" id="<?= esc($item_exam['id_examination']); ?>">
                                            <label class="form-check-label" for="<?= esc($item_exam['examination_name']); ?>"> <?= esc($item_exam['examination_name']); ?> <?= esc($item_exam['price']); ?> </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Recommended analysis</h3><br>
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
                    </div><br>
                    <button type="submit" name="save" style="margin-left:200px" class="btn btn-primary float-left">Save consult</button>
                    <button type="button" onclick="medical_letter( <?= esc($patient['id_patient']); ?>, <?= esc($last_vizit['id_consult']); ?>)" style="margin-right:200px"class="btn btn-primary float-right">Medical letter</button>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>