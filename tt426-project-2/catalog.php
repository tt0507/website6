<?php
 // DO NOT REMOVE!
include("includes/init.php");
// DO NOT REMOVE!

$db = open_sqlite_db("secure/data.sqlite");

function print_database($record)
{
    ?>
<tr>
    <td><?php echo htmlspecialchars($record["manga_name"]); ?></td>
    <td><?php echo htmlspecialchars($record["author"]); ?></td>
    <td><?php echo htmlspecialchars($record["genre"]); ?></td>
    <td><?php echo htmlspecialchars($record["release_date"]); ?></td>
    <td><?php echo htmlspecialchars($record["continue_or_end"]); ?></td>
</tr>
<?php

}

const SEARCH_FIELDS = ["manga_name" => "By name", "author" => "By author", "genre" => "By Genre", "release_date" => "By release date", "continue_or_end" => "Continue or end"];

if (isset($_GET['search']) && isset($_GET['category'])) {
    $configuration = true;

    $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);

    if (in_array($category, array_keys(SEARCH_FIELDS))) {
        $search_field = $category;
    } else {
        array_push($messages, "Invalid category for search.");
        $do_search = false;
    }

    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
    $search = trim($search);
} else {
    $configuration = false;
    $category = null;
    $search = null;
}
?>

<!DOCTYPE html>
<html lang = "en">

<?php include("includes/head.php"); ?>

<body>
    <?php include("includes/header.php"); ?>

    <form class="search_bar" action="catalog.php" method="get">
        <select class="choose" name="category">
            <option value="" selected disabled>Search By</option>
            <?php
            foreach (SEARCH_FIELDS as $field_name => $label) {
                ?>
            <option value="<?php echo $field_name; ?>"><?php echo $label; ?></option>
            <?php

        } ?>
        </select>
        <input type="text" name="search" class="search" />
        <button type="submit">Check</button>
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $name = filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING);
    }

    if ($configuration) { ?>
    <h1>Search Result</h1>
    <?php
    $sql = "SELECT * FROM manga WHERE " . $search_field . " LIKE '%' || :search || '%'";
    $params = array(':search' => $search);
    } else { ?>
        <h1>All Reviews</h1>
        <?php
        $sql = "SELECT * FROM manga";
        $params = array();
    }

    $query = $db->prepare($sql);
    if ($query and $query->execute($params)) {
        $records = $query->fetchAll();
    }

    if ($query) {
        // $records = $query->fetchAll();
        if (count($records) > 0) { ?>
        <table id="table">
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Release Date</th>
                <th>Continue or End</th>
            </tr>
            <?php
            foreach ($records as $record) {
                print_database($record);
            } ?>
        </table>
        <?php
    } else {
        echo "<p>No matching reviews found</p>";
    }
    } ?>

    <p>Information taken from <a href="https://en.wikipedia.org/wiki/List_of_best-selling_manga">List of Best Selling Manga</a></p>
    <!-- Information taken from https://en.wikipedia.org/wiki/List_of_best-selling_manga -->

    <?php include("includes/footer.php"); ?>
</body>

</html>
