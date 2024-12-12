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
      
        <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show w-25 mx-auto mt-3" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Error Alert -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade w-25 mx-auto show mt-3" role="alert">
                    <?= session()->getFlashdata('errors') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form class="w-25 p-4 mx-auto shadow bg-white rounded" method="POST" action="/signin/account">
                <h3 class="">Sign In For User</h3>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <?php
                    if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['email'])): ?>
                        <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['email']) ?></div>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php
                    if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['password'])): ?>
                        <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['password']) ?></div>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='/register' style="text-decoration: none;">
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