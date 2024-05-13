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
    <script src="js/Navbar.js"></script>

    <title>User Profile</title>
  </head>
  

  <body>
    <!-- Inclusione della navbar -->
    <div id="navbarContainer"></div>

    <!-- Spazio aggiunto tra navbar e container del post e dei commenti -->
    <div class="mt-5"></div>

    <!-- post container -->
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="row">
            <!-- Colonna per l'immagine del post -->
            <div class="col-md-7 mt-4">
                <img id="postImage" class="card-img-top" style="max-height: 600px; max-width: 600px;" alt="Immagine del post">
            </div>
            <!-- Colonna per la descrizione del post e i commenti -->
            <div class="col-md-5 mt-4">
                  <div class="card">
                    <div class="d-flex mb-3 mt-3">
                        <img src="img/User_ProfilePic.PNG" class="rounded-circle me-2 ms-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                        <div>
                            <h6 class="mb-0">astrobaleno</h6>
                            <p class="mb-0">Nessuno può sfuggire al destino scelto...</p>
                        </div>
                    </div>
                  </div>
            
                <!-- Sezione per i commenti -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Commenti</h5>
                        <!-- primo commento -->
                        <hr class="my-4 border-transparent">
                        <div class="d-flex mb-3">
                            <img src="img/Nax_ProfilePic.JPG" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                            <div>
                                <h6 class="mb-0">nax</h6>
                                <p class="mb-0">oggi studi??</p>
                            </div>
                        </div>
                        <!-- secondo commento -->
                        <div class="d-flex mb-3">
                            <img src="img/User_ProfilePic.PNG" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                            <div>
                                <h6 class="mb-0">astrobaleno</h6>
                                <p class="mb-0">zio pera lasciami in pace</p>
                            </div>
                        </div>
                         <!-- terzo commento -->
                         <div class="d-flex mb-3">
                          <img src="img\Saint_ProfilePic.jpeg" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                          <div>
                              <h6 class="mb-0">Saint</h6>
                              <p class="mb-0">sgommare</p>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>