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
    // var answer = document.getElementById(item);
    item.style.display = "none";
}