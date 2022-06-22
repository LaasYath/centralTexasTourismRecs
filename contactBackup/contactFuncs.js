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

