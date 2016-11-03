var currentSubNav;
var originalNav;
var subNavList;
var pointersList;

//Functions
function navigationInit(n){
    currentSubNav = n;
    originalNav = n;

    subNavList = document.getElementsByClassName("subNavbar");

    pointersList = document.getElementsByClassName("pointer");
    pointersList[n].className = "pointer activePointer";
}

function changeSubNav(n){
    if(subNavList[currentSubNav] != null){
        subNavList[currentSubNav].className = "wrapper subNavbar";
    }

    if(subNavList[n] != null){
        movePrimaryPointer(n);
        subNavList[n].className = "active wrapper subNavbar";
    } else if(n == originalNav){
        movePrimaryPointer(n);
    } else{
        movePrimaryPointer(originalNav);
    }

    currentSubNav = n;
}

function movePrimaryPointer(n){
    pointersList[currentSubNav].className = "pointer";
    pointersList[n].className = "pointer activePointer";
}
