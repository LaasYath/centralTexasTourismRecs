// Changes home logo when hovered
function changeBg() {
    var logo = document.getElementById("homeLogo");
    logo.src="darkWebLogo.png";
}
function changeBgBack() {
    var logo = document.getElementById("homeLogo");
    logo.src="webLogo.png";
}

function view(item) {
    var answer = document.getElementById(item);
    let compStyles = window.getComputedStyle(answer);
    if (compStyles.display == "none") {
        answer.style.display = "block";
    } else if (compStyles.display == "block") {
        answer.style.display = "none";
    }
}

function change(item) {
    if (item.innerHTML.includes("+")) {
        item.innerHTML = "-";
    } else if (item.innerHTML.includes("-")) {
        item.innerHTML="+";
    }
}

function changeIcon() {
    var topButton = document.getElementById("top");
    var ri = document.getElementById("robotImg");
    var round0 = document.getElementById("round0");
    var round01 = document.getElementById("round01"); 
    var round02 = document.getElementById("round02"); 
    var round03 = document.getElementById("round03");
    if (ri.src == "http://127.0.0.1:5500/faqFiles/backspace.svg") {
        round0.style.display="none"; 
        round01.style.display="none";
        round02.style.display="none";
        round03.style.display="none";
        topButton.style.bottom="85px";
        ri.src = "http://127.0.0.1:5500/faqFiles/robot.svg";
    } else if (ri.src == "http://127.0.0.1:5500/faqFiles/robot.svg") {
        round0.style.display="block"; 
        topButton.style.bottom="270px";
        ri.src = "http://127.0.0.1:5500/faqFiles/backspace.svg";
    }
    console.log(ri.src);
}

function openRound01() {
    var round0 = document.getElementById("round0");
    var round01 = document.getElementById("round01"); //Display this
    round0.style.display="none";
    round01.style.display="block";
    console.log("hi!");
}

function openRound02() {
    var round0 = document.getElementById("round0");
    var round02 = document.getElementById("round02"); //Display this
    round0.style.display="none"; 
    round02.style.display="block";
}

function openRound03() {
    var round0 = document.getElementById("round0");
    var round03 = document.getElementById("round03"); //Display this
    round0.style.display="none"; 
    round03.style.display="block";
}
