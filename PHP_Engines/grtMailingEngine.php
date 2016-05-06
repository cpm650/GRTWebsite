<?php
function clean($in){
        $out = htmlspecialchars(stripslashes(trim($in)), ENT_QUOTES);
        return $out;
}
?>
