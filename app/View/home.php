<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <script>
        const base_url = '<?= base_url() ?>'
    </script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-grid gap-2">
                <a href="<?= base_url() ?>contact/create" class="btn btn-primary" >Add contact</a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach ($data['contacts'] as  $contact): ?>
        <div class="col-md-4 pt-3">
            <div class="card" >
                <img src="<?= base_url() ?>/assets/img/<?= $contact['coct_url_img_profile'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Name: <?= $contact['coct_name'] ?>  <?= $contact['coct_last_name'] ?></h5>
                    <p class="card-text">Age: <?= $contact['coct_age'] ?></p>
                    <p class="card-text">Email: <?= $contact['coct_email'] ?></p>
                    <p class="card-text">Description: <?= $contact['coct_description'] ?></p>
                    <a href="<?= base_url() ?>contact/<?= $contact['coct_id_contact'] ?>/edit" class="btn btn-secondary">Edit</a>
                    <a class="btn btn-danger delete" data-id="<?= $contact['coct_id_contact'] ?>">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>



</div>



<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/index.js" ></script>

</body>
</html>