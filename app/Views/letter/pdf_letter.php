   <html>
        <address>
            Medical center: <?= esc($letter->name); ?><br />
            Address: <?= esc($letter->cab_address); ?><br />
            <?php echo '<img style="display: inline; float: right; margin-right:100px;" src="data:image/jpeg;base64,' . base64_encode($letter->logo) . '"/>'; ?>
            Telephone: <?= esc($letter->telephone); ?><br />
            Email: <?= esc($letter->cab_email); ?><br />
            Tax Identification code : <?= esc($letter->tax_identification_code); ?><br />
            Trade registration number: <?= esc($letter->trade_register_number); ?><br />
            Account number: <?= esc($letter->IBAN); ?><br />
            Doctor: <?= esc($letter->firstname); ?> <?= esc($letter->lastname); ?>
        </address><br>
    <body>
    <h1 style="text-align:center">Medical letter</h1><br>
        <p><pre></pre> <strong> <?= esc($letter->first_name); ?> <?= esc($letter->last_name); ?></strong>
            resident at <?= esc($letter->address); ?> city <?= esc($letter->city); ?> county <?= esc($letter->county); ?>
            having the age of <?= esc($age); ?> had a medical consult today: <?= esc($letter->date); ?>.</p>
        <h4>She had the follow examinations: </h4>
        <p>
        <?php foreach ($examinations as $each_examination) : ?>
            <li><?= esc($each_examination['examination_name']); ?></li>
        <?php endforeach; ?><br>
        </p>
        <h4>Recommendet analysis: </h4>
            <?php foreach ($consult_analysis as $consult_analysis_item) : ?>
                <li><?= esc($consult_analysis_item['analysis_name']); ?></li>
            <?php endforeach; ?><br><br><br>
    </body>
        <footer>
            <p style="text-align: left; width:49%; display: inline-block;">Print date: <?= esc($today); ?></p>
            <p style="text-align: right; width:45%;  display: inline-block;">Signature</p><br><br>
            <?php echo '<img style="display: inline; float: right;" src="data:image/jpeg;base64,' . base64_encode($letter->signature) . '"/>'; ?>
        </footer>
        </html>