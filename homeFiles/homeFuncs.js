// Hides the pop up when user clicks exit button
function hidePopup () {
    const boxes = Array.from(document.getElementsByClassName('popup'));

    boxes.forEach(box => {
        box.style.visibility = 'hidden';
    });

    var shadow = document.getElementsByClassName("dark");
    shadow.style.visibility = "hidden";
}

// function changeColor(item) {
//     // Changes Text Color
//     var title = document.getElementById("histTitle");
//     title.style.color = "black";

//     // Draws image to canvas (to be altered)
//     var c = document.getElementById("histCanvas");
//     var ctx = c.getContext('2d');
//     var img = document.getElementById("histImg");
//     ctx.drawImage(img, 0, 0, c.width, c.height);

//     // pixel manipulation
//     var pixData = ctx.getImageData(0, 0, c.width, c.height);
//     var data = pixData.data;
//     for (var i = 0; i < data.length; i+=4) {
//         var avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
//         data[i]     = avg; // red
//         data[i + 1] = avg; // green
//         data[i + 2] = avg; // blue
//     }
//     ctx.putImageData(pixData, 0, 0);
// }

// Change topic text when hovered
function changeTxt(item) {
    item.style.color = "white";
    item.style.border = "3px inset rgb(230, 234, 240)";
}

function changeTxtBack(item) {
    item.style.color = "black";
    item.style.border = "3px solid rgb(230, 234, 240)";
}

// Changes menu buttons when hovered
function changeBg(item) {
    if(!(item==document.getElementById("pageButton"))) {
        item.style.background = "rgb(85, 149, 250)";
    }
    item.style.border = "3px inset gray";
}
function changeBgBack(item) {
    if(item==document.getElementById("pageButton")) {
        item.style.background= "rgb(104, 159, 241)";
    }
    else {
        item.style.background = "rgb(228, 235, 247)";
    }
    item.style.border = "3px solid black";
}