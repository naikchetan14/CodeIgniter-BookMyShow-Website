<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Booking List</title>
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

    <section class="p-4 h-70    ">
        <h2 class="text-center text-white mt-2 mb-2">Booking List</h2>
        <div>
        <table class="table text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Movie Poster</th>
                        <th scope="col">Movie Name</th>

                        <th scope="col">Name</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col">Booking Expiry Date</th>
                        <th scope="col">Seats</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">View</th>

                    </tr>
                </thead>
        <?php foreach ($userBookings as $item): ?>
            
                <tbody>
                    <tr>
                        <th scope="row" class="p-3"><?= $item['bookingID'] ?></th>
                        <td> <a href="/movies/<?= $item['movie_id'] ?>"><img src="/getimg/<?= $item['poster_image'] ?>" class="card-img-top rounded"  style="width:55px;height:55px;background-size:cover"alt="Movie Image" style="height: 100%; object-fit: cover;"></img></a>
                        </td>
                        <td class="p-3"><?= $item['movieName'] ?></td>
                        <td class="p-3"><?= $item['user_name'] ?></td>
                        <td class="p-3"><?= $item['bookingDate'] ?></td>
                        <td class="p-3"><?= $item['bookingExpiryDate'] ?></td>
                        <td class="p-3"><?= $item['seats'] ?></td>
                        <td class="p-3 text-danger fw-bold"><?= $item['payment_status'] ?></td>
                        <td class="p-3"><a href="/view/ticket/<?= $item['bookingID']?>"><button type='button' class="btn btn-sm btn-danger"><i class="fa-solid fa-eye mx-1 text-white"></i>View</button></a></td>
                    </tr>
                </tbody>
           
        <?php endforeach; ?>
        </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script {csp-script-nonce}>

    </script>

</body>

</html>