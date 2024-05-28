<link rel="stylesheet" href="./css/style.css" />
<script src="js/sendNotification.js"> </script>
<script src="js/addComment.js"> </script>
<script src="js/commentModal.js"> </script>
<script src="./js/like.js"></script>



<?php

$feed = $dbh->getFeed($_SESSION["user_id"]);
$showingAdoptions = false;
if (isset($_GET['route']) && $_GET['route'] == 'adoptions') {
    $feedToShow = $feed['adoptions'];
    $showingAdoptions = true;
} else if (!isset($_GET['route'])) {
    $feedToShow = $feed['posts'];
} else {
    header("Location: index.php");
}

?>

<div class="posts-container d-flex flex-column align-items-center justify-content-center">
    <?php if (!empty($feedToShow)): ?>
        <?php foreach ($feedToShow as $post): ?>
            <article class="article clickable post mb-4 p-4 shadow-sm rounded-5 mt-5 bg-white border border-dark">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center mt-2 mb-1">
                        <div class="d-flex align-items-center">
                            <img src="img/<?php echo $post['owner']['pic'] ?>" class="avatar rounded-circle me-2" alt="Avatar utente">
                            <a href="open-profile.php?username=<?php echo $post['owner']['username']; ?>"
                                class="username custom-link">
                                <?php echo $post['owner']['username'] ?>
                            </a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-three-dots" data-bs-toggle="modal" data-bs-target="#post-settings-modal"
                            viewBox="0 0 16 16">
                            <path
                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                        </svg>
                    </div>
                </div>

                <div class="col post-image-container">
                    <?php
                    $images = $post["media"];
                    if (count($post["media"]) > 1): ?>
                        <div id="carousel-<?php echo $post['post_id']; ?>" class="carousel slide">
                            <div class="carousel-inner">
                                <?php foreach ($images as $index => $image): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="./img/<?php echo $image; ?>" class="d-block w-100 border border-dark"
                                            alt="Post Image">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carousel-<?php echo $post['post_id']; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carousel-<?php echo $post['post_id']; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php else: ?>
                        <img src="./img/<?php echo $images[0]; ?>" alt="Post Image" class="img-fluid border border-dark">
                    <?php endif; ?>
                </div>
                <div class="row mt-2">
                    <!-- Row for comments and likes -->
                    <div class="col text-end mb-2">
                        <?php
                        $liked = $dbh->userLikesPost($post["post_id"], $_SESSION["user_id"]);
                        $likedClass = $liked ? 'liked' : '';
                        ?>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="like-icon <?php echo $likedClass ?>" data-post-id="<?php echo $post["post_id"]; ?>"
                                    data-owner-id="<?php echo $post["user_id"]; ?>">
                                    <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path
                                            d="<?php echo $likedClass == 'liked' ? 'M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314' : 'm8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15'; ?>" />
                                    </svg>
                                </div>
                                <p class="likenumber mb-0 ms-2" data-postid="<?php echo $post["post_id"]; ?>"
                                    id="like-<?php echo $post["post_id"]; ?>"></p>
                            </div>
                            <?php if($showingAdoptions): ?>
                            <div class="adoption-icon" data-bs-toggle="modal" data-bs-target="#adoption-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-house-heart"
                                    viewBox="0 0 16 16">
                                    <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982" />
                                    <path
                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                </svg>
                            </div>
                            <?php endif; ?>
                            <div class="comment-icon" data-bs-toggle="modal" data-bs-target="#comment-modal"
                                data-post-id="<?php echo $post["post_id"]; ?>"
                                data-post-owner="<?php echo $post["owner"]["username"]; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-chat"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mb-0 fst-italic"><?php echo $post["description"]; ?></p>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-center">
            <p>There are no posts :(</p>
            <p>Find someone new on the explore page</a></p>
        </div>
    <?php endif; ?>
</div>

<?php require_once ("./modals/comment-modal.php") ?>
<?php require_once ("./modals/adoption-modal.php") ?>
<?php require_once ("./modals/post-settings-modal.php") ?>