var currentSubNav;
var subNavList;
var pointersList;

//Functions
function navigationInit(n){
    currentSubNav = n;
    subNavList = document.getElementsByClassName("subNavbar");

    pointersList = document.getElementsByClassName("pointer");
    pointersList[n].className = "pointer activePointer";
}

function changeSubNav(n){
    if(n < subNavList.length){
        movePrimaryPointer(n);
        if(subNavList[currentSubNav] != null){
            subNavList[currentSubNav].className = "wrapper subNavbar";
        }

        if(subNavList[n] != null){
            subNavList[n].className = "active wrapper subNavbar";
        }
        currentSubNav = n;
    }
}

function movePrimaryPointer(n){
    pointersList[currentSubNav].className = "pointer";
    pointersList[n].className = "pointer activePointer";
}
