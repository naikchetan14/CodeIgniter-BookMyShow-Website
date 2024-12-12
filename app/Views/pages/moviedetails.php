<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Details</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- STYLES -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style {csp-style-nonce}>
      body{
        background-color: #0f2126;
      }
   
    </style>
</head>
<body>
<header>
<?= $this->include('partialViews/navbar') ?>
</header>

<section class="mt-5 mb-5">
    <div class="container">
    <a href='/'><button type="button" class="btn btn-sm btn-danger  mb-4 mt-4"><i class="fa fa-arrow-left mx-1" aria-hidden="true"></i>Go Back</button></a>

        <div class="d-flex flex-row align-items-center jusity-content-center gap-5 flex-wrap" id="movies-container">
          

           <div  class="flex-grow-1 flex-shrink-1" style="height: 500px;width:400px;">
         <img src="/getimg/<?= $movieDetails['poster_image'] ?>" style="width:100%;height:100%;background-size:color;" class="rounded"></img>
           </div>
           
           <div class="flex-grow-1 flex-shrink-1" style="width:500px;">
            <div class="width:100%;" class="d-flex flex-column flex-wrap">
           <h1 class="text-white" style="font-size: 40px;"><?php echo $movieDetails['title'] ?></h1>
                <h5 class="text-white" style="font-size: 30px;">Movie Story:<?php echo $movieDetails['description'] ?></h5>

                <h4 class="text-success fw-bold">Genre:<?php echo $movieDetails['genre'] ?></h4>
                <p class="text-secondary">Duration:<?php echo $movieDetails['duration'] ?> Hours</p>
                <p class="text-secondary">Release Date:<?php echo $movieDetails['release_date'] ?></p>
                <p class="text-secondary">Language:<?php echo $movieDetails['language'] ?></p>
                <p class="text-secondary">Director:<?php echo $movieDetails['director'] ?></p>

                <p class="text-secondary">Cast:<?php echo $movieDetails['cast'] ?></p>
                <p class="text-danger">Rating:<?php echo $movieDetails['rating'] ?></p>

                <p><i class="fa-solid fa-star" style="color:gold;"></i></p>
                <a href="/book/show/<?= $movieDetails['id']?>"><button type="button" class="btn btn-primary">Book Show Now</button></a>
    </div>
           </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script {csp-script-nonce}>
   $(document).ready(function(){

   });

</script>

<!-- -->

</body>
</html>
