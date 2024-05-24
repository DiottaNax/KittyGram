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
                <div class="col text-end me-2">
                    <?php if ($_SESSION["user_id"] != $post["owner"]["id"]): ?>
                        <?php
                        if (empty($dbh->userLikesPost($post["post_id"], $_SESSION["user_id"]))):
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="empty-star bi bi-star"
                                viewBox="0 0 16 16" data-owner-id="<?php echo $post["owner"]["id"]; ?>"
                                data-post-id="<?php echo $post["post_id"]; ?>">
                                <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                            </svg>
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="full-star bi bi-star-fill"
                                viewBox="0 0 16 16" data-post-id="<?php echo $post["post_id"]; ?>">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2 text-center">
                <!-- Row for the post image -->
                    <div class="col">
                        <img src="./img/<?php echo $post['media'][0]; ?>" alt="Post Image"
                            class="img-fluid border border-dark">
                    </div>
            </div>
            <div class="row mt-2 ">
                <div class="col inline text-start mt-2 ms-3">
                    <a href="open-post.php?id=<?php echo $post["owner"]["id"]; ?>"
                        class="username">@<?php echo $post["owner"]["username"] ?></a>
                </div>
                <!-- Row for comments and likes -->
                    <div class="col text-end mb-2">
                        <button class="btn comment" type=" button" data-bs-toggle="modal" data-bs-target="#comment-modal" data-post-id=<?php echo $post["post_id"]; ?> data-post-owner=<?php echo $post["owner"]["username"]; ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class=" bi bi-chat" viewBox="0 0 16 16"> <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                            </svg>
                        </button>

                        <?php $liked = $dbh->userLikesPost($post["post_id"], $_SESSION["user_id"]);
                            $likedClass = $liked ? 'liked' : '';
                        ?>
                        <div class="like-icon <?php echo $likedClass ?>" data-post-id="<?php echo $post["post_id"]; ?>" data-owner-id="<?php echo $post["user_id"]; ?>">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path d="<?php echo $likedClass == 'liked' ? 'M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314' : 'm8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15'; ?>" />
                            </svg>
                        </div>
                        <p class="likenumber mb-0" data-postid="<?php echo $post["post_id"]; ?>"
                            id="like-<?php echo $post["post_id"]; ?>"></p>
                    </div>
            </div>
            <p class="ms-3 mb-0 fst-italic"><?php echo $post["description"]; ?></p>
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <div class="text-center">
        <p>There are no posts :(</p>
        <p>Find someone new on the explore page</a></p>
    </div>
<?php endif; ?>
<?php require_once ("./modals/comment-modal.php") ?>
