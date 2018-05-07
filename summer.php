<?php
ob_start();
include "PHP_Engines/grtXmlEngine.php";

$GLOBALS['pageSource'] = "summer"; //name of source page, no extensions. Saves a function call in engine

$pageContent = new PageContent();
$navBar = new navBar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GRT | Summer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> <!--For Bootstrap-->
    <style>
        .error {color: #FF0000;}
        .button-red{
            color: #fff;
            background-color:rgb(170,10,10);
            border-color:rgb(170,10,10);
        }
    </style>
    <?php include "modules/std-config.php";?>
</head>
<body onload="navigationInit(<?php echo $navBar->currentIndex; ?>)">
<?php
include "modules/navBar.php";
?>
<?php
    $error=0;
    $nameerror=$parent_nameerror=$schoolerror=$birthdayerror='';
    $parent_emailerror=$otherschoolerror=$parent_phoneerror='';
    $addresserror=$emergencyerror=$allergyerror=$healtherror='';
    $fooderror=$gradeerror='';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['school'])){
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
        if((empty($_POST['firstname']))||(empty($_POST['lastname']))){
            $nameerror='Required';
            $error=1;
        }
        if((empty($_POST['parent_firstname']))||(empty($_POST['parent_lastname']))){
            $parent_nameerror='Required';
            $error=1;
        }
        if(empty($_POST['birthday'])){
            $birthday_error='required';
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
          return $data;
        }
        if($error==0){
            $firstname=test_input($_POST['firstname']);
            $lastname=test_input($_POST['lastname']);
            if($_POST['school']!='other') {$school=$_POST['school'];}
            else {$school=test_input($_POST['other_school']);}
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
            $fileout=fopen('./summer_data.csv','a') or die('Cannot open file');
            fwrite($fileout,'\n'.$firstname.','.$lastname.','.$_POST['birthday'].',');
            fwrite($fileout,$school.','.$parent_firstname.','.$parent_lastname.',');
            fwrite($fileout,$parent_email.','.$parent_phone.','.$address.',');
            fwrite($fileout,$emergency.','.$_POST['vegetarian'].','.$allergy.',');
            fwrite($fileout,$food.','.$health.','.$_POST['grade'].','.$comment.';');
            fclose($fileout);
            //ob_end_clean();
        }
    }
?>
<div class="wrapper" id="content-wrapper">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class='wrapper subsection-wrapper' style='background-color:rgb(255,255,255)'>
    <div class='subsection'>
        <div class='sectionTitle'>Your information</div>  
        <div class='sectionBody'>
        First name:<input type="text" name="firstname"><br>
        Last name:<input type="text" name="lastname"><br>
        <span class='error'><?php echo $nameerror;?></span><br>
        Birthday:<input type="date" name="birthday"><br>
        Which school will you be going to next semester?
        <span class="error"><?php echo $schoolerror;?></span><br>
        <input type="radio" name="school" value="terman">Terman Middle School<br>
        <input type="radio" name="school" value="jls">JLS Middle School<br>
        <input type="radio" name="school" value='other'>Other<br>
        If other, please specify:<br>
        <input type="text" name="other_school"><br>
        <span class="error"><?php echo $otherschoolerror?></span>
        <br>
        Which grade will you be in?<br>
        <select name='grade'>
            <option value='select'>Select</option>
            <option value='pre'>Preschool</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='mid'>&gt;6</option>
        </select>
        <br>
        <span class='error'><?php echo $gradeerror;?></span><br>
        Are you vegetarian?<br>
        <input type='radio' name='vegetarian' value='no' checked>No<br>
        <input type='radio' name='vegetarian' value='yes' checked>Yes<br>
        Anything else we should know?<br>
        <textarea name="comment" rows="5" cols="40"></textarea><br>
        </div>
    </div>
    </div>
    <div class='wrapper subsection-wrapper' style='background-color:rgb(255,255,255)'>
    <div class='subsection'>
        <div class='sectionTitle'>Contact information</div>
        <div class='sectionBody'>
        First name:<input type="text" name="parent_firstname"><br>
        Last name:<input type="text" name="parent_lastname"><br>
        <span class='error'><?php echo $parent_nameerror;?></span><br>
        Parent's email:<input type="text" name="parent_email">
        <span class='error'><?php echo $parent_emailerror;?></span><br>
        Parent's phone number:<input type="text" name="parent_phone">
        <span class='error'><?php echo $parent_phoneerror;?></span><br><br>
        Home address:<span class='error'><?php echo $addresserror;?></span><br>
        <input type="text" name="address"><br>
        Emergency contact number<span class='error'><?php echo $emergencyerror;?></span><br>
        <input type="text" name="emergency"><br>
        </div>
    </div>
    </div>
    <div class='wrapper subsection-wrapper' style='background-color:rgb(255,255,255)'>
    <div class='subsection'>
        <div class='sectionTitle'>Safety</div>
        <div class='sectionBody'>
        Are you allergic to anything?<br>
        <input type="radio" name="allergy" value="no" checked>No<br>
        <input type="radio" name="allergy" value="yes">Yes<br>
        If yes, what allergies do you have?<br>
        <input type="text" name="yes_allergy"><br>
        <span class='error'><?php echo $allergyerror;?></span><br>
        Do you have any food restrictions?<br>
        <input type="radio" name="food" value='no' checked>No<br>
        <input type="radio" name="food" value='yes'>Yes<br>
        If yes, what food restrictions do you have?<br>
        <input type="text" name="yes_food"><br>
        <span class='error'><?php echo $fooderror;?></span><br>
        Do you have any health conditions? <br>
        <input type="radio" name="health" value='no' checked>No<br>
        <input type="radio" name="health" value='yes'>Yes<br>
        If yes, what health conditions do you have?<br>
        <input type="text" name="yes_health"><br>
        <span class='error'><?php echo $healtherror;?></span><br>
        </div>
    <button class='btn button-red btn-lg btn-block' type='submit'>&gt;&gt;Let's go!&lt;&lt;</button>
    </div>
    </div>
    <!--<input type="submit" value="submit" name="submit">-->
    </form>
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
