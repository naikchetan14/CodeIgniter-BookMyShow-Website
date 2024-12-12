<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome to CodeIgniter 4!</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- STYLES -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js'></script>
  <style {csp-style-nonce}>
    body {
      background-color: #0f2126;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <header>
    <?= $this->include('partialViews/navbar') ?>
    <?= $this->include('partialViews/carousel') ?>
  </header>

  <section class="mt-5 mb-5">
    <h2 class="text-center text-white mb-4">Trending Movies</h2>

    <div class="container">
      <div class="row" id="movies-container">
        <?php foreach ($data as $item): ?>

          <div class="col-md-4 col-sm-3 mb-4" style="position:relative;">
            <div class="card w-100 rounded">
              <div style="height: 300px;width:100%;">
              <a href="/movies/<?= $item['id']?>"><img src="/getimg/<?= $item['poster_image'] ?>" class="card-img-top rounded"  alt="Movie Image" style="height: 100%; object-fit: cover;"></img></a>
        </div>
              <div class="card-body d-flex flex-column">
                <h4 class="card-title text-secondary"><?php echo $item['title'] ?></h4>
                <h5 class="card-title">Movie Story:<?php echo $item['description'] ?></h5>

                <span class="card-title text-secondary">Genre:<?php echo $item['genre'] ?></span>
                <span class="card-title text-secondary">Duration:<?php echo $item['duration'] ?></span>
                <span class="card-title text-secondary">Release Date:<?php echo $item['release_date'] ?></span>
                <span class="card-title text-secondary">Language:<?php echo $item['language'] ?></span>
                <span class="card-title text-secondary">Director:<?php echo $item['director'] ?></span>

                <span class="text-secondary">Cast:<?php echo $item['cast'] ?></span>
                <span class="card-title text-secondary">Rating:<?php echo $item['rating'] ?></span>

                <h6><i class="fa-solid fa-star" style="color:gold;"></i></h6>
                <?php if(session('Roles') === 'admin'): ?>
                <div class="w-50 d-flex flex-row flex-wrap gap-2">
             <a href='/admin/update/<?php echo $item['id']?>' class=""><button type="button" class="btn btn-success w-100"><i class="fa-solid fa-pen-to-square"></i></button></a>
                 <a href='/admin/delete/<?php echo $item['id']?>' onclick="return confirm('Are You Sure You Want To Delete The Movie');" class=""><button type="button" class="btn btn-danger w-100"><i class="fa-solid fa-trash"></i></button></a>
                      </div>
                      <?php elseif(session('Roles') === 'user'): ?>
                <button type="button" class="btn btn-dark w-100">Book Show Now</button>
                <?php endif; ?>

              </div>
            </div>
            <span class="badge text-bg-success p-2" style="position:absolute;right:-10px;top:-10px;">Tickets full</span>

          </div>
        <?php endforeach; ?>



      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script {csp-script-nonce}>
    $(document).ready(function() {
      // $.ajax({
      //     url:'https://api.themoviedb.org/3/discover/movie?api_key=8861ab67a212e70e0aa04e2e6bea11f5&page=2',
      //     method:'GET',
      //     success:function(data){
      //        displayMovies(data.results);
      //     },
      //     error:function(error){
      //         console.error('Error fetching movies:', error);
      //     }
      // })



      //  function displayMovies(movies){
      //   console.log('Movies',movies);
      //   const container=$('#movies-container');
      //   container.empty();

      //      movies.forEach((element,index) => {
      //       const elementJson = JSON.stringify(element).replace(/'/g, "\\'").replace(/"/g, '&quot;');

      //       const card=`
      //         <div class="col-md-3 mb-4 d-flex" style="position:relative;">
      //         <div class="card rounded">
      //                   <img src="https://image.tmdb.org/t/p/w500${element?.poster_path}" class="card-img-top rounded" style="height:100%;object-fit:cover;" alt="Movie Image" style="height: 100%; object-fit: cover;"></img>
      //                   <div class="card-body d-flex flex-column">
      //                       <h5 class="card-title text-secondary">${element.original_title}</h5>
      //                       <p class="text-secondary-emphasis">${element.overview.substring(0,100)}...</p>
      //                       <h6 class="card-title text-secondary-emphasis">Release Date:${element.release_date}</h6>
      //                       <h6>Rating:<span class="text-primary fw-bold">${element.vote_average}/10</span></h6>
      //                       <h6><i class="fa-solid fa-star" style="color:gold;"></i></h6>
      //                      <button type="button" class="btn btn-secondary text-white fw-bold inline" onclick="bookShow(${element.id},${elementJson})">Book Show</button>
      //                   </div>
      //               </div>
      //               <span class="badge text-bg-success p-2" style="position:absolute;right:-5px;top:-10px;">Tickets full</span>

      //               </div>
      //       `;
      //         container.append(card);
      //      });

      //  }





    });

    function bookShow(id, movie) {
      console.log(id, movie)
      $.ajax({
        url: `/book/show/${id}`,
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Adjust according to your CSRF setup
        },
        contentType: 'application/json',
        data: JSON.stringify(movie),
        success: function(data) {
          console.log(data);
        },
        error: function(data) {
          console.log(data);
        }
      });
      // window.location.href='/book/show/'+ id;
    }
  </script>

  <!-- -->

</body>

</html>