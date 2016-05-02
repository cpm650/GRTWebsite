<?php
//TODO Advanced Debugging to be Impletmented
//TODO Built-in Defaulting

set_error_handler("errorCatcher");
libxml_use_internal_errors(true);

//HTML GENERATION FROM XML USING OOP
class XMLDoc {
    protected $data;
    protected $error = false;
    protected $dataCount = 0;

    function XMLDoc($src){
        $xmlFile = "XMLData/" . $src . ".xml";
        $this->data = simplexml_load_file($xmlFile);

        if($this->data == false){
            $this->error = true;
        } else {
            $this->dataCount = $this->data->count();
        }
    }
}

class NavBar extends XMLDoc {
    public $currentIndex = 0;

    function navBar(){
        XMLDoc::XMLDoc("navBar");

        if($this->error == false){
            for($i = 0; $i < $this->dataCount; $i++){
                if(stripos($GLOBALS['pageSource'], (string)$this->data->category[$i]->title) !== false){
                    $this->currentIndex = $i;
                    break;
                }
            }

        }
    }

    function generateNavBar(){
        if($this->error == false){ //function will return true on success
            $this->navBar_generate();
        } else{
            generateXMLErrors();
        }
    }

    function generateSubNavBars(){
        if($this->error == false){ //function will return true on success
            $this->subNavBars_generate();
        } else{
            generateXMLErrors();
        }
    }

    private function navBar_generate(){
        for($i = 0; $i < $this->dataCount; $i++){
            echo
            "
            <li><a onmouseover='changeSubNav(" . $i . ")' href='" . formatString($this->data->category[$i]->title) . ".php'>" . $this->data->category[$i]->title . "<span class='pointer'> <img src='imageAssets/icons/triangle-black.svg' /> </span></a></li>
            ";
        }
    }

    private function subNavBars_generate(){
        for($a = 0; $a < $this->dataCount; $a++){ //each subbar
            $subPages = $this->data->category[$a]->subNavBar->page;

            if($subPages->count() == 0){
                echo "";
            } else{
                echo
                "
                <div class='" . ($a == $this->currentIndex ? "active" : "") . " wrapper subNavbar'>
                <ul class='subNavList'>
                ";

                for($b = 0; $b < $subPages->count(); $b++){ //each tab
                    if($b == 0){
                        $pageAddress = $this->data->category[$a]->title + ".php";
                    } else if(strrpos($subPages[$b], " ")){
                        $pageAddress = $this->data->category[$a]->title . ".php?pageContents=" . substr($subPages[$b], strrpos($subPages[$b], " ") + 1); //extract everything after last space
                    } else{
                        $pageAddress = $this->data->category[$a]->title . ".php?pageContents=" . $subPages[$b];
                    }

                    $pageAddress = formatString($pageAddress);

                    echo "
                    <li><a href='" . $pageAddress . "'>" . $subPages[$b] . (stripos($_SERVER['HTTP_REFERER'], $pageAddress) === FALSE ? "" : "<span class='pointer activePointer'> <img src='imageAssets/icons/triangle-white.svg' />") . "</a></li>
                    ";
                }

                echo "</ul>
                </div>
                ";
            }
        }
    }
}

class PageContent extends XMLDoc {
    function PageContent(){
        if(empty($_GET["pageContents"])){
            XMLDoc::XMLDoc($GLOBALS['pageSource'], ENT_QUOTES);
        } else {
            XMLDoc::XMLDoc(($GLOBALS['pageSource'] . "/" . htmlspecialchars($_GET["pageContents"])), ENT_QUOTES);
        }
    }


    function generateContent(){
        if($this->error == false){ //function will return true on success
            $this->content_generate();
        } else{
            generateXMLErrors();
        }
    }

    private function content_generate(){
        for($i = 0; $i < $this->dataCount; $i++){
            echo
            "<div class='subsection'>
            <div class='sectionTitle'>" . $this->data->section[$i]->SSTitle . "</div>
            <div class='sectionBody'>
            " . $this->data->section[$i]->SSBody . "
            </div>
            </div>";
        }
    }
}

//Misc important funtions

//Lowercases first letter
function formatString($s) {
    return strtolower(substr($s, 0, 1)) . substr($s, 1);
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
        echo "<br />";
    }

    echo "
    </div>
    </div>";
}

function errorCatcher($errNo, $errMsg, $errFile, $errLine){
    echo
    "<div class='subsection'>
    <div class='sectionTitle'>Oh no! Something broke! This will get fixed ASAP!</div>
    <div class='sectionBody'>
    Error Level $errNo : $errMsg<br/>
    $errFile at line $errLine
    </br/>
    </div>
    </div>";
}
?>
