<?php

require_once ("../db-config.php");

if (isset($_GET['searchTerm']) && $_GET['searchTerm'] != "") {
    $searchTerm = $_GET['searchTerm'];
    $searchResult = $dbh->searchCityStartingWith($searchTerm);
}
?>

<?php if (!empty($searchResult)): ?>
        <?php foreach ($searchResult as $city): ?>
            <option value="<?php echo $city['city_name'] ?>"> <?php echo $city['city_name'] ?> </option>option>
        <?php endforeach; ?>
<?php else: ?>

<?php endif; ?>
