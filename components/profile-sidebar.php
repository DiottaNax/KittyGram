
<div class="container d-flex justify-content-center mt-5 py-5">
    <img src="./img/<?php echo $accountResult['pic']; ?>" class="rounded-circle"
        alt="profile-pic" width="150" height="150" />
    <ul>
        <li class="list-group-item">
            <h2><?php echo $accountResult['first_name'] . " " . $accountResult['last_name']; ?></h2>
        </li>
        <li class="list-group-item">
            <h4>@<?php echo $accountResult['username'] ?></h4>
        </li>

        <li class="list-group-item">
        <!-- Put follow buttton if username is different from session username, modify profile otherwise -->
            <?php if ($accountResult['username'] == $_SESSION['username']): ?>
                <button type="button" class="btn btn-light mt-4 opacity-100" onclick="document.location.href='userSettings.php?username=<?php echo urlencode($_SESSION['username']); ?>'">
                    Edit Profile
                </button>
            <?php else: ?>
                <button id="followButton" type="button" class="btn btn-light mt-4 opacity-100" onclick="toggleFollow()">
                    Following
                </button>
            <?php endif; ?>
        </li>
    </ul>
</div>