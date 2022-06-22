// Goes to round 0
var openButton = document.getElementById("openBot");
var topButton = document.getElementById("top");
var ri = document.getElementById("robotImg");

function changeIcon() {
    if (ri.src == "http://localhost:81/backspace.svg") {
        round0.style.display="none"; 
        round01.style.display="none";
        round02.style.display="none";
        round03.style.display="none";
        topButton.style.bottom="85px";
        ri.src = "http://localhost:81/robot.svg";
    } else if (ri.src == "http://localhost:81/robot.svg") {
        round0.style.display="block"; 
        topButton.style.bottom="270px";
        ri.src = "http://localhost:81/backspace.svg";
    }
}

var round0 = document.getElementById("round0");
openButton.addEventListener("click", function() {changeIcon();});

// Round 1
// things to do
var round01 = document.getElementById("round01"); //Display this
var openRound1 = document.getElementById("set01"); //Add event listener to this
openRound1.addEventListener("click", function(){round0.style.display="none"; round01.style.display="block";});

// visitor information
var round02 = document.getElementById("round02"); //Display this
var openRound2 = document.getElementById("set02"); //Add event listener to this
openRound2.addEventListener("click", function(){round0.style.display="none"; round02.style.display="block";});

// privacy/cookies
var round03 = document.getElementById("round03"); //Display this
var openRound3 = document.getElementById("set03"); //Add event listener to this
openRound3.addEventListener("click", function(){round0.style.display="none"; round03.style.display="block";});

// Other - enables search bar
// var set04 = document.getElementById("set04");
// set04.addEventListener("click", function(){search.style.display="block"});
// var set14 = document.getElementById("set14");
// set14.addEventListener("click", function(){search.style.display="block"});
// var set23 = document.getElementById("set23");
// set23.addEventListener("click", function(){search.style.display="block"});
// var set34 = document.getElementById("set34");
// set34.addEventListener("click", function(){search.style.display="block"});

console.log("reads the js file");
