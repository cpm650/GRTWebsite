<?php
include "PHP/grtXMLEngine.php";

$pageSource = "default"; //name of source page, no extensions. Saves a function callin engine

$pageContent = new PageContent();
$navBar = new navBar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | DEFAULT</title>

    <link rel="stylesheet" href="CSS/primaryStyle.css" type="text/css" />
    <script type="text/javascript" src="JS/navBarResponse.js"></script>
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
