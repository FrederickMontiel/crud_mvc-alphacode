<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <script>
        const base_url = '<?= base_url() ?>'
        const id_contact = <?= $data['id_contact'] ?> ;
    </script>

</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="form_contact">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $data['contact'][0]['coct_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" value="<?= $data['contact'][0]['coct_last_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="age" id="age" value="<?= $data['contact'][0]['coct_age'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $data['contact'][0]['coct_email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"><?= $data['contact'][0]['coct_description'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" id="edit_contact">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/index.js" ></script>

</body>
</html>