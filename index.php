<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | Home</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:500,700|Open+Sans:400,300' rel='stylesheet' type='text/css'>
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
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
    }

    div.bgImage{
        height: 100%; /*Change this to height of background when applicable*/
        background-size: 100%;
        background-position: 50%;
        overflow: hidden;
    }

    div#topImage{
        background-image: url('imageAssets/home-image.jpg');
    }

    div#bottomImage{
        background-image: url('imageAssets/stock.jpg');
    }

    ul#navList li a:hover {
        background-color: rgba(0, 0, 0, .5); /*Default*/
    }

    div#bodyContainer{
        position: absolute;
        top: -.1px;
        height: 100%;
        background-size: 100%;
        background-color: rgba(0, 0, 0, 0.25);
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
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
    }

    a#focusButton{
        display: block;
        width: 290px;
        text-transform: uppercase;
        background-color: rgb(255, 255, 255);
        color: rgba(0,0,0,1);
        text-decoration: none;
        margin: 40px auto 0px;
        padding: 20px;
        border-radius: 10px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
    }

    a#focusButton:hover{
        background-color: rgb(210, 210, 210);
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

    <script type="text/javascript" src="JS/homeScroll.js"></script>
</head>
<body onload="initImgScroll()">
    <div class="bgImage wrapper" id="bottomImage">
        <div class="bgImage wrapper" id="topImage">
        </div>
    </div>
    <div class="wrapper" id="homeNav">
        <div id="GRTEmblem"><a href="index.php"><img src="imageAssets/logo.svg" alt="GRT Logo"></a></div>
        <div id="navContainer">
            <ul id="navList">
                <li><a href="about.php">About</a></li>
                <li><a href="first.php">First</a></li>
                <li><a href="media.php">Media</a></li>
                <li><a href="resources.php">Resources</a></li>
                <li><a href="sponsors.php">Sponsors</a></li>
                <li><a href="joining.php">Joining</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="wrapper" id="bodyContainer">
        <div class="wrapper" id="homeFocus">
            <span id="homeHeader">GRT 192</span><br />
            We're a robotics team from Gunn High School (Palo Alto, CA) that competes in the FIRST Robotics Competitions as Team 192.
            <a id="focusButton" href="">See what we do</a>
        </div>
        <div class="wrapper social-media" id="footer">
            <a href="https://www.facebook.com/GRT192">
                <img alt="Like us on Facebook" src="imageAssets/FB-f-Logo__white_50.png"/>
            </a>
            <a href="https://twitter.com/GRT192">
                <img alt="Follow us on Twitter" src="imageAssets/TwitterLogo_white.png"/>
            </a>
            <a href="https://www.youtube.com/user/gunnrobotics192">
                <img alt="Subscribe to us on Youtube" src="imageAssets/YouTube_light_color_icon.png"/>
            </a>
        </div>
    </div>
</body>
</html>
