<link rel="stylesheet" href="./css/style.css" />
<script src="js/sendNotification.js"> </script>
<script src="js/addComment.js"> </script>
<script src="js/commentModal.js"> </script>
<script src="./js/like.js"></script>

<?php

$feed  = $dbh->getHome($_SESSION["user_id"]);
if (!empty($feed)): ?>
    
    <?php
    foreach ($feed as $post):
    ?>
        <article class="article clickable post mb-4 p-4 shadow-sm rounded-5 mt-5 bg-white border border-dark">
            <div class="row">
                <div class="col inline text-start mt-2">
                    <img src="img/<?php echo $post['owner']['pic'] ?>" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                    <a href="open-profile.php?username=<?php echo $post['owner']['username']; ?>" class="username custom-link">
                        <?php echo $post['owner']['username'] ?>
                    </a>
                </div>
            </div>

            <div class="row mt-2 text-center">
                <!-- Row for the post image -->
                    <div class="col">
                        <img src="./img/<?php echo $post['media'][0]; ?>" alt="Post Image"
                            class="img-fluid border border-dark">
                    </div>
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
                            <div class="like-icon <?php echo $likedClass ?>" data-post-id="<?php echo $post["post_id"]; ?>" data-owner-id="<?php echo $post["user_id"]; ?>">
                                <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="<?php echo $likedClass == 'liked' ? 'M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314' : 'm8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15'; ?>" />
                                </svg>
                            </div>
                            <p class="likenumber mb-0 ms-2" data-postid="<?php echo $post["post_id"]; ?>" id="like-<?php echo $post["post_id"]; ?>"></p>
                        </div>
                        <div class="comment-icon" data-bs-toggle="modal" data-bs-target="#comment-modal" data-post-id="<?php echo $post["post_id"]; ?>" data-post-owner="<?php echo $post["owner"]["username"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-chat" viewBox="0 0 16 16">
                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
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
<?php require_once ("./modals/comment-modal.php") ?>
