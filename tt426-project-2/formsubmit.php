<?php
include("includes/init.php");

if (isset($_POST["submit"])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING);
    $releasedate = filter_input(INPUT_POST, "releaseDate", FILTER_SANITIZE_STRING);

    $contEnd = filter_input(INPUT_POST, "contEnd", FILTER_SANITIZE_STRING);
    if (!in_array(strtolower($contEnd), array("continue", "end"))) {
        $contEnd = null;
    }
}
?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php"); ?>

<body>
    <?php include("includes/header.php"); ?>

    <div>
        <h1>Adding to Catalog</h1>

        <h2>Adding
            <?php echo ($name); ?>
        </h2>

        <p>
            <?php
            echo ("<h4>Name: " . $name . "</h4>");
            echo ("<h4>Author: " . $author . "</h4>");
            echo ("<h4>Genre: " . $genre . "</h4>");
            echo ("<h4>Release Date: " . $releasedate . "</h4>");
            echo ("<h4>Continue or End: " . $contEnd . "</h4>");
            ?>
        </p>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>
