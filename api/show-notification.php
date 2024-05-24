<?php
require_once ("db-config.php");
?>
<?php if (!empty($templateParams["notifications"])): ?>
    <?php foreach ($templateParams["notifications"] as $notification): ?>
        <div class="notification container mb-2 p-0 rounded-5" data-id="<?php echo $notification["notification_id"]; ?>" <?php if ($notification["seen"]) {
               echo ('style="opacity: 0.5;"');
           } ?>>
            <div class="row">
                <div class="col-auto d-flex align-items-center">
                    <?php if ($notification["message"] == "Follow"): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                        </svg>
                    <?php endif; ?>
                    <?php if ($notification["message"] == "Like"): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                        </svg>
                    <?php endif; ?>
                </div>
                <div class="col-7">
                    <?php $accountFrom = $dbh->getAccountFromUsername($notification["username_from"]) ?>
                    <img src="./img/<?php echo $accountFrom['pic'] ?>" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                    <a class="link-offset-2 link-underline mb-0"
                        href=" <?php echo "open-profile.php?username=" . $notification["username_from"] ?>">
                        @<?php
                        echo $notification["username_from"];
                        ?>
                    </a>
                    <p>
                        <?php
                        echo $notification["message"];
                        ?>
                    </p>
                </div>

                <?php if (isset($notification['post_id'])): ?>
                    <?php $post = $dbh->getPost($notification['post_id']) ?>
                    <div class="col d-flex justify-content-end align-items-center">
                        <a href="<?php echo "open-post.php?post_id=" . $notification["post_id"]; ?>">
                            <img src="./img/<?php echo $post['media'][0] ?>" alt="Post image" style="width: 50px; height: 50px;">
                            </img>
                        </a>
                    </div>
                    </a>

                <?php endif; ?>
                <hr />
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center">No notification yet, running out of kitties &#x1F640;??</p>
<?php endif; ?>