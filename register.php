<?php
//exec('python ./register.py '.escapeshallarg($name))
echo('Hey!<br>');
echo($_POST['school'].'<br>');
list($year,$month,$day)=split('-',$_POST['birthday']);
echo($year.'<br>'.$month.'<br>'.$day.'<br>');
echo($_POST['grade']);
//Put into file
$fileout=fopen('./summer_data.csv','a') or die('Cannot open file');
fwrite($fileout,'Hey!');
fclose($fileout);
?>
