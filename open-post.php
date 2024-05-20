<?php
require_once ("db-config.php");

if (isset($_GET['post_id'])) {
    $post = $dbh->getPost($_GET['post_id']);
}

if(isset($post)):
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/astro_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Post</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include il tuo file JavaScript separato -->
    <script src="js/UserPost.js"></script>

    <title>User Post</title>
  </head>
  

  <body>
    <!-- Inclusione della navbar -->
    <?php echo require_once ("./components/navbar.php") ?>

    <!-- Spazio aggiunto tra navbar e container del post e dei commenti -->
    <div class="mt-5"></div>

    <!-- post container -->
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="row">
            <!-- Colonna per l'immagine del post -->
            <div class="col-md-7 mt-4">
                <img src="./img/<?php echo $post['media'][0] ?>" id="postImage" class="card-img-top" style="max-height: 600px; max-width: 600px;" alt="Immagine del post">
            </div>
            <!-- Colonna per la descrizione del post e i commenti -->
            <div class="col-md-5 mt-4">
                  <div class="card">
                    <div class="d-flex mb-3 mt-3">
                        <img src="img/<?php echo $post['owner']['pic'] ?>" class="rounded-circle me-2 ms-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                        <div>
                            <h6 class="mb-0"><?php echo $post['owner']['username'] ?></h6>
                            <p class="mb-0"><?php echo $post['description'] ?></p>
                        </div>
                    </div>
                  </div>
            
                <!-- Sezione per i commenti -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Commenti</h5>
                        <hr class="my-4 border-transparent">

                        <!-- includo tutti i commenti -->
                        <?php foreach($post['comment'] as $comment): ?>
                            <div class="d-flex mb-3">
                                <img src="img/<?php echo $comment['profile_pic'] ?>" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                                <div>
                                    <h6 class="mb-0">@<?php echo $comment['username'] ?></h6>
                                    <p class="mb-0"><?php echo $comment['message'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>

<?php else:
    header('Location: ./index.php');
endif;
