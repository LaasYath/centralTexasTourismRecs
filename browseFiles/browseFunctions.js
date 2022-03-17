// Menu Bar Buttons/Links
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

//establishing connection with attractions database
const express = require('express');
const mysql = require('mysql');

const app = express();

const attractDb = mysql.createConnection ({
    host: "localhost",
    user: "root",
    password: "root",
    database: "mysql",
    port: "3307"
});

attractDb.connect((err) => {
    if(err) {
        throw err;
    }
    attractDb.query('SELECT name, blurb, link FROM attractions WHERE price=0', function (err, result) {
        if(err) throw err;
        console.log(result);
    })
});

function changeQuery(box) {
    attractDb.connect((err) => {
        if(err) throw err;
        let sql = 'SELECT * FROM attractions WHERE price=0';
        attractDb.query(sql, (req, result) => {
            if(err) throw err;
            return result;
        })
    })
}