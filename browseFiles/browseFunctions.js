function homePage() {
    window.open("http://127.0.0.1:5500/homeFiles/home.html", "_self");
}

function contactPage() {
    window.open("http://127.0.0.1:5500/contactFiles/contact.html", "_self");
}

function faqPage() {
    window.open("http://127.0.0.1:5500/faqFiles/faq.html", "_self");
}

function aboutPage() {
    window.open("http://127.0.0.1:5500/aboutFiles/about.html", "_self");
}

var displayRecs = [];

function changeRecs(box) {
    if(box.checked) {
        var tempId = box.id;
        var tempBox = document.getElementById(tempId);
        tempBox.className = 'checked';
        var fix = ['checked', label.textContent];
        return fix;
    } else {
        var tempId = box.id;
        var tempBox = document.getElementById(tempId);
        tempBox.className = 'unchecked';
        var fix = ['unchecked', label.textContent];
        return fix;
    }
}

function changePrice(box) {
    var inLabel = changeRecs(box);
    if (inLabel.prototypeAt(0) == 'checked') {
        if (text == 'Free') {
            // mySQL Query for free places. add to displayRecs list
        } else if (text == '$') {
            // mySQL Query for <= 20 places. add to display list
        } else if (text == '$$') {
            // mySQL Query for <= 50 items. add to display list
        } else if (text == '$$$'){
            // mySQL Query for <= 100 items. add to display list
        }
    } else if (inLabel.prototypeAt(0) == 'unchecked') {
        if (text == 'Free') {
            // mySQL Query for free places. delete from displayRecs list
        } else if (text == '$') {
            // mySQL Query for <= 20 places. delete from displayRecs list
        } else if (text == '$$') {
            // mySQL Query for <= 50 items. delete from displayRecs list
        } else if (text == '$$$'){
            // mySQL Query for <= 100 items. delete from displayRecs list
        }
    }
}

function changeLocation(box) {
    var inLabel = changeRecs(box);
    if (inLabel.prototypeAt(0) == 'checked') {
        if (text == 'Austin') {
            // mySQL Query for Austin places. add to displayRecs list
        } else if (text == 'Round Rock') {
            // mySQL Query for RR places. add to display list
        } else if (text == 'Georgetown') {
            // mySQL Query for Georgetown add to display list
        } 
    } else if (inLabel.prototypeAt(0) == 'unchecked') {
        if (text == 'Austin') {
            // mySQL Query for Austin places. del from displayRecs list
        } else if (text == 'Round Rock') {
            // mySQL Query for RR places. del from display list
        } else if (text == 'Georgetown') {
            // mySQL Query for Georgetown del from display list
        } 
    }
}