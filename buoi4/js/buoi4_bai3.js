var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n) {
    showDivs(slideIndex += n);
}
function showThis(item){
    slideIndex=item;
    var i;
    var x = document.getElementsByClassName("mySlides");
    var y = document.getElementsByClassName("thutu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        y[i].style.backgroundColor = "rgba(218, 68, 83, 0.5)";
    }
    x[slideIndex - 1].style.display = "block";
    y[slideIndex - 1].style.backgroundColor = "rgba(218, 68, 83, 1)";
}
function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var y = document.getElementsByClassName("thutu");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        y[i].style.backgroundColor = "rgba(218, 68, 83, 0.5)";
    }
    x[slideIndex - 1].style.display = "block";
    y[slideIndex - 1].style.backgroundColor = "rgba(218, 68, 83, 1)";
}
function BatDau(){
    sukien = setInterval("plusDivs(1)", 2000);
}
function KetThuc(){
    clearTimeout(sukien);
}
BatDau();