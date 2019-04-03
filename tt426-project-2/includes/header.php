<header>
    <h1 class = "title">
        <?php title() ?>
    </h1>

    <nav>
        <ul class = "nav">
            <?php
            foreach ($pages as $elements) {
                $file = $elements[0];
                $pagename = $elements[1];

                echo '<li><a href="' . $file . '">' . $pagename . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
