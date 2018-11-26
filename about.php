<?php
include "PHP_Engines/grtXmlEngine.php";

$GLOBALS['pageSource'] = "about"; //name of source page, no extensions. Saves a function call in engine

$pageContent = new PageContent();
$navBar = new navBar();
?>
<!DOCTYPE html>
<html lang="en">
<!--Edit notes at bottom-->
<head>
    <meta charset="utf-8" />
    <title>GRT | FIRST</title>

    <?php include "modules/std-config.php";?>
    <!--Page specific CSS-->
    <style type="text/css">
    .subsection-wide{
        width: 90%;
        padding: 0px;
        margin: 0px auto;
        position: relative;
        overflow: hidden;
        /*This is crazy. When overflow is set to visible, the page becomes all messed up. Not sure why.*/
    }
    .split-section-left{
        height:100%;
        width:50%;
        float:left;
        font-size:14px;
    }
    .split-section-left p{
        margin: 20px 30px 30px 0px;
    }
    .split-section-right p{
        margin: 20px 0px 20px 30px;
    }
    .split-section-right{
        height:100%;
        width:50%;
        float:right;
        font-size:14px;
    }
    </style>

</head>
<body onload="navigationInit(<?php echo $navBar->currentIndex; ?>)">
    <?php
    include "modules/navBar.php";
    ?>
    <div class="wrapper" id="content-wrapper">
    <div class='wrapper subsection-wrapper' style='background-color:rgb(255, 255, 255);'>
    <div class="subsection-wide">
    <div class="sectionTitle">ABOUT US</div>
    <div class="sectionBody">
     
    <div class="split-section-left">
    <p>The Gunn Robotics Team (GRT) is a student-managed team that competes in the FIRST Robotics competition. We CAD our own designs, write our own software, and wire our own robots; we manage our sponsorships, organize and staff outreach events. Being on the Gunn Robotics Team gives every student the opportunity to make real decisions, learn from the results, and produce something amazing in the process.</p>
    <p>All GRT students learn how to CAD and work in the shop, and develop additional expertise working in small groups focused on skills such as programming, welding, gearbox design, pneumatics, and more. We stay connected with our community, building projects for local schools and community events. We have been fortunate to work with generous sponsors, who assist us with resources and training.</p>
    </div>
    <div class="split-section-right">
    <img src="imageAssets/subgroups/aboutLead.jpg" alt="Working as a team">
    </div>
    
<!--            <p>The Gunn Robotics Team (GRT) is a student-managed team that designs, builds and enters a robot in several FIRST Robotics competitions each year.  A major part of our team identity is our student ownership.  Every aspect of the team that can be executed or managed by a student, is:  leadership, organization and planning, gearbox and mechanism design; prototyping and computer simulations; fabrication using milling machines, lathes, CNC, welding and more; coding and animation; fund-raising; outreach.  Our students do it all.  We CAD our own designs, write our own software, and wire our own robots; we manage our sponsorships, organize and staff outreach events.  Being on the Gunn Robotics Team gives every student the opportunity to make real decisions, learn from the results, and produce something amazing in the process.</p>-->
    </div>
    </div>
    <br><br><br>
    <div class="subsection-wide">
    <div class="sectionTitle">
    OUR HISTORY
    </div>
    <ul class="timeline-parent" style="list-style:none">
        <li class="timeline-child">
        <p>GRT was founded In 1996 by Bill Dunbar, a mechanical engineer turned physics teacher at Henry M. Gunn High School in Palo Alto, CA. The team took over the campus wood and metal shop, at the time abandoned and slated for demolition.</p>
        </li>
        <li class="timeline-child">
        <p>The Gunn robotics team entered the FIRST Robotics competition In 1997, and that summer traveled to the National Championships In Orlando, Florida.</p>
        </li>
        <li class="timeline-child">
        <p>GRT has grown into a popular program at Henry M. Gunn HS, with two full classes meeting throughout the school year, plus regular after-hour and weekend shop sessions.</p>
        </li>
    </ul>
    <img src="imageAssets/about/about_timeline.png">
    </div>
    <!--End of subsection is the above tab-->
    <br><br>
    <div class="subsection-wide">
        <div class="sectionTitle">
            SPONSORS
        </div>
    <ul class="timeline-parent" style="list-style:none">
        <li class="sponsor-child">
        <a href="https://www.bosch.us/">
        <img alt="Bosch logo" src="imageAssets/team/bosch_logo.png"/><br>
        </a>
        <p>Most of the GRT mentors come from <a href="https://www.bosch.us/">Bosch</a>, a leading multinational engineering corporation. Bosch has graciously donated many contributions to GRT, and are currently the teams largest sponsor and biggest outreach of mentors.</p>
        </li>
        <li class="sponsor-child">
        <a href="http://www.madcogases.com/">
        <img alt="Madco logo" src="imageAssets/team/madco.png"/><br>
        </a>
        <p> <a href="http://www.madcogases.com/">Madco</a> is our local welding and gas supplier, and, as a sponsor of GRT, donates cylinders of gas required for welding. </p>
        </li>
        <li class="sponsor-child" style="border-right-style:solid;">
        <a href="https://papie.org/">
        <img alt="PiE logo" src="imageAssets/team/pie_logo.png"/><br>
        </a>
        <p> <a href="https://papie.org/">PiE</a> is a non-profit education foundation dedicated to supporting all Palo Alto public schools. PAUSD generously provides funds for mentors.</p>
        </li>
    <ul>
    </div>
    <!--End of subsection is the above tab-->
    </div>
    </div>
    <?php
    include "modules/footer.php";
    ?>
</body>
<!--
This new version of the about page displaces the old about pages.
The old about php had been renamed about_archive.php
The old one had these tabs:
<page>Team</page>
<page>Leadership</page>
<page>Outreach</page>
<page>Awards</page>
<page>Contact</page>
Team: to be merged into this about page
Outreach: same
Awards: moved to FIRST section
Contact: moved to footer
-->
</html>
<?php
//CLEANUP
unset($content);
unset($navBar);
?>
