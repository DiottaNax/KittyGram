<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Includo il css esterno -->
    <link rel="stylesheet" href="./css/style.css" />

    <!-- Collega il file CSS di Bootstrap tramite CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Collega il file JavaScript di Bootstrap tramite CDN (è necessario per alcuni componenti di Bootstrap come il carousel, il modal, ecc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="./js/login.js"></script>

    <title>Login Page</title>
  </head>

  <body
    class="container-fluid d-flex justify-content-center align-items-center py-5"
  >
    <div class="card m-4 border-1">
      <header class="text-center w-300 m-3">
        <img
          class="w-100"
          src="./img/KittyGram_Logo.png"
          alt="KittyGram name logo"
        />
      </header>

      <form
        class="text-center align-items-center py-4 m-4"
        id="loginFormId"
        name="loginForm"
      >
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control"
            placeholder="happykitty"
            id="usernameId"
            name="username"
          />
          <label for="usernameId">Username</label>
        </div>
        <div class="form-floating mb-5">
          <input
            type="password"
            class="form-control"
            placeholder="Password"
            id="passwordId"
            name="password"
          />
          <label for="passwordId">Password</label>
        </div>
        <label class="text-center" id="resultId" name="result"></label>
        <div class="mb-3 mt-1 justify-content-center">
          <button type="submit" id="submitId" class="btn btn-bd-primary w-100">Login</button>
        </div>
        <hr />
        <div class="mt-3 justify-content-center">
          <button type="button" class="btn btn-bd-secondary w-100" id="signupId" name="signup">Sign Up</button>
        </div>
      </form>
    </div>
  </body>
</html>
