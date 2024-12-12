<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket Details</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include jsPDF and html2canvas libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
    <style {csp-style-nonce}>
        body {
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        header {
            width: 100%;
        }

        .ticket-container {
            background-color: #fff;
            border: 2px dashed #ccc;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }

        .ticket-header, .ticket-footer {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .ticket-footer {
            border-radius: 0 0 10px 10px;
        }

        .ticket-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .ticket-image {
            text-align: center;
        }

        .ticket-image img {
            max-width: 100%;
            border-radius: 10px;
        }

        .ticket-details {
            text-align: center;
        }

        .ticket-details h3 {
            margin-bottom: 10px;
        }

        .ticket-details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    <header>
        <?= $this->include('partialViews/navbar') ?>
    </header>

    <section class="d-flex flex-column justify-content-center align-items-center">
        <div id="ticket" class="ticket-container">
            <div class="ticket-header">
                <h2>Ticket Details</h2>
            </div>
            <div class="ticket-body">
                <div class="ticket-image">
                    <a href="/movies/<?= $bookingDetails['movie_id'] ?>"><img src="/getimg/<?= $bookingDetails['poster_image'] ?>" alt="Movie Image"></a>
                </div>
                <div class="ticket-details">
                    <h3>Movie Title: <?= $bookingDetails['movieName'] ?></h3>
                    <p>Booked By: <?= $bookingDetails['user_name'] ?></p>
                    <p>Booking Date: <?= $bookingDetails['bookingDate'] ?></p>
                    <p>Expiry Date: <?= $bookingDetails['bookingExpiryDate'] ?></p>
                    <p class="p-2 bg-dark rounded text-white">Seat Number: <?= $bookingDetails['seats'] ?></p>
                </div>

                <a href='/generate-ticket/<?= $bookingDetails['bookingID']?>' class="w-100"><button  class="btn btn-danger">Download Ticket</button></a>
            </div>
            <div class="ticket-footer">
                <p>Thank you for booking with us!</p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script {csp-script-nonce}>
        $(document).ready(function(){
            $('#downloadTicket').on('click', function(){
                html2canvas(document.querySelector("#ticket")).then(canvas => {
                    let pdf = new jsPDF();
                    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 10, 190, 160);
                    pdf.save(`Ticket-<?= $bookingDetails['bookingID'] ?>.pdf`);
                });
            });
        });
    </script>

</body>

</html>
