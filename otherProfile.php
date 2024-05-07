<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/astro_style.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="js/UserProfile.js"></script>
    <script src="js/FollowButton.js"></script>
    <script src="js/Navbar.js" defer></script>
    <script src="js/IncludeModals.js" defer></script>

    <title>Other Profile</title>
  </head>

  <body>
    <!-- Inclusione della navbar -->
    <div id="navbarContainer"></div>

    <!-- Inclusione della finestra modale dei follower -->
    <div id="followersModalContainer"></div>

    <!-- Inclusione della finestra modale dei seguiti -->
    <div id="followingModalContainer"></div>

    <!-- user-info container -->
    <div class="container d-flex justify-content-center mt-5 py-5">
      <img
        src="/img/Nax_ProfilePic.jpg"
        class="rounded-circle"
        alt="profile-pic"
        width="150"
        height="150"
      />
      <ul>
        <li class="list-group-item"><h2>Federico Diotallevi</h2></li>
        <li class="list-group-item"><h4>@nax</h4></li>
        <button
          id="followButton"
          type="button"
          class="btn btn-light mt-4 opacity-100"
          onclick="toggleFollow()"
        >
          Following
        </button>
      </ul>
    </div>

    <!-- 3 bottoni per numero di: POST, FOLLOWERS, SEGUITI -->
    <div
      class="container d-flex justify-content-between mb-5 align-items-center"
    >
      <span>2 post</span>
      <button
        type="button"
        class="btn"
        data-bs-toggle="modal"
        data-bs-target="#followersModal"
      >
        2 follower
      </button>
      <button
        type="button"
        class="btn"
        data-bs-toggle="modal"
        data-bs-target="#followingModal"
      >
        1 seguiti
      </button>
    </div>

    <!-- bio -->
    <div class="container d-flex justify-content-center mt-3">
      <h6 class="text-center">
        <em
          >" Troppi demoni abitano la mia capa, prego Dio che sia un sogno e che
          mi danni se questo è tutto vero. "</em
        >
      </h6>
    </div>

    <!-- posts container -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-3">
            <img
              src="/img/cat-example4.jpg"
              class="card-img-top w-100"
              onclick="redirectToUserPost('/img/cat-example4.jpg')"
              alt="example1"
            />
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <img
              src="/img/cat-example5.jpg"
              class="card-img-top w-100"
              onclick="redirectToUserPost('/img/cat-example5.jpg')"
              alt="example1"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Script Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
