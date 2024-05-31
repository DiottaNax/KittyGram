<?php
require_once ("db-config.php");

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $isAdoption = $dbh->isAdoption($post_id);

    if ($isAdoption) {
        $currentPost = $dbh->getAdoption($post_id);
    } else {
        $currentPost = $dbh->getPost($post_id);
    }

}

if (isset($currentPost)):
    ?>
    <!Doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="js/UserPost.js"></script>
        <script src="js/like.js"></script>
        <script src="js/sendNotification.js"></script>
        <script src="js/adoptionModal.js"></script>
        <script src="js/addComment.js"></script>
        <title>User Post</title>

        <!-- Inclusione della navbar -->
        <?php echo require_once ("./components/navbar.php") ?>
        <?php $viewer = $dbh->getAccountFromUsername($_SESSION['username']); ?>
    </head>

    <body>
        <!-- post container -->
        <div class="container-fluid py-4 d-flex justify-content-center align-items-center min-vh-100">
            <div class="row auto-cols w-100">
                <!-- Colonna per l'immagine del post -->
                <div class="col mt-5 mb-5 py-4 d-flex justify-content-center">
                    <!-- Contenuto dell'immagine -->
                    <?php
                    $images = $currentPost["media"];
                    if (count($currentPost["media"]) > 1): ?>
                        <!-- Carosello se ci sono più immagini -->
                        <div id="carousel-<?php echo $currentPost['post_id']; ?>" class="carousel slide">
                            <!-- Indicatori del carosello -->
                            <div class="carousel-indicators">
                                <?php foreach ($images as $index => $image): ?>
                                    <button type="button" data-bs-target="#carousel-<?php echo $currentPost['post_id']; ?>"
                                        data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>"
                                        aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                        aria-label="Slide <?php echo $index + 1; ?>"></button>
                                <?php endforeach; ?>
                            </div>
                            <!-- Immagini del carosello -->
                            <div class="carousel-inner">
                                <?php foreach ($images as $index => $image): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="./img/<?php echo $image; ?>" class="d-block w-100 h-100 post-image"
                                            alt="Post Image">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Controlli del carosello -->
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carousel-<?php echo $currentPost['post_id']; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carousel-<?php echo $currentPost['post_id']; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php else: ?>
                        <!-- Immagine singola se c'è solo un'immagine -->
                        <img src="./img/<?php echo $images[0]; ?>" alt="Post Image" class="border border-dark post-image">
                    <?php endif; ?>
                </div>

                <!-- Colonna per la descrizione del post e i commenti -->
                <div class="col mt-5 d-flex justify-content-center">

                    <div class="card p-4">
                        <div class="mb-1 d-flex align-items-center">
                            <img src="img/<?php echo $currentPost['owner']['pic'] ?>" class="avatar rounded-circle me-2"
                                alt="Avatar utente">
                            <div>
                                <a href="open-profile.php?username=<?php echo $currentPost['owner']['username']; ?>"
                                    class="custom-link">
                                    <h5 class="mb-0"><?php echo $currentPost['owner']['username'] ?></h5>
                                </a>
                                <p class="mb-0 smaller-text"><?php echo $currentPost['date'] ?></p>
                            </div>
                            <?php if ($currentPost['user_id'] == $_SESSION['user_id']) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-three-dots position-absolute top-0 end-0 m-3" data-bs-toggle="modal"
                                data-bs-target="#post-settings-modal" viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                            </svg>
                            <?php endif; ?>
                        </div>
                        <p class="mb-0 mt-1 text-start"> <?php echo $currentPost['description'] ?></p>

                        <hr class="my-3 border-dark">

                        <!-- Navbar con tasto like -->
                        <nav class="navbar navbar-expand mt-1">
                            <div class="container-fluid">

                                <?php
                                $liked = $dbh->userLikesPost($currentPost["post_id"], $_SESSION["user_id"]);
                                $likedClass = $liked ? 'liked' : '';
                                ?>
                                <!-- tasto like -->
                                <div class="like-icon <?php echo $likedClass ?>"
                                    data-post-id="<?php echo $currentPost["post_id"]; ?>"
                                    data-owner-id="<?php echo $currentPost["user_id"]; ?>">
                                    <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path
                                            d="<?php echo $likedClass == 'liked' ? 'M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314' : 'm8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15'; ?>" />
                                            <text x="8" y="8" fill="black" font-size="6" text-anchor="middle" alignment-baseline="middle"><?php echo $dbh->getNumLikes($post_id) ?></text>
                                    </svg>

                                </div>

                                <?php if ($isAdoption): ?>
                                    <!-- If we're showing an adoption, put relative buttons -->
                                    
                                    <?php if ($_SESSION['user_id'] != $currentPost['user_id']): ?>
                                        <!-- if the user is not the post owner -->
                                        <?php if (!$currentPost['adopted']): ?> <!-- If the cat is not adopted -->
                                            <!-- Adoption request button -->
                                            <div class="d-flex flex-column align-items-center mb-3">
                                                <!-- city of adoption -->
                                                <span class="mb-1 fw-bold me-4">📍<?php echo $currentPost['city_name'] ?></span>
                                                <div class="adoption-icon" data-bs-toggle="modal" data-bs-target="#adoption-modal"
                                                    data-post-id="<?php echo $currentPost['post_id'] ?>"
                                                    data-owner="<?php echo $currentPost['owner']['username'] ?>">
                                                    <!-- icon of adoption (heart-house) -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-house-heart"
                                                        viewBox="0 0 16 16">
                                                        <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982"/>
                                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <!-- tag adopted -->
                                            <div class="d-flex flex-column align-items-center mb-3">
                                                <!-- city of adoption -->
                                                <span class="mb-1 fw-bold me-4">📍<?php echo $currentPost['city_name'] ?></span>
                                                <!-- tag "adopted" -->
                                                <button type="button" class="btn btn-primary" disabled>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        class="bi bi-check-lg me-2" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                                    </svg>
                                                    Adopted
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <!-- button to view adoption requests -->
                                        <div class="d-flex flex-column align-items-center mb-3">
                                            <!-- city of adoption -->
                                            <span class="mb-1 fw-bold me-4">📍<?php echo $currentPost['city_name'] ?></span>
                                            <a href="adoption-requests.php?post_id=<?php echo $currentPost['post_id'] ?>"
                                                class="adoption-requests-icon">
                                                <!-- icon to see adoptions (two-houses) -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-houses"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <!-- tasto commento -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16" id="commentIcon">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                                    <text x="8" y="9" font-size="6" text-anchor="middle" alignment-baseline="middle"><?php echo count($currentPost['comment']) ?></text>
                                </svg>

                            </div>
                        </nav>


                        <div class="card-body">
                            <h5 class="card-title text-start">Commenti</h5>
                            <hr class="my-1 border-transparent">

                            <!-- Contenitore scorrevole per i commenti -->
                            <div class="comment-container">
                                <!-- includo tutti i commenti -->
                                <?php foreach ($currentPost['comment'] as $comment): ?>
                                    <div class="d-flex mb-3">
                                        <img src="img/<?php echo $comment['profile_pic'] ?>" class="avatar rounded-circle me-2"
                                            alt="Avatar utente">
                                        <div>
                                            <a href="open-profile.php?username=<?php echo $comment['username']; ?>"
                                                class="custom-link">
                                                <h6 class="mb-0">@<?php echo $comment['username'] ?></h6>
                                            </a>
                                            <p class="mb-0"><?php echo $comment['message'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <form id="commentForm" class="w-100">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="img/<?php echo $viewer['pic'] ?>"
                                        class="small-avatar rounded-circle me-2 ms-2" alt="Avatar utente">
                                    <input type="hidden" id="writer" name="writer"
                                        value="<?php echo htmlspecialchars($viewer['username']); ?>">
                                    <input type="hidden" id="input-post-owner" name="input-post-owner"
                                        value="<?php echo htmlspecialchars($currentPost['owner']['username']); ?>">
                                    <input type="hidden" id="input-post-id" name="input-post-id"
                                        value="<?php echo htmlspecialchars($currentPost['post_id']); ?>">
                                    <textarea class="form-control transparent-input" placeholder="Add a comment..."
                                        id="commentArea" maxlength=200></textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mt-2 w-100" id="sendButton">Send</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
    <?php require_once ("./modals/adoption-modal.php") ?>
    <?php require_once ("./modals/post-settings-modal.php") ?>
<?php else:
    header('Location: ./index.php');
endif;
?>