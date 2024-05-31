<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- utility for signup -->
    <script src="./js/signup.js"></script>

    <?php require_once ("db-config.php"); ?>

    <title>Sign Up Page</title>
</head>

<body class="container-fluid d-flex justify-content-center align-items-center py-5">

    <div id="signupCard" class="card m-3 border-1">
        <header class="text-center w-300 mt-5">
            <img class="w-100" src="./img/KittyGram_Logo.png" alt="KittyGram logo">
        </header>

        <form class="align-items-center py-5" id="signupForm">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="nameId">Name</label>
                        <input type="text" class="form-control" name="name" id="nameId" aria-label="Name" maxlength="24" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="surnameId">Surname</label>
                        <input type="text" class="form-control" name="surname" id="surnameId" aria-label="Last name" maxlength="24"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="emailId">Email address</label>
                <input type="email" class="form-control" name="email" id="emailId" aria-label="Email address" maxlength="318" required>
            </div>
            <div class="form-group mb-3">
                <label for="usernameId">Username</label>
                <input type="text" class="form-control" name="username" id="usernameId" aria-label="Username" maxlength="24" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group mb-3">
                        <label for="passwordId">Password</label>
                        <input type="password" class="form-control" name="password" id="passwordId" maxlength="30"
                            aria-label="Password" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="confirmPasswordId">Confirm password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPasswordId" maxlength="30"
                            aria-label="Confirm password" required>
                    </div>
                </div>
            </div>
            
            <div class="mt-1 justify-content-center text-center">
                <label class="text-center justify-content-center mt-5" id="resultId"></label>
                <button type="submit" class="btn btn-bd-primary w-100" id="submitSignup">Sign Up</button>
            </div>
        </form>
    </div>

</body>

</html>