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
        action="**your_script.php**"
        method="post"
      >
        <div class="form-floating mb-3">
          <input
            type="email"
            class="form-control"
            id="floatingInput"
            placeholder="name@example.com"
          />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-5">
          <input
            type="password"
            class="form-control"
            id="floatingPassword"
            placeholder="Password"
          />
          <label for="floatingPassword">Password</label>
        </div>
        <div class="mb-3 justify-content-center">
          <button type="submit" class="btn btn-bd-primary w-100">Login</button>
        </div>
        <hr />
        <div class="mt-3 justify-content-center">
          <button type="button" class="btn btn-bd-secondary w-100" id="signupId" name="signup">Sign Up</button>
        </div>
      </form>
    </div>
  </body>
</html>
