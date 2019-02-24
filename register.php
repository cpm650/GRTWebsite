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
    <style>
        .error {color: #FF0000;}
        .success{color:rgb(170,10,10);text-align:center;}
        .center{text-align:center;}
    </style>
    <?php include "modules/std-config.php";?>
    <link rel='stylesheet' href='CSS/bootstrap-iso.css'>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
</head>
<body onload="navigationInit(<?php echo $navBar->currentIndex; ?>)">
<?php
include "modules/navBar.php";
?>
<?php
    $error=0;
    $nameerror=$parent_nameerror=$schoolerror=$birthday_error='';
    $parent_emailerror=$otherschoolerror=$parent_phoneerror='';
    $addresserror=$emergencyerror=$allergyerror=$healtherror='';
    $fooderror=$gradeerror=$hidden=$othergradeerror='';
    $success='<h1 class="success">Register for GRT summer camp 2019!</h1><br><br>';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['school']=='select'){
            $schoolerror='Required';
            $error=1;
        }
        elseif(($_POST['school']=='other')&&(empty($_POST['other_school']))){
            $otherschoolerror='Which school will you be going to?';
            $error=1;
        }
        if($_POST['grade']=='select'){
            $gradeerror='Please select your grade level';
            $error=1;
        }
        if(($_POST['grade']=='other')&&(empty($_POST['other_grade']))){
            $othergradeerror='Which grade will you be in?';
            $error=1;
        }
        if((empty($_POST['firstname']))||(empty($_POST['lastname']))){
            $nameerror='Required';
            $error=1;
        }
        if((empty($_POST['parent_firstname']))||(empty($_POST['parent_lastname']))){
            $parent_nameerror='Required';
            $error=1;
        }
        if(empty($_POST['birthday'])){
            $birthday_error='Required';
            $error=1;
        }
        if(empty($_POST['parent_email'])){
            $parent_emailerror='Required';
            $error=1;
        }
        if(empty($_POST['parent_phone'])){
            $parent_phoneerror='Required';
            $error=1;
        }
        if(empty($_POST['address'])){
            $addresserror='Required';
            $error=1;
        }
        if(empty($_POST['emergency'])){
            $emergencyerror='Required';
            $error=1;
        }
        if(($_POST['allergy']=='yes')&&(empty($_POST['yes_allergy']))){
            $allergyerror='Please enter what allergies you have';
            $error=1;
        }
        if(($_POST['health']=='yes')&&(empty($_POST['yes_health']))){
            $healtherror='Please enter what health conditions you have';
            $error=1;
        }
        if(($_POST['food']=='yes')&&(empty($_POST['yes_food']))){
            $fooderror='Please enter what food restrictions you have';
            $error=1;
        }
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          $data=str_replace(',','.',$data);
          $data=str_replace(';','.',$data);
          return $data;
        }
        if($error==0){
            $firstname=test_input($_POST['firstname']);
            $lastname=test_input($_POST['lastname']);
            if($_POST['school']!='other') {$school=test_input($_POST['school']);}
            else {$school=test_input($_POST['other_school']);}
            if($_POST['grade']!='other') {$grade=test_input($_POST['grade']);}
            else {$grade=test_input($_POST['other_grade']);}
            $parent_firstname=test_input($_POST['parent_firstname']);
            $parent_lastname=test_input($_POST['parent_lastname']);
            $parent_email=test_input($_POST['parent_email']);
            $parent_phone=test_input($_POST['parent_phone']);
            $address=test_input($_POST['address']);
            $emergency=test_input($_POST['emergency']);
            if($_POST['allergy']=='no') {$allergy='no';}
            else {$allergy=test_input($_POST['yes_allergy']);}
            if($_POST['food']=='no') {$food='no';}
            else {$food=test_input($_POST['yes_food']);}
            if($_POST['health']=='no') {$health='no';}
            else {$health=test_input($_POST['yes_health']);}
            $comment=test_input($_POST['comment']);
            $fileout=fopen('../../summer_data.csv','a') or die('Cannot open file');
            fwrite($fileout,"\n".$firstname.','.$lastname.','.$_POST['birthday'].',');
            fwrite($fileout,$school.','.$parent_firstname.','.$parent_lastname.',');
            fwrite($fileout,$parent_email.','.$parent_phone.','.$address.',');
            fwrite($fileout,$emergency.','.$_POST['vegetarian'].','.$allergy.',');
            fwrite($fileout,$food.','.$health.','.$grade.','.$comment.','.date("Y-m-d H:i:s", time()).';');
            fclose($fileout);
            $success='<h1 class="success">Get Excited!</h1><div class="wrapper subsection-wrapper" style="background-color:rgb(255,255,255)"><div class="subsection"><div class="sectionBody"><div class="bold center">You are now registered for the 2019 GRT summer camp!<br>An email will be sent to your parent&#39;s email address soon.</div><br>';
            $success=$success.'<div class="success bold">This summer camp is a fundraiser for the Gunn HS Robotics Team.<br>A donation of $350 is recommended to cover material costs and snacks.<br>To donate, mail a check addressed to &#34;GRT Booster&#34; to<br>Gunn Robotics Team, 780 Arastradero Road, Palo Alto, CA 94306.<br><br>Please contact us at <a href="mailto:gunnrobotics192@gmail.com">gunnrobotics192@gmail.com</a> for scholarship information or questions.</div><img src="imageAssets/summer/success.jpg"></div></div></div>';
            /*$success='<h1 class="success">You&#39;ve been registered!</h1><div class="wrapper subsection-wrapper" style="background-color:rgb(255,255,255)"><div class="subsection"><div class="sectionBody"><div class="bold center">You are now on the waitlist for the 2019 GRT summer camp!<br>An email will be sent to your parent&#39;s email address soon.<br>We will notify you if additional positions become available.</div><br></div><img src="imageAssets/summer/IMG_2449.JPG"></div></div>';*/
            $hidden='hidden';
        }
    }
