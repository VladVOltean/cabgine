<div class="container">
                <h3 class="card-title" style="text-align: center;">Previous medical records</h3><br>
                <select class="form-control" id="selectId">
                    <?php foreach ($consult as $consult_item) : ?>
                        <option value="<?= esc($consult_item['id_consult']); ?>">Consult date: <?= esc($consult_item['date']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div><br>
