<?php
 // DO NOT REMOVE!
include("includes/init.php");
// DO NOT REMOVE!
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
    <?php include("includes/header.php"); ?>

    <div class="indexText">
        <h1>Welcome to the Manga Catalog</h1>
        <p class = "font_bigger">Find or add to the catalog as you wish</p>
    </div>


    <div class="row">
        <div class="leftRight">
            <figure>
                <img alt="One Piece" src="images/onepiece.jpg">
                <figcaption>Photo taken from <a href="https://www.ebookjapan.jp/ebj/132082/volume1/">eBook Japan</a></figcaption>
                <!-- Image taken from  https://www.ebookjapan.jp/ebj/132082/volume1/-->
            </figure>
        </div>

        <div class="middle">
            <figure>
                <img alt="Naruto" src="images/naruto.jpg">
                <figcaption>Photo taken from <a href="https://www.ebookjapan.jp/ebj/132083/">eBook Japan</a></figcaption>
                <!-- Image taken from  https://www.ebookjapan.jp/ebj/132082/volume1/-->
            </figure>
        </div>

        <div class="leftRight">
            <figure>
                <img alt="Dragon Ball" src="images/dragonball.jpg">
                <figcaption>Photo taken from <a href="https://www.ebookjapan.jp/ebj/134323/">eBook Japan</a></figcaption>
                <!-- Image taken from https://www.ebookjapan.jp/ebj/132082/volume1/ -->
            </figure>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>
