<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Includo il css esterno -->
    <link rel="stylesheet" href="./css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>KittyGram: Home</title>
  </head>
  <body class="d-flex justify-content-center py-4">
    <!-- Top navbar -->
    <header class="nav p-2 fixed-top shadow-sm bg-white">
      <div class="container">
        <div class="row">
          
          <div class="col text-start mt-2">
          <a href="signup.php" title="home">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              class="bi bi-house-door"
              viewBox="0 0 16 16"
            >
              <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"
              />
            </svg>
          </a>
          </div>
        
          <div class="col text-start mt-2">
            <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              class="bi bi-plus-circle"
              viewBox="0 0 16 16"
            >
              <path
                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
              />
              <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
              />
            </svg>
          </a>
          </div>
          <div class="col text-center mt-1 w-300">
            <a href=""><img src="./img/KittyGram_Logo.png" alt="Kittygram" width="200" /></a>
          </div>
          <div class="col text-end mt-2">
          <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
              />
            </svg>
            </a>
          </div>
          <div class="col text-end mt-2">
          <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              class="bi bi-bell"
              viewBox="0 0 16 16"
            >
              <path
                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"
              />
            </svg>
            </a>
          </div>
        </div>
      </div>
    </header>
    <main class="container align-items-center justify-content-center">
      <!-- Example posts for testing -->
      <section class="mt-5 p-4 shadow-sm rounded-5 bg-white">
        <div class="row">
          <div class="col text-start">
            <h2>New Post</h2>
          </div>
          <div class="col text-end">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              class="bi bi-bookmark"
              viewBox="0 0 16 16"
            >
              <path
                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"
              />
            </svg>
          </div>
        </div>
        <img
          src="img/gatto esempio.jpeg"
          class="rounded mx-auto d-block"
          alt="gatto1"
          style="max-width: 100"
        />
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus
          diam vitae venenatis malesuada. Sed bibendum ante vel congue suscipit.
          Morbi eu mollis lacus. Suspendisse potenti. Sed elementum ante leo, at
          pellentesque nisl vulputate sit amet. Sed tristique gravida felis, eu
          euismod nulla fermentum at. Nam volutpat mollis interdum. Quisque
          tristique commodo egestas. In sapien magna, tempor vitae sollicitudin
          ac, maximus volutpat massa. Integer vestibulum tortor bibendum odio
          consequat, non consectetur dolor varius. Nam nisl neque, ultrices quis
          ultricies vitae, dictum ac tellus. Nulla facilisi.
        </p>

        <div class="row mt-2">
          <div class="col inline text-start">
            <p>@username</p>
          </div>
          <div class="col-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              class="bi bi-heart"
              viewBox="0 0 16 16"
            >
              <path
                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"
              />
            </svg>
          </div>
          <div class="col-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              class="bi bi-chat-left-dots"
              viewBox="0 0 16 16"
            >
              <path
                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"
              />
              <path
                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"
              />
            </svg>
          </div>
        </div>
      </section>
      <section class="mt-5 p-4 shadow-sm rounded-5 bg-white">
        <div class="row">
          <div class="col text-start">
            <h2>New Post</h2>
          </div>
          <div class="col text-end">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              class="bi bi-bookmark"
              viewBox="0 0 16 16"
            >
              <path
                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"
              />
            </svg>
          </div>
        </div>
        <img
          src="img/gatto 2.jpeg"
          class="rounded mx-auto d-block"
          alt="gatto1"
          style="max-width: 100"
        />
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus
          diam vitae venenatis malesuada. Sed bibendum ante vel congue suscipit.
          Morbi eu mollis lacus. Suspendisse potenti. Sed elementum ante leo, at
          pellentesque nisl vulputate sit amet. Sed tristique gravida felis, eu
          euismod nulla fermentum at. Nam volutpat mollis interdum. Quisque
          tristique commodo egestas. In sapien magna, tempor vitae sollicitudin
          ac, maximus volutpat massa. Integer vestibulum tortor bibendum odio
          consequat, non consectetur dolor varius. Nam nisl neque, ultrices quis
          ultricies vitae, dictum ac tellus. Nulla facilisi.
        </p>

        <div class="row mt-2">
          <div class="col inline text-start">
            <p>@username</p>
          </div>
          <div class="col-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              class="bi bi-heart"
              viewBox="0 0 16 16"
            >
              <path
                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"
              />
            </svg>
          </div>
          <div class="col-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              class="bi bi-chat-left-dots"
              viewBox="0 0 16 16"
            >
              <path
                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"
              />
              <path
                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"
              />
            </svg>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
