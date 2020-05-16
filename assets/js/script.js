

function open_bar() {
    document.getElementById("slide-bar").style.marginLeft="0px";
}
function close_bar() {
    document.getElementById("slide-bar").style.marginLeft = "-800px";
}
function read_more() {
    var btn = document.getElementById("btn-read-more");
    var more = document.getElementById("more");
    var dots = document.getElementById("dots");
    if(dots.style.display !=="none"){
        dots.style.display="none";
        more.style.display= "inline-block"; 
        btn.innerHTML="Ẩn bớt";
    }else{
        dots.style.display = "inline";
        more.style.display = "none";
        btn.innerHTML = "Xem thêm";
    }
    
}
function scroll_top() {
    var y;
    var myset = setInterval(() => {
        if (pageYOffset >0) {
            y = pageYOffset-10;
            window.scrollTo(0,y);
        }
        else{
            clearInterval(myset);
        }
    }, 1);
    
}
var myTime = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    var dt= d.toLocaleDateString();
    document.getElementById("time-update").innerHTML = t+" Ngày "+dt;
}

window.addEventListener('scroll', function () {
    if (pageYOffset>50){
        this.document.getElementById("up-btn").style.right="20px";
    }
    if (pageYOffset <50) {
        this.document.getElementById("up-btn").style.right = "-60px";
    }
});


const toggleSwitch = document.querySelector('.switch [type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}
window.matchMedia('(prefers-color-scheme: dark)').matches
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }
}

toggleSwitch.addEventListener('change', switchTheme, false);


// Get the modal
var modal = document.getElementById("myModal");
var noidungchinh = document.getElementById("noidungchinh");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
    noidungchinh.style.filter = "blur(3px)";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
    noidungchinh.style.filter = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        noidungchinh.style.filter = "none";
    }
}



var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}