<?php
function clean($in){
    $out = htmlspecialchars($in, ENT_QUOTES);
    $out = trim($out);
}
?>
