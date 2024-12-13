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
            background-color: #0f2126;
        }
    </style>
</head>

<body>

    <header>
        <?= $this->include('partialViews/navbar') ?>
    </header>

    <section class="container mt-3 mb-3">
        <h4 class="text-center text-white">User Tracking Table</h4>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Log In Time</th>
                    <th>Log Out Time</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userTrackingData as $item): ?>

                    <tr>
                        <th scope="row"><?= $item['userID'] ?></th>
                        <th scope="row" class="text-secondary fw-bold"><?= $item['user_name'] ?></th>

                        <td><?= $item['login_time'] ?></td>
                        <td>
                            <?php if (empty($item['logout_time'])): ?>
                                <span class="text-success fw-bold">on session</span>
                            <?php else: ?>
                                <?= $item['logout_time'] ?>
                            <?php endif; ?>
                        </td>
                        <td><?= $item['date'] ?></td>
                        <td>
                            <?php if (empty($item['logout_time'])): ?>
                                <button type="button" class="btn btn-sm btn-success">Active</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-sm btn-danger">InActive</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    < <?php endforeach; ?>

                        </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script {csp-script-nonce}>
        $(document).ready(function() {

        });
    </script>

</body>

</html>