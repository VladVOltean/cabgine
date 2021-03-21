    <header>
        <div class="row">
            <div class="col-sm-9 pt-1">
                <address><br />
                    Medical center: <?= esc($cabinet['name']); ?><br />
                    Address: <?= esc($cabinet['address']); ?><br />
                    Telephone: <?= esc($cabinet['telephone']); ?><br />
                    Email: <?= esc($cabinet['email']); ?><br />
                    Tax Identification code : <?= esc($cabinet['tax_identification_code']); ?><br />
                    Trade registration number: <?= esc($cabinet['trade_register_number']); ?><br />
                    Account number: <?= esc($cabinet['IBAN']); ?><br />
                </address>
                <p> Doctor: <?= esc($user['firstname']); ?> <?= esc($user['lastname']); ?></p>
            </div>
            <div class="col-sm-3">
                <img src="assets/img/logot.png" style="vertical-align: middle; max-height: 150px; max-width: 75px;" alt="logo" />
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <h1 style="text-align:center">Medical letter</h1>

        <p>Patient <?= esc($patients['first_name']); ?> <?= esc($patients['last_name']); ?>
            resident at <?= esc($patients['address']); ?> city <?= esc($city['city']); ?> county <?= esc($county['county']); ?>
            having the age of <?= esc($age); ?> had a medical consult today: <?= esc($today); ?>.
            She had a clinical examination and a Ultrasound scan resulting: </p>
    </div>

    <?= $this->renderSection('content') ?>

    <h4>Recommendet analysis: </h4>
    <ul>
        <?php foreach ($consult_analysis as $consult_analysis_item) : ?>
            <li><?= esc($consult_analysis_item['analysis_name']); ?></li>
        <?php endforeach; ?>
    </ul><br>

    <footer>
        <p style="text-align: left; width:49%; display: inline-block;">Date: <?= esc($today); ?></p>
        <p style="text-align: right; width:50%;  display: inline-block;">Signature</p><br><br><br><br>
    </footer>