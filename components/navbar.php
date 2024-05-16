<script src="./js/searchUser.js"></script>

<header class="nav p-2 fixed-top shadow-sm bg-white">

    <!-- Notification window -->

    <!-- Navbar components -->
    <div class="container">

        <!-- Add Post -->
        <div class="row">
            <!-- Search -->
            <div class="col text-start mt-2">
                <svg xmlns="http://www.w3.org/2000/svg"  data-bs-toggle="modal" data-bs-target="#searchModal" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                </svg>
            </div>

            <div class="col text-start mt-2">
                <svg data-bs-toggle="modal" data-bs-target="#new-post-modal" xmlns="http://www.w3.org/2000/svg"
                    width="30" height="30" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            </div>

            <!-- Open Profile -->
            <div class="col text-start mt-2">
                <a href="open-profile.php?username=<?php echo $_SESSION['username'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-person-circle"
                        viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </a>
            </div>

            <!-- Logo -->
            <div class="col text-center mt-2 w-300">
                <a href="index.php"><img src="./img/KittyGram_Logo.png" alt="Kittygram" width="200" /></a>
            </div>

            <div class="col text-end mt-2">
                <svg data-bs-toggle="modal" data-bs-target="#notification-modal" xmlns="http://www.w3.org/2000/svg"
                    width="30" class="clickable bi bi-bell" viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                </svg>
                <?php
                $templateParams["notifications"] = $dbh->getNotificationsById($_SESSION["user_id"]);
                if (!empty($templateParams["notifications"])):
                    ?>
                    <span class="badge bg-danger"><?php echo (count($templateParams["notifications"])); ?></span>
                <?php endif; ?>
            </div>
            <div class="col text-end mt-2">
                <a title="logout" href="./api/logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-box-arrow-in-right"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                        <path fill-rule="evenodd"
                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Include modals -->
<?php require_once ("./modals/notification-modal.php"); ?>
<?php require_once ("./modals/new-post-modal.php"); ?>
<?php require_once ("./modals/search-modal.php"); ?>
