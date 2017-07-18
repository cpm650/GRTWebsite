<div class="wrapper" id="navigation-wrapper" onmouseleave="changeSubNav(<?php echo $navBar->currentIndex; ?>)">
    <div class="wrapper" id="navbar">
        <div id="GRTEmblem"><a href="index.a"><img src="imageAssets/logo.svg" alt="GRT Logo"></a></div>
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
