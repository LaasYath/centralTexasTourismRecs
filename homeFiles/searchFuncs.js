// Change topic text when hovered
function changeTxt(item) {
    item.style.color = "rgb(30, 52, 87)";
    item.style.border = "3px inset rgb(230, 234, 240)";
}

function changeTxtBack(item) {
    item.style.color = "white";
    item.style.border = "3px solid rgb(230, 234, 240)";
}

// Changes menu buttons when hovered
function changeBg(item) {
    if(!(item==document.getElementById("pageButton"))) {
        item.style.background = "rgb(85, 149, 250)";
    }
    document.getElementById("homeLogo").src = "darkWebLogo.png";
    item.style.border = "3px inset gray";
}
function changeBgBack(item) {
    if(item==document.getElementById("pageButton")) {
        item.style.background= "rgb(104, 159, 241)";
    }
    else {
        document.getElementById("homeLogo").src = "webLogo.png";
        item.style.background = "rgb(185, 207, 240)";
    }
    item.style.border = "3px solid black";
}
