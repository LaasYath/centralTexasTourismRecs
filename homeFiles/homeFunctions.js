function hidePopup () {
    const boxes = Array.from(document.getElementsByClassName('popup'));

    boxes.forEach(box => {
        box.style.visibility = 'hidden';
    });

    // setMenu();
}

// function setMenu() {
//     var home = document.getElementById("homeButton");
//     home.style.backgroundColor = rgb(104, 159, 241); 
// }

function resultsPage() {
    window.open("http://127.0.0.1:5500/resultsFiles/results.html");
}

function contactPage() {
    window.open("http://127.0.0.1:5500/contactFiles/contact.html");
}

function faqPage() {
    window.open("http://127.0.0.1:5500/faqFiles/faq.html");
}

function aboutPage() {
    window.open("http://127.0.0.1:5500/aboutFiles/about.html");
}