import * as botFuncs from "../bot.js";

function view(item) {
    var answer = document.getElementById(item);
    let compStyles = window.getComputedStyle(answer);
    if (compStyles.display == "none") {
        answer.style.display = "block";
    } else if (compStyles.display == "block") {
        answer.style.display = "none";
    }
}