?>
<div class="wrapper bootstrap-iso" id="content-wrapper">
    <?php echo $success;?>
    <div <?php echo $hidden;?>>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class='wrapper subsection-wrapper' style='background-color:rgb(255,255,255)'>
    <div class='formsubsection'>
        <!--<span class='title bold'>Unfortunately, the registration for the 2018 summer camp had already ended.</span>
        <br>-->
        <div class='sectionTitle'>Camper information</div>  
        <div class='formBody'>
        <div class='form-column'>
        First name:<br><input type="text" style='width:70%' class='form-control' name="firstname">
        Last name:<br><input type="text" style='width:70%' class='form-control' name="lastname">
        <span class='error'><?php echo $nameerror;?></span><br>
        Birthday:<br><input type="date" name="birthday" style='width:70%' class='form-control'>
        <span class='error'><?php echo $birthday_error;?></span><br>
        Which school will you be going to next semester?<br>
        <select name='school' style='width:70%' class='form-control'>
            <option value='select'>Select</option>
            <option value='fletcher'>Fletcher Middle School</option>
            <option value='jls'>JLS Middle School</option>
            <option value='addison'>Addison Elementary</option>
            <option value='barron park'>Barron Park Elementary</option>
            <option value='duveneck'>Duveneck Elementary</option>
            <option value='el carmelo'>El Carmelo Elementary</option>
            <option value='escondido'>Escondido Elementary</option>
            <option value='fairmeadow'>Fairmeadow Elementary</option>
            <option value='hoover'>Herbert Hoover Elementary</option>
            <option value='juana briones'>Juana Briones Elementary</option>
            <option value='nixon'>Lucille M. Nixon Elementary</option>
            <option value='ohlone'>Ohlone Elementary</option>
            <option value='palo verde'>Palo Verde Elementary</option>
            <option value='walter hays'>Walter Hays Elementary</option>
            <option value='other'>Other</option>
        </select><span class="error"><?php echo $schoolerror;?></span>
        If other, please specify:<br>
        <input type="text" name="other_school" style='width:70%' class='form-control'>
        <span class="error"><?php echo $otherschoolerror?></span>
        </div>
        <div class='form-column'>
        Which grade will you be in next semester?<br>
        <select name='grade' style='width:25%' class='form-control'>
            <option value='select'>Select</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='other'>Other</option>
            <!--<option value='mid'>&gt;8</option>-->
        </select>
        If other, please specify:<br>
        <input type="text" name="other_grade" style='width:70%' class='form-control'>
        <span class="error"><?php echo $othergradeerror;?></span>
        <span class='error'><?php echo $gradeerror;?></span><br>
        Are you vegetarian?<br>
        <input type='radio' name='vegetarian' value='no' checked>No<br>
        <input type='radio' name='vegetarian' value='yes'>Yes<br>
        Anything else we should know?<br>
        <textarea name="comment" class="form-control" rows="5"></textarea><br>
        </div>
        </div>
    </div>
    </div>
    <div class='wrapper subsection-wrapper' style='background-color:rgb(255,255,255)'>
    <div class='formsubsection'>
        <div class='sectionTitle'>Emergency contact &amp; Safety</div>
        <div class='formBody'>
        <div class='form-column'>
        Parent's first name:<br><input type="text" style='width:70%' class='form-control' name="parent_firstname">
        Parent's last name:<br><input type="text" style='width:70%' class='form-control' name="parent_lastname">
        <span class='error'><?php echo $parent_nameerror;?></span><br>
        Parent's email:<br><input type="text" style='width:70%' class='form-control' name="parent_email">
        <span class='error'><?php echo $parent_emailerror;?></span><br>
        Parent's phone number:<br><input type="text" style='width:70%' class='form-control' name="parent_phone">
        <span class='error'><?php echo $parent_phoneerror;?></span><br>
        Home address:<br>
        <input type="text" style='width:70%' class='form-control' name="address">
        <span class='error'><?php echo $addresserror;?></span><br>
        Emergency contact number<br>
        <input type="text" style='width:70%' class='form-control' name="emergency">
        <span class='error'><?php echo $emergencyerror;?></span><br>
        </div>
        <div class='form-column'>
        Are you allergic to anything?<br>
        <input type="radio" name="allergy" value="no" checked>No<br>
        <input type="radio"  name="allergy" value="yes">Yes<br>
        If yes, what allergies do you have?<br>
        <input type="text" style='width:70%' class='form-control' name="yes_allergy">
        <span class='error'><?php echo $allergyerror;?></span><br>
        Do you have any food restrictions?<br>
        <input type="radio" name="food" value='no' checked>No<br>
        <input type="radio" name="food" value='yes'>Yes<br>
        If yes, what food restrictions do you have?<br>
        <input type="text" style='width:70%' class='form-control' name="yes_food">
        <span class='error'><?php echo $fooderror;?></span><br>
        Do you have any health conditions? <br>
        <input type="radio" name="health" value='no' checked>No<br>
        <input type="radio" name="health" value='yes'>Yes<br>
        If yes, what health conditions do you have?<br>
        <input type="text" style='width:70%' class='form-control' name="yes_health">
        <span class='error'><?php echo $healtherror;?></span><br>
        </div>
        </div>
    <br><br><button class='btn btn-lg btn-block button-red' type='submit'>&gt;&gt;Let's go!&lt;&lt;</button>
    </div>
    </div>
    <!--<input type="submit" value="submit" name="submit">-->
    </form>
    </div>
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
