   <html>
        <address>
            Medical center: <?= esc($cabinet['name']); ?><br />
            Address: <?= esc($cabinet['address']); ?><br />
            <?php echo '<img style="display: inline; float: right; margin-right:100px;" src="data:image/jpeg;base64,' . base64_encode($cabinet['logo']) . '"/>'; ?>
            Telephone: <?= esc($cabinet['telephone']); ?><br />
            Email: <?= esc($cabinet['email']); ?><br />
            Tax Identification code : <?= esc($cabinet['tax_identification_code']); ?><br />
            Trade registration number: <?= esc($cabinet['trade_register_number']); ?><br />
            Account number: <?= esc($cabinet['IBAN']); ?><br />
            Doctor: <?= esc($user['firstname']); ?> <?= esc($user['lastname']); ?>
        </address><br>
    <body>
    <h1 style="text-align:center">Medical letter</h1><br>
        <p><pre></pre> <strong> <?= esc($patient['first_name']); ?> <?= esc($patient['last_name']); ?></strong>
            resident at <?= esc($patient['address']); ?> city <?= esc($patient['city']); ?> county <?= esc($patient['county']); ?>
            having the age of <?= esc($age); ?> had a medical consult today: <?= esc($consult['date']); ?>.</p>
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
            <p style="text-align: right; width:50%;  display: inline-block;">Signature</p><br><br>
            <?php echo '<img style="display: inline; float: right;" src="data:image/jpeg;base64,' . base64_encode($user['signature']) . '"/>'; ?>
        </footer>
        </html>