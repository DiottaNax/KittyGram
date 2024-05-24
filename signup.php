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

<title>Sign Up Page</title>
</head>

<body class="container-fluid d-flex justify-content-center align-items-center py-5">

  <div id="signupCard" class="card m-3 border-1">
    <header class="text-center w-300 mt-5">
      <img class="w-100" src="./img/KittyGram_Logo.png" alt="KittyGram logo" >
    </header>

    <form class="text-center align-items-center py-5" id="signupForm">
      <div class="row">
        <div class="col g-3 form-floating">
          <input type="text" class="form-control" name="name" id="nameId" placeholder="Name" aria-label="Name" required>
          <label for="nameId">Name</label>
        </div>
        <div class="col g-3 form-floating">
          <input type="text" class="form-control" name="surname" id="surnameId" placeholder="Last name" aria-label="Last name" required>
          <label for="surnameId">Last name</label>
        </div>
      </div>
      <div class="row">
        <div class="col g-3 form-floating">
          <input type="email" class="form-control" name="email" id="emailId" aria-label="Email address" placeholder="Email address" required>
          <label for="emailId">Email address</label>
        </div>
        <div class="col g-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="usernameId" placeholder="Username" aria-label="Username" required>
                <label for="usernameId">Username</label>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col g-3 form-floating">
          <input type="password" class="form-control" name="password" id="passwordId" aria-label="Password" placeholder="Password" required>
          <label for="passwordId">Password</label>
        </div>
        <div class="col g-3">
            <div class="form-floating">
                <input type="password" class="form-control" name="confirmPassword" id="confirmPasswordId" aria-label="Confirm password" placeholder="Confirm password" required>
                <label for="confirmPasswordId">Confirm password</label>
            </div>
        </div>
      </div>

      <label class="text-center mt-5" id="resultId" name="result"></label>

      <div class="mt-1 justify-content-center">
        <button type="submit" class="btn btn-bd-primary w-100" id="submitSignup">Sign Up</button>
      </div>
    </form>
  </div>

</body>
</html>