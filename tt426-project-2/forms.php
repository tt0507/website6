<?php
 // DO NOT REMOVE!
include("includes/init.php");
// DO NOT REMOVE!

$db = open_sqlite_db("secure/data.sqlite");
$message = array();

if (isset($_POST["submit"])) {
    $valid_review = true;

    $name = filter_input(INPUT_POST, "manga_name", FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING);
    $releasedate = filter_input(INPUT_POST, "releaseDate", FILTER_SANITIZE_STRING);
    $contEnd = filter_input(INPUT_POST, "contEnd", FILTER_SANITIZE_STRING);
    if (!in_array(strtolower($contEnd), array("continue", "end"))) {
        $contEnd = null;
    }

    if ($name == null or $author == null or $genre == null or $releasedate == null or $contEnd == null) {
        $valid_review = false;
    }

    if ($valid_review) {
        $sql = "INSERT INTO manga (manga_name, author, genre, release_date, continue_or_end) VALUES (:manga_name, :author, :genre, :release_date, :continue_or_end);";
        $params = array(
            ':manga_name' => $name, ':author' => $author, ':genre' => $genre, ':release_date' => $releasedate, ':continue_or_end' => $contEnd
        );

        $results = exec_sql_query($db, $sql, $params);
        if ($results) {
            array_push($message, "New Manga has been added");
        } else {
            array_push($message, "Failed to add manga");
        }
    } else {
        array_push($message, "Please fill all fields");
    }
}

function showmessage(){
    global $message;
    foreach ($message as $messages) {
        echo "<p><strong>" . htmlspecialchars($messages) . "</strong></p>\n";
    }
}
?>
<!DOCTYPE html>
<html lang = "en">

<?php include("includes/head.php"); ?>

<body>
    <?php include("includes/header.php"); ?>

    <h1>Add more!</h1>

    <?php
    showmessage();
    ?>

    <form id="form" method="post" action="forms.php" novalidate>
        <fieldset>
            <legend>Form</legend>

            <ul class="align">
                <li class="input">
                    Name of Manga:
                    <input type="text" name="manga_name">
                </li>

                <li class="input">
                    Author:
                    <input type="text" name="author">
                </li>

                <li class="input">
                    Genre:
                    <input type="text" name="genre">
                </li>

                <li class="input">
                    Release Date (Month/Date/Year):
                    <input type="date" name="releaseDate" min="1900-01-01">
                </li>

                <li class="input">
                    Continue or End:
                    <select name="contEnd">
                        <option value="Continue">Continue</option>
                        <option value="End">End</option>
                    </select>
                </li>

            </ul>
            <input id="button" name="submit" type="submit" value="submit">
        </fieldset>
    </form>

    <?php include("includes/footer.php"); ?>
</body>

</html>
