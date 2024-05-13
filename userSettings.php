<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/astro_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/Navbar.js"></script>

    <title>User's Settings</title>
  </head>

  <body>
    <!-- Includi jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Includi il tuo file JavaScript separato -->
    <script src="js/UserSettings.js"></script>
    <!-- Inclusione della navbar -->
    <div id="navbarContainer"></div>

    
    <div class="card mw-75 m-3 p-5 border-1 mt-5">
    <h1 class="text-center">Modifica Profilo</h1>
    
    <form class="text-left align-items-center py-5" action="**your_script.php**" method="post">
        <div class="mb-4">
            <label for="formFile" class="form-label">Profile Picture</label>
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="/img/User_ProfilePic.PNG" id="previewImage" class="rounded-circle" alt="profile-pic" width="50" height="50">
                </div>
                <div class="col">
                    <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                </div>
            </div>
        </div>
        
        <div class="mb-3">  
            <label for="username" class="form-label text-start">Username</label>
            <input type="username" class="form-control" placeholder="@astrobaleno" id="username" name="username">
        </div>
        <div class="mb-3">  
            <label for="bio" class="form-label">Bio</label>
            <input type="bio" class="form-control" placeholder="Type your new Bio" id="bio" name="bio">
        </div>
        <div class="mb-3">  
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="Type your new Email" id="email" name="email">
        </div>
        <div class="mb-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Type your new Password">
        </div>
        <div class="mb-3 justify-content-center">
            <button type="button" class="btn btn-bd-primary w-100" style="background-color: #493400; color: white;" onclick="window.location.href='UserProfile.html'">Save Changes</button>
        </div>
    </form>
    </div>

    

  </body>