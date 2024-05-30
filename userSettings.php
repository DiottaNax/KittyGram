<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User's Settings</title>

    <!-- Collegamenti ai fogli di stile -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Collegamento a script esterni -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Collegamento ai tuoi file JavaScript -->
    <script src="js/UserSettings.js"></script>
    <script src="./js/searchUser.js"></script>

    <!-- Navbar -->
    <?php
    require_once ("db-config.php");

    // Verifica se l'utente è loggato
    if (isset($_SESSION['username'])) {
        // Recupera le informazioni dell'utente dal database
        $account = $dbh->getAccountFromUsername($_SESSION['username']);
        if ($account) {
            // Imposta le variabili dell'account con le informazioni recuperate
            $username = $account['username'];
            $profile_picture = $account['pic'];
            $bio = $account['user_bio'];
        } else {
            // Gestisci il caso in cui le informazioni dell'utente non vengono trovate nel database
            echo "Le informazioni dell'utente non sono disponibili nel database.";
            exit(); // Interrompe l'esecuzione dello script
        }
    } else {
        // Gestisci il caso in cui l'utente non è loggato
        echo "L'utente non è loggato.";
        exit(); // Interrompe l'esecuzione dello script
    }
    ?>
</head>

<body class="container-fluid d-flex justify-content-center align-items-center">
    <?php require_once ("./components/navbar.php") ?>

    <div class="narrow-card  mw-75 m-3 p-5 border-1 mt-5">
        <h1 class="text-center">Edit Profile</h1>

        <form class="text-left align-items-center py-4" id="updateForm" name="updateForm" enctype="multipart/form-data"
            action="api/update-profile.php" method="post">
            <div class="mb-4">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="img/<?php echo $profile_picture; ?>" id="previewImage" class="rounded-circle"
                            alt="profile-pic" width="50" height="50">
                    </div>
                    <div class="col">
                        <label for="new_pic">Profile Pic</label>
                        <input class="form-control" type="file" id="new_pic" name="new_pic">
                    </div>
                </div>
            </div>


            <div class="mb-3 row">
                <div class="col-6">
                    <label for="new_name" class="form-label text-start">Name</label>
                    <input type="text" class="form-control" placeholder="Type your new Name" id="new_name"
                        maxlength="25" name="new_name">
                </div>
                <div class="col-6">
                    <label for="new_surname" class="form-label text-start">Surname</label>
                    <input type="text" class="form-control" placeholder="Type your new Surname" id="new_surname"
                        maxlength="25" name="new_surname">
                </div>
            </div>

            <div class="mb-3">
                <label for="new_username" class="form-label text-start">Username</label>
                <input type="text" class="form-control"
                    placeholder="@<?php echo htmlspecialchars($_SESSION['username']); ?>" id="new_username"
                    maxlength="25" name="new_username">
            </div>

            <div class="mb-3">
                <label for="new_bio" class="form-label">Bio</label>
                <textarea class="form-control" placeholder="Type your new Bio" id="new_bio" maxlength="255"
                    name="new_bio" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label for="new_email" class="form-label">Email address</label>
                <input type="text" class="form-control" placeholder="Type your new Email" id="new_email" maxlength="319"
                    name="new_email">
            </div>

            <div class="mb-4 row">
                <div class="col-6">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="text" class="form-control" id="old_password" name="old_password"
                        placeholder="Type your old Password">
                </div>
                <div class="col-6">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="text" class="form-control" id="new_password" name="new_password"
                        placeholder="Type your new Password">
                </div>
            </div>


            <div class="mb-3 justify-content-center">
                <button type="submit" class="btn btn-bd-primary w-100" id="save-button" name="save-button"
                    style="background-color: #493400; color: white;">Save Changes</button>
            </div>
        </form>
    </div>

</body>