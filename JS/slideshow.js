let sIndex = 1;
slide(sIndex);

function moveSlides(n){
    slide(sIndex += n);
}

function slide(n){
    var i;
    var slides = document.getElementsByClassName("slide");
    if(n > slides.length){
        sIndex = 1;
    }
    if(n < 1){
        sIndex = slides.length;
    }
    for(i=0; i < slides.length; i++){
        slides[i].style.display = "none";

    }
    slides[sIndex-1].style.display = "block";
}