let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

function mostrar1(){
    var texto = document.getElementById("texto1");

    if (texto.style.display === "flex") {
        texto.style.display = "none";
    } else {
        texto.style.display = "flex";
    }
}

function mostrar2(){
    var texto = document.getElementById("texto2");

    if (texto.style.display === "flex") {
        texto.style.display = "none";
    } else {
        texto.style.display = "flex";
    }
}

function mostrar3(){
    var texto = document.getElementById("texto3");

    if (texto.style.display === "flex") {
        texto.style.display = "none";
    } else {
        texto.style.display = "flex";
    }
}

function mostrar4(){
    var texto = document.getElementById("texto4");
    var pregunta = document.getElementById("pregunta4");

    if (texto.style.display === "flex") {
        texto.style.display = "none";
        pregunta.style.marginBottom = "6vw";
    } else {
        pregunta.style.marginBottom = 0;
        texto.style.display = "flex";
        texto.style.marginBottom = "4vw";
    }
}