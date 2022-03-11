function hidePopup () {
    const boxes = Array.from(document.getElementsByClassName('popup'));

    boxes.forEach(box => {
        box.style.visibility = 'hidden';
    });
}