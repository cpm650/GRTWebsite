<?php
//TODO INCLUDE GLOBAL VAR ABOUT DEFAULT XML SOURCE/XML PATH
include "PHP/grtXMLEngine.php";
$content = new Content();
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
        $content->generateContent();
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
