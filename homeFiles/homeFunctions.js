function hidePopup () {
    const boxes = Array.from(document.getElementsByClassName('popup'));

    boxes.forEach(box => {
        box.style.visibility = 'hidden';
    });
}

function browsePage() {
    window.open("http://127.0.0.1:5500/browseFiles/browse.html");
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