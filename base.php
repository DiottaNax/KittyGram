<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Includo il css esterno -->
  <link rel="stylesheet" href="./css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="./js/notification-viewed.js"></script>

  <title>Home Page</title>
</head>

<body class="d-flex justify-content-center py-4">


  <div class="row justify-content-center">
    <div class="col-lg mt-2">
      <header class="d-flex px-4 mt-5">
        <main class="container">
          <?php require ($templateParams["name"]); ?>
        </main>
      </header>
    </div>
  </div>


  <?php require_once ("./components/navbar.php") ?>

</body>

</html>