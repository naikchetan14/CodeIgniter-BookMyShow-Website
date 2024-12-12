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
    <style>
        body {
            background-color: #0f2126;
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
        }

        .plane {
            margin: 20px auto;
            max-width: 300px;
        }

        .cockpit {
            height: 250px;
            position: relative;
            overflow: hidden;
            text-align: center;
            border-bottom: 5px solid #d8d8d8;

            &:before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                height: 500px;
                width: 100%;
                border-radius: 50%;
                border-right: 5px solid #d8d8d8;
                border-left: 5px solid #d8d8d8;
            }

            h1 {
                width: 60%;
                margin: 100px auto 35px auto;
            }
        }

        .exit {
            position: relative;
            height: 50px;

            &:before,
            &:after {
                content: "EXIT";
                font-size: 14px;
                line-height: 18px;
                padding: 0px 2px;
                font-family: "Arial Narrow", Arial, sans-serif;
                display: block;
                position: absolute;
                background: green;
                color: white;
                top: 50%;
                transform: translate(0, -50%);
            }

            &:before {
                left: 0;
            }

            &:after {
                right: 0;
            }
        }

        .fuselage {
            border-right: 5px solid #d8d8d8;
            border-left: 5px solid #d8d8d8;
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .row {}

        .seats {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .seat {
            display: flex;
            flex: 0 0 14.28571428571429%;
            padding: 5px;
            position: relative;

            &:nth-child(3) {
                margin-right: 14.28571428571429%;
            }

            input[type=checkbox] {
                position: absolute;
                opacity: 0;
            }

            input[type=checkbox]:checked {
                +label {
                    background: #bada55;
                    -webkit-animation-name: rubberBand;
                    animation-name: rubberBand;
                    animation-duration: 300ms;
                    animation-fill-mode: both;
                }
            }

            input[type=checkbox]:disabled {
                +label {
                    background: #dddddd;
                    text-indent: -9999px;
                    overflow: hidden;

                    &:after {
                        content: "X";
                        text-indent: 0;
                        position: absolute;
                        top: 4px;
                        left: 50%;
                        transform: translate(-50%, 0%);
                    }

                    &:hover {
                        box-shadow: none;
                        cursor: not-allowed;
                    }
                }
            }

            label {
                display: block;
                position: relative;
                width: 100%;
                text-align: center;
                font-size: 14px;
                font-weight: bold;
                line-height: 1.5rem;
                padding: 4px 0;
                background: #F42536;
                border-radius: 5px;
                animation-duration: 300ms;
                animation-fill-mode: both;

                &:before {
                    content: "";
                    position: absolute;
                    width: 75%;
                    height: 75%;
                    top: 1px;
                    left: 50%;
                    transform: translate(-50%, 0%);
                    background: rgba(255, 255, 255, .4);
                    border-radius: 3px;
                }

                &:hover {
                    cursor: pointer;
                    box-shadow: 0 0 0px 2px #5C6AFF;
                }

            }
        }

        @-webkit-keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                -webkit-transform: scale3d(.95, 1.05, 1);
                transform: scale3d(.95, 1.05, 1);
            }

            75% {
                -webkit-transform: scale3d(1.05, .95, 1);
                transform: scale3d(1.05, .95, 1);
            }

            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                -webkit-transform: scale3d(.95, 1.05, 1);
                transform: scale3d(.95, 1.05, 1);
            }

            75% {
                -webkit-transform: scale3d(1.05, .95, 1);
                transform: scale3d(1.05, .95, 1);
            }

            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        .rubberBand {
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
        }
    </style>
</head>

