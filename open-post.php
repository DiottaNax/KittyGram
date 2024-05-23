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
    <script src="./js/UserPost.js" defer></script> <!-- Aggiunto defer -->
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Inclusione della navbar -->
    <?php echo require_once ("./components/navbar.php") ?>

    <title>User Post</title>
  </head>
  

  <body>

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
                    <p class="smaller-text mb-0 text-end">Dec 21 1981</p>
                  </div>
            
                <!-- Sezione per i commenti -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Commenti</h5>
                        <hr class="my-4 border-transparent">

                        <!-- Contenitore scorrevole per i commenti -->
                        <div class="comment-container">
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
                    <!-- Navbar con tasto like -->
                    <nav class="navbar navbar-expand mt-3">
                        <div class="container-fluid">
                            <!-- tasto like -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" id="likeIcon">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                            </svg>
                            <!-- tasto commento -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16" id="commentIcon">
                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                            </svg>
                        </div>
                    </nav>
                    <div class="card mt-2">
                        <div class="d-flex align-items-center">
                            <img src="img/<?php echo $post['owner']['pic'] ?>" class="rounded-circle me-2 ms-2" alt="Avatar utente" style="width: 20px; height: 20px;">
                            <textarea class="form-control transparent-input" placeholder="Add a comment..." id="comment" maxlength=200></textarea>  
                        </div>                            
                        <button type="button" class="btn btn-light mt-2" id="sendButton" style="display: none;">Send</button>                       
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
?>
