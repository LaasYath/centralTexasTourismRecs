// Hides the pop up when user clicks exit button
function hidePopup () {
    const boxes = Array.from(document.getElementsByClassName('popup'));

    boxes.forEach(box => {
        box.style.visibility = 'hidden';
    });
}