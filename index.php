<?php
include __DIR__ . '/db.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/main.css">
    <title>php-hotel</title>
</head>

<body>
    <header>
        <h1>BUKINGHE</h1>
    </header>
    <main>
        <section>
            <form action='./index.php' method="GET" class="d-flex flex-column mb-5">
                <div class="d-flex justify-content-center">
                    <div class="filter">
                        <label for="parking" class="form-label">Parking</label>
                        <select name="parking" id="parking" class="form-select">
                            <option value="" selected>All</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="filter">
                        <label for="rating" class="form-label">Rating</label>
                        <input type='number' name='rating' id='rating' class="form-control" placeholder='Sort by rating from 0 to 5' min="0" max="5">
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type='submit' class="btn btn-primary">Submit</button>
                </div>
            </form>
        </section>

        <section class="card">
            <?php
            foreach ($hotels as $hotel) {
                if (isset($_GET['parking']) && $_GET['parking'] !== '' && $hotel['parking'] != $_GET['parking']) {
                continue;
                }
                if (isset($_GET['rating']) && $_GET['rating'] !== '' && $hotel['vote'] < $_GET['rating']) {
                continue;
                }
                echo '<div class="card-header">';
                echo '<h2>' . $hotel['name'] . '</h2>';
            ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <?php
                        echo '<p>' . 'Vote:' . ' '  .   $hotel['vote'] . '</p>';
                        ?> </li>
                    <li class="list-group-item">
                        <?php
                        echo '<p>' . 'Distance to the center:' . ' ' . $hotel['distance_to_center'] . 'km' . '</p>';
                        ?> </li>
                <?php
                echo '</div>';
            } ?>
                </ul>
        </section>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</body>

</html>