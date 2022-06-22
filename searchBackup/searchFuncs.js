import * as botFuntions from "../bot.js";

// Change topic text when hovered
function changeTxt(item) {
    item.style.color = "rgb(30, 52, 87)";
    item.style.border = "3px inset rgb(230, 234, 240)";
}

function changeTxtBack(item) {
    item.style.color = "white";
    item.style.border = "3px solid rgb(230, 234, 240)";
}

// // Changes menu buttons when hovered
function changeBg() {
    document.getElementById("homeLogo").src = "darkWebLogo.png";
}
function changeBgBack(item) {
    document.getElementById("homeLogo").src = "webLogo.png";
}
