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

    <section class="mt-5 mb-5">
    <h2 class="text-center text-white mb-4">Trending Movies</h2>

    <div class="container">
        <div class="row" id="movies-container">
        <?php foreach ($data as $item): ?>

        <div class="col-md-3 mb-4 d-flex col-sm-1" style="position:relative;">
          <div class="card rounded">
                    <img src="/getimg/<?= $item['poster_image']?>" class="card-img-top rounded" style="height:100%;object-fit:cover;" alt="Movie Image" style="height: 100%; object-fit: cover;"></img>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-secondary"><?php echo $item['title']?></h4>
                        <h5 class="card-title">Movie Story:<?php echo $item['description']?></h5>

                        <span class="card-title text-secondary">Genre:<?php echo $item['genre']?></span>
                        <span class="card-title text-secondary">Duration:<?php echo $item['duration']?></span>
                        <span class="card-title text-secondary">Release Date:<?php echo $item['release_date']?></span>
                        <span class="card-title text-secondary">Language:<?php echo $item['language']?></span>
                        <span class="card-title text-secondary">Director:<?php echo $item['director']?></span>

                        <span class="text-secondary">Cast:<?php echo $item['cast']?></span>
                        <span class="card-title text-secondary">Rating:<?php echo $item['rating']?></span>

                        <h6><i class="fa-solid fa-star" style="color:gold;"></i></h6>
                        <div class="d-flex flex-row gap-1 flex-wrap">
                        <a href='/update/<?php echo $item['id']?>' class="flex-shrink-1 flex-grow-1"><button type="button" class="btn btn-success w-100">Update</button></a>
                       <a href='/delete/<?php echo $item['id']?>' onclick="return confirm('Are You Sure You Want To Delete The Movie');" class="flex-shrink-1 flex-grow-1"><button type="button" class="btn btn-danger w-100">Delete</button></a>

        </div>
                    </div>
                </div>
                <span class="badge text-bg-success p-2" style="position:absolute;right:-5px;top:-10px;">Tickets full</span>

                </div>
            <?php endforeach; ?>
        

           
        </div>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script {csp-script-nonce}>

    </script>

</body>

</html>