<body>
    <header>
        <?= $this->include('partialViews/navbar') ?>
    </header>

    <p class="hidden" id='movieID'><?= esc($movieDetails['id']) ?></p>


    <section class="container">
        <h3 class="text-center text-white mb-2 mt-2">Book Your Seats</h3>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-info alert-dismissible fade show w-25 mx-auto mt-3" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-info alert-dismissible fade show w-25 mx-auto mt-3" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="plane">

            <div class="exit exit--front fuselage">


            </div>


            <ol class="cabin fuselage p-2" id="cabin">
                <?php $rows = 10;
                $seatsPerRow = 6;
                $occupiedSeats = $seatsArr; // Array of occupied seats fetched from the database 
                for ($i = 1; $i <= $rows; $i++) {
                    echo '<li class="row row--' . $i . '">';
                    echo '<ol class="seats" type="A">';
                    for ($j = 0; $j < $seatsPerRow; $j++) {
                        $seatLetter = chr(65 + $j); // Convert number to letter (A-F) 
                        $seatId = $i . $seatLetter;
                        $isOccupied = in_array($seatId, $occupiedSeats) ? 'disabled' : '';
                        echo '<li class="seat">';
                        echo '<input type="checkbox" id="' . $seatId . '" ' . $isOccupied . ' />';
                        echo '<label for="' . $seatId . '">' . ($isOccupied ? 'Occupied' : $seatId) . '</label>';
                        echo '</li>';
                    }
                    echo '</ol>';
                    echo '</li>';
                } ?> </ol>
            <div class="exit exit--back fuselage">

            </div>
        </div>
        </div>
        <div class="w-100 text-center mt-2 mb-2">
            <button type="button" class="btn btn-primary" id="submitSeats" style="font-size: 19px;padding:5px 39px;">Book Show</button>
        </div>

        <div class="d-flex flex-row gap-2 align-items-center justify-content-center flex-wrap">
            <p class="border border-white text-center text-white bg-dark p-3 rounded fw-bold" style="font-size: 20px;">Total Seats:90</p>
            <p class="border border-danger text-center text-dark bg-white p-3 rounded fw-bold" id="totalSeats" style="font-size: 20px;">Total Seats Selected:5</p>
            <p class="border border-white text-center text-white bg-dark p-3 rounded fw-bold" id="totalPrice" style="font-size: 20px;">Total:90</p>
        </div>






        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script {csp-script-nonce}>
            var selectedSeats = [];

            $(document).ready(function() {
                $('#totalSeats').text(0);
                $('#totalPrice').text(0);

                function updateTotalSeats() {
                    var selectedSeats = $('#cabin input[type="checkbox"]:checked').length; // Count checked checkboxes
                    $('#totalSeats').text('Total Seats Selected: ' + selectedSeats); // Update the total seats display
                    $('#totalPrice').text('Total Price: ' + selectedSeats * 270);

                }

                // Event listener for checkbox changes
                $('#cabin input[type="checkbox"]').on('change', function() {
                    updateTotalSeats(); // Update total when a checkbox is changed
                });

                // Initial call to set the total seats on page load
                updateTotalSeats();
                $('#submitSeats').on('click', function() {
                    var selectedSeats = new Set(); // Use a Set to avoid duplicates
                    var movieId = $('#movieID').text();
                    $('#cabin input[type="checkbox"]:checked').each(function() {
                        selectedSeats.add($(this).attr('id'));
                    });

                    var selectedSeatsArray = Array.from(selectedSeats); // Convert Set to Array
                    console.log('Selected Seats:', selectedSeatsArray);

                    $.ajax({
                        url: '/bookshow',
                        type: 'POST',
                        data: {
                            seats: selectedSeatsArray,
                            movieId: movieId
                        },
                        success: function(response) {
                            console.log('Running...');
                            var occupiedSeats = response.occupiedSeats;
                            alert('Your Show Has been Booked successfully!');
                            // Disable the booked seats
                            // $('#cabin input[type="checkbox"]').each(function() {
                            //     var seatId = $(this).attr('id');
                            //     if (occupiedSeats.includes(seatId)) {
                            //         $(this).prop('disabled', true);
                            //         $(this).next('label').text('Occupied');
                            //     }
                            // });
                            // updateTotalSeats();
                            window.location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error:', textStatus, errorThrown);
                        }
                    });
                });
            });
        </script>
</body>

</html>