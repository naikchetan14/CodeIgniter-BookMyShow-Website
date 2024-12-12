<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- STYLES -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style {csp-style-nonce}>
        body {
            background-color: #0f2126;
        }
    </style>
</head>

<body>
    <header>
        <?= $this->include('partialViews/navbar') ?>
    </header>

    <section style="height: 80vh;" class="d-flex flex-row justify-content-center align-items-center">
        <div class="container">
            
            <form class="w-25 p-4 mx-auto shadow bg-white rounded" method="POST" action="/admin/getadmin/account">
                <h3 class="">Sign In</h3>

                <div class="mb-3">
                    <label for="adminEmail" class="form-label">Admin Email</label>
                    <input type="email" class="form-control" id="adminEmail" name="adminEmail" aria-describedby="emailHelp">
                    <?php
                    if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['adminEmail'])): ?>
                        <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['adminEmail']) ?></div>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Admin Password</label>
                    <input type="password" class="form-control" id="adminPassword" name="adminPassword">
                    <?php
                    if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['adminPassword'])): ?>
                        <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['adminPassword']) ?></div>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='/admin/register' style="text-decoration: none;">
                    <p class="mt-2 fw-bold">Create New Account?</p>
                </a>

            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script {csp-script-nonce}>

    </script>

</body>

</html>