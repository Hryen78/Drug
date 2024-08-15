function onPage(event, pageName){
    var i, x, links;
    x = document.getElementsByClassName("label");
    for(i = 0; i < x.length; i++){
        x[i].style.display = "none";
    }
    links = document.getElementsByClassName("page");
    for(i = 0; i < links.length; i++){ 
        links[i].className = links[i].className.replace("activate", "");
    }
    document.getElementById(pageName).style.display = "block";
    //event.currentTarget.className += " activate";

    // Save tabs into a cookie
    document.cookie = "pageName="+pageName+"; expires=Fri, 31 Dec 2070 12:00:00 UTC; path=/";
}

document.addEventListener("DOMContentLoaded", function(){
    // Load the page check if the cookie is there and read it back
    var pageName = getCookie("pageName");
    console.log("Page Name from Cookie:", pageName);
    // Checking there is any selected city then pick it
    if(pageName !== ""){
        onPage(null, pageName); // Call onPage() directly with the retrieved pageName
        // Debug
        console.log("Displaying page:", pageName);
    } else {
        // Debug
        console.log("No page name found in the cookie.");
    }
});

// Function for getting cookie value from the document.cookie [string]
function getCookie(pname){
    var name = pname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0){
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
    