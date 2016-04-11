<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | Home</title>
    <link rel="stylesheet" href="CSS/primaryStyle.css" type="text/css" />

    <!--HOMEPAGE SPECIFIC CSS TO IMPROVE PERFORMANCE-->
    <!-- TO BE MOVED EXTERNALLY -->
    <style type="text/css">
    div#homeNav{
        position: absolute;
        top: 0px;
        z-index: 10;
        height: 60px;
        border-style: none;
        text-align: left;
        color: rgba(255, 255, 255, 1);
    }

    div#homeBody{
        height: 100%; /*Change this to height of background when applicable*/
        background-image: url('imageAssets/stock.jpg');
        background-size: 100%;
        overflow: hidden;
    }

    ul#navList li a:hover {
        background-color: rgb(0, 0, 0); /*Default*/
    }

    div#imageFilter{
        height: 100%;
        background-color: rgba(0, 0, 0, .4);
    }

    div#homeFocus{
        top: 50%;
        transform: translateY(-50%);
        width: 60%;
        margin: 0px auto;
        color: rgba(255, 255, 255, 1);
        font-size: 25px;
        text-align: center;

    }

    span#homeHeader{
        display: block;
        font-size: 50px;
    }

    a#focusButton{
        display: block;
        width: 30%;
        text-transform: uppercase;
        background-color: rgb(255, 255, 255);
        color: rgba(0,0,0,1);
        text-decoration: none;
        margin: 40px auto 0px;
        padding: 20px;
        border-radius: 40px;
    }

    a#focusButton:hover{
        background-color: rgb(220, 220, 220);
    }

    div#footer{
        position: absolute;
        text-align: center;
        padding: 20px 0px;
        margin: 0px;
        bottom: -.5px;
        background-color: rgba(0, 0, 0, 1);
        color: #fff; /*Temporary*/
    }
    </style>
</head>
<body>
    <div class="wrapper" id="homeBody">
        <div class="wrapper" id="homeNav">
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
        <div class="wrapper" id="imageFilter">
            <div class="wrapper" id="homeFocus">
                <span id="homeHeader">GRT 192</span><br />
                We're a robotics team from Gunn High School (Palo Alto, CA) that competes in the FIRST Robotics Competitions as Team 192.
                <a id="focusButton" href="">See what we do</a>
            </div>
            <div class="wrapper social-media" id="footer">
                <img alt="Like us on Facebook" src="imageAssets/FB-f-Logo__white_50.png"/>
                <img alt="Follow us on Twitter" src="imageAssets/TwitterLogo_white.png"/>
            </div>
        </div>
    </div>
</body>
</html>
