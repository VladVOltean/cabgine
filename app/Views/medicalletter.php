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
                <img src="/assets/img/logot.png" style="vertical-align: middle; max-height: 150px; max-width: 75px;" alt="logo" />
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <h1 style="text-align:center">Medical letter</h1>

        <p>Patient <?= esc($patient['first_name']); ?> <?= esc($patient['last_name']); ?>
            resident at <?= esc($patient['address']); ?> city <?= esc($patient['city']); ?> county <?= esc($patient['county']); ?>
            having the age of <?= esc($age); ?> had a medical consult today: <?= esc($today); ?>.</p>
        <p> She had the follow examinations: </p>
        <?php foreach ($examinations as $each_examination) : ?>
            <li><?= esc($each_examination['examination_name']); ?></li>
        <?php endforeach; ?>
    </div><br>

    <h5>Consult reasons: </h5>
    <p><?= esc($consult['consult_reason']); ?></p>
    <h5>Observations: </h5>
    <p><?= esc($consult['observations']); ?></p>
    <h5>Recommendations </h5>
    <p><?= esc($consult['recommendations']); ?></p>



    <h4>Recommendet analysis: </h4>
    <ul>
        <?php foreach ($consult_analysis as $consult_analysis_item) : ?>
            <li><?= esc($consult_analysis_item['analysis_name']); ?></li>
        <?php endforeach; ?>
    </ul><br><br>
    <button id="printPageButton" onclick="window.print()">Print and Save</button><br><br>
    <footer>
        <p style="text-align: left; width:49%; display: inline-block;">Date: <?= esc($today); ?></p>
        <p style="text-align: right; width:50%;  display: inline-block;">Signature</p><br><br><br><br>
    </footer>