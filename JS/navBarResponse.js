var currentSubNav;
var subNavList;

//Functions
function navigationInit(n){
    console.log(n);
    currentSubNav = n;
    subNavList = document.getElementsByClassName("subNavbar");
}

function changeSubNav(n){
    console.log(currentSubNav);
    if(n < subNavList.length){
        subNavList[currentSubNav].className = "wrapper subNavbar";
        subNavList[n].className = "active wrapper subNavbar";
        currentSubNav = n;
    }
}
