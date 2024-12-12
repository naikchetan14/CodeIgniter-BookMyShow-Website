<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Movie</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <section class="mt-5 mb-5">


        <div class="container mx-auto">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-info alert-dismissible fade show w-25 mx-auto mt-3" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="container mx-auto">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-info alert-dismissible fade show w-25 mx-auto mt-3" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row bg-white w-50 mx-auto rounded shadow p-4" id="movies-container">
            <a href='/'><button type="submit" class="btn btn-danger"><i class="fa-solid fa-house mx-1"></i>Go To Home</button></a>

                <form class="w-100 mx-auto text-white" method="POST" enctype="multipart/form-data" action="/admin/update/<?= $movieDetails['id'] ?>" >
                <?= csrf_field() ?>
                <h2 class="text-center text-secondary mb-4">Update Movie</h2>
                    <div class="mb-3">
                        <label for="title" class="form-label">Enter Title</label>
                        <input type="title" value="<?= $movieDetails['title'] ?>" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Enter Title">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['title'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['title']) ?></div>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Enter Genre</label>
                        <input type="text" value="<?= $movieDetails['genre'] ?>" class="form-control" id="genre" name="genre" placeholder="Enter Genre">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['genre'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['genre']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="genre" class="form-label">Enter Duration</label>
                        <input type="time" value="<?= $movieDetails['duration'] ?>" class="form-control" id="duration" name="duration" placeholder="Enter Duration">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['duration'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['duration']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="release_date" class="form-label">Enter Release Date</label>
                        <input type="date" value="<?= $movieDetails['release_date'] ?>" class="form-control" id="release_date" name="release_date" placeholder="Enter Release Date">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['release_date'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['release_date']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="language" class="form-label">Enter Language</label>
                        <input type="text"  value="<?= $movieDetails['language'] ?>" class="form-control" id="language" name="language" placeholder="Enter Language">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['language'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['language']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="director" class="form-label">Enter Director</label>
                        <input type="text" value="<?= $movieDetails['director'] ?>" class="form-control" id="director" name="director" placeholder="Enter Director Name">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['director'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['director']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="cast" class="form-label">Enter Cast</label>
                        <input type="text" value="<?= $movieDetails['cast'] ?>" class="form-control" id="cast" name="cast" placeholder="Enter Cast Details">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['cast'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['cast']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Enter Description</label>
                        <input type="text" value="<?= $movieDetails['description'] ?>" class="form-control" id="description" name="description" placeholder="Enter Movie Description">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['description'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['description']) ?></div>
                        <?php endif ?>
                    </div>


                    <div class="mb-3">
                        <label for="rating" class="form-label">Enter Rating</label>
                        <input type="text" value="<?= $movieDetails['rating'] ?>" class="form-control" id="rating" name="rating" placeholder="Enter Rating">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['rating'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['rating']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="poster_image" class="form-label">Movie Poster Image</label>
                        <input type="file"  value="<?= $movieDetails['poster_image'] ?>" class="form-control" id="poster_image" name="poster_image" placeholder="Movie Poster Image">
                        <?php
                        if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['poster_image'])): ?>
                            <div class="errors text-danger" style="font-size: 16px;"><?= esc(session()->getFlashdata('errors')['poster_image']) ?></div>
                        <?php endif ?>
                    </div>


                    <button type="submit" class="btn btn-success">Update</button>
                </form>



            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script {csp-script-nonce}>
        $(document).ready(function() {

        });
    </script>

    <!-- -->

</body>

</html>