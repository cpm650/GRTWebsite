<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | DEFAULT</title>
    <link rel="stylesheet" href="CSS/primaryStyle.css" type="text/css" />
</head>
<body>
    <div class="wrapper" id="navigation-wrapper">
        <div class="wrapper" id="navbar">
            <div id="GRTEmblem"><a href="index.php">GRT</a></div>
            <div id="navContainer">
                <ul id="navList">
                    <li><a href="">About</a></li>
                    <li><a href="">First</a></li>
                    <li><a href="">Media</a></li>
                    <li><a href="">Sponsors</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="wrapper" id="subNavbar">
            <ul id="subNavList">
                <li><a href="">About</a></li>
                <li><a href="">First</a></li>
                <li><a href="">Media</a></li>
                <li><a href="">Sponsors</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="wrapepr" id="content-wrapper">
        <?php include "PHP/grtXMLEngine.php";?>
    </div>
    <div class="wrapper" id="footer-wrapper">
        &copy; 2016 Gunn Robotics Team. All Rights Reserved.
        <!-- Eventual Validation Information to be included here -->
    </div>
</body>
</html>
