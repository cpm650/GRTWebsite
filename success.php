<?php
include "PHP_Engines/grtXmlEngine.php";

$GLOBALS['pageSource'] = "summer"; //name of source page, no extensions. Saves a function call in engine

#$pageContent = new PageContent();
$navBar = new navBar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | Summer</title>
    <?php include "modules/std-config.php";?>
</head>
<body onload="navigationInit(<?php echo $navBar->currentIndex; ?>)">
<?php
include "modules/navBar.php";
?>
<div class="wrapper" id="content-wrapper">
<h2>Success!<h2>
</div>
</body>
</html>
