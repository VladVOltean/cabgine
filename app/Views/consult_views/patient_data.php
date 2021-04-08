<div class="card ptable" style="width: 85%;">
    <div class="card header">
        <h1 style="text-align: center;">Medical report</h1>
    </div>
        <div class="card body">
            <h3 class="card-title" style="margin-left:100px">Patient: <?= esc($patient['first_name']); ?> <?= esc($patient['last_name']); ?></h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Date of birth: </strong><?= esc($patient['date_of_birth']); ?></p>
                        <p><strong>Adress: </strong><?= esc($patient['address']); ?> </p>
                        <p><strong>City: </strong><?= esc($patient['city']); ?> </p>
                        <p><strong>County: </strong><?= esc($patient['county']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone number: </strong><?= esc($patient['telephone']); ?> </p>
                        <p><strong>e-mail: </strong><?= esc($patient['email']); ?> </p>
                        <p><strong>Identification number: </strong><?= esc($patient['identification_number']); ?> </p>
                        <?php if ($patient['civil_status'] == 1) : ?>
                            <p><strong>Civil status: </strong>maried </p>
                        <?php else : ?>
                            <p><strong>Civil status: </strong>single </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
