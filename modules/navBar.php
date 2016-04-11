<div class="wrapper" id="navigation-wrapper" onmouseout="changeSubNav(<?php echo $navBar->currentIndex; ?>)">
    <div class="wrapper" id="navbar">
        <div id="GRTEmblem"><a href="index.php">GRT</a></div>
        <div id="navContainer">
            <ul id="navList">
                <?php
                $navBar->generateNavBar();
                ?>
            </ul>
        </div>
    </div>
    <?php
    $navBar->generateSubNavBars();
    ?>
</div>
