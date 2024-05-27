
<?php

require_once ("../db-config.php");

if(isset($_GET['searchTerm']) && $_GET['searchTerm'] != "") {
    $searchTerm = $_GET['searchTerm'];
    $searchResult = $dbh->searchAccountStartingWith($searchTerm);
}
?>


<?php if (!empty($searchResult)): ?>
<!-- Lista di utenti seguiti -->
<ul id="searchResultList" class="list-group">
    <?php foreach ($searchResult as $account): ?>
        <li class="list-group-item d-flex align-items-center">
            <div>
                <img src="img/<?php echo $account['file_name'] ?>" class="rounded-circle me-2" alt="Avatar utente" style="width: 40px; height: 40px;">
                <a class="custom-link" href="open-profile.php?username=<?php echo $account['username'] ?>">@<?php echo $account['username'] ?></a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php else: ?>

<p> No Kitty Lover found &#x1F63F</p>

<?php endif; ?>