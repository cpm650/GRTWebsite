<?php
//TODO Advanced Debugging to be Impletmented
//TODO Built-in Defaulting
$xmlFile;
$contentInformation;
$dataCount;

$phpErr = false;
set_error_handler("errorCatch");
libxml_use_internal_errors(true);

if(!xmlInit()){ //function will return false on success
    generateHTML();
} else{
    generateXMLErrors();
}


//FUNCTIONS
function xmlInit(){ //TODO DEFAULT TO A GLOBAL PHP VAR FROM SOURCE PAGE
    if(empty($_GET)){
        return true;
    } else{
        $GLOBALS['xmlFile'] = "XMLData/" . htmlspecialchars($_GET["content"]) . ".xml";
        $GLOBALS['contentInformation'] = simplexml_load_file($GLOBALS['xmlFile']);

        if($GLOBALS['contentInformation'] == false){
            return true;
        } else {
            $GLOBALS['dataCount'] = $GLOBALS['contentInformation']->count();
            return false;
        }
    }
}

function generateHTML(){
    for($i = 0; $i < $GLOBALS['dataCount']; $i++){
        echo
        "<div class='subsection'>
            <div class='sectionTitle'>" . $GLOBALS['contentInformation']->section[$i]->SSTitle . "</div>
            <div class='sectionBody'>
                " . $GLOBALS['contentInformation']->section[$i]->SSBody . "
            </div>
        </div>";
    }
}

//TODO improve to send data when enviroment is established
function generateXMLErrors(){
    echo
    "<div class='subsection'>
        <div class='sectionTitle'>Oh no! Something broke! This will get fixed ASAP!</div>
        <div class='sectionBody'>
            ";

            foreach(libxml_get_errors() as $error){
                echo $error->message;
            }

    echo "
        </div>
    </div>";
}

function errorCatch($errNo, $errMsg){
    echo
    "<div class='subsection'>
        <div class='sectionTitle'>Oh no! Something broke! This will get fixed ASAP!</div>
        <div class='sectionBody'>
            Error Level $errNo : $errMsg
        </div>
    </div>";
}
?>
