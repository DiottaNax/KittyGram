<?php
require_once ("db-config.php");

if (isset($_GET['post_id'])):

    $adoption = $dbh->getAdoption($_GET['post_id']);

    if ($_SESSION['user_id'] == $adoption['user_id']):

        $adoptionRequests = $dbh->getAdoptionRequests($adoption['post_id']);
    ?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="./css/style.css" />

            <!-- Script Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            
            <script src="js/adoptionRequests.js"></script>


            <title>Adoption Requests</title>
        </head>

        <body>
            <!-- Inclusione della navbar -->
            <?php require_once ("./components/navbar.php") ?>

            <!-- titolo della pagina -->
            <div class="container custom-margin-top mb-5">
                <h1 class="text-center">Adoption Requests</h1>
            </div>

            <?php foreach ($adoptionRequests as $adoptionRequest):
                $submitter = $dbh->getAccountFromId($adoptionRequest['user_id']); ?>
            <!-- card di una richiesta di adozione -->
            <div class="container d-flex justify-content-center align-items-center mb-5">
                <div class="card text-center" style="width: 30rem;">
                    <!-- icona del cestino -->
                    <svg
                        data-post-id="<?php echo $adoptionRequest['post_id'] ?>"
                        data-submitter="<?php echo $submitter['username'] ?>"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="remove-request bi bi-trash3 position-absolute top-0 end-0 m-3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="./img/<?php echo $submitter['pic']; ?>" class="rounded-circle me-2" alt="profile-pic" width="35"
                                height="35" />
                            <div class="text-start">
                                <h5 class="card-title mb-1"><?php echo $submitter['username']; ?></h5>
                                <p class="card-subtitle text-muted small mb-0"><?php echo $adoptionRequest['cell'] ?></p>
                            </div>
                        </div>
                        <p class="card-text">
                            <?php echo $adoptionRequest['presentation'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </body>

        </html>

    <?php else:

        http_response_code(403);
        die('<h1>You do not have permission to see this content</h1>');

    endif;

else:

    http_response_code(403);
    die('<h1>You do not have permission to see this content</h1>');

endif;
