import * as botFuncs from "../bot.js";

// Changes home logo when hovered
function changeBg() {
    var logo = document.getElementById("homeLogo");
    logo.src="darkWebLogo.png";
}
function changeBgBack() {
    var logo = document.getElementById("homeLogo");
    logo.src="webLogo.png";
}

// View Checkboxes when + button is clicked
function view(item) {
    var answer = document.getElementById(item);
    let compStyles = window.getComputedStyle(answer);
    if (compStyles.display == "none") {
        answer.style.display = "block";
    } else if (compStyles.display == "block") {
        answer.style.display = "none";
    }
}