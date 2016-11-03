<?php
include "PHP_Engines/grtXmlEngine.php";

$GLOBALS['pageSource'] = "sponsors"; //name of source page, no extensions. Saves a function call in engine

$pageContent = new PageContent();
$navBar = new navBar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | FIRST</title>

    <?php include "modules/std-config.php";?>
</head>
<body onload="navigationInit(<?php echo $navBar->currentIndex; ?>)">
<?php
include "modules/navBar.php";
?>
<div class="wrapper" id="content-wrapper">
    <?php
    $pageContent->generateContent();
    ?>
</div>
<?php
include "modules/footer.php";
?>
</body>
</html>
<?php
//CLEANUP
unset($content);
unset($navBar);
?>
