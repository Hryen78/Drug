function cartPage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/cart/cart_page.html", true);
    xhttp.send();
}

function loginPage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/client/login_page.html", true);
    xhttp.send();
}

function userPage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/client/user_page.html", true);
    xhttp.send();
}

function productPage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/shop/product_page.html", true);
    xhttp.send();
}

function homePage(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/shop/home_page.html", true);
    xhttp.send();
}

function registerPage(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/client/register_page.html", true);
    xhttp.send();
}

function resetpasswordPage(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/client/resetpassword_page.html", true);
    xhttp.send();
}

function addressPage(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "HTML/client/address_page.html", true);
    xhttp.send();
}

function userorderPage(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("body").innerHTML = this.responseText;

        }
    };
    xhttp.open("GET", "HTML/client/userorder_page.html", true);
    xhttp.send();
}
