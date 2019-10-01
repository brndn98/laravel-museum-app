var navbar = document.getElementById("navbar-id");
//var navbarLogo = document.getElementById("navbar-logo-img");
/*
var navbarMenu = document.getElementById("navbar-menu-id");
var navbarBurguer = document.getElementById("navbar-burguer");
var menuFlag = false;
var menuLinks = document.querySelectorAll(".menu-link");
*/
function scrollNavbar() {
    if (window.scrollY > navbar.offsetTop) {
        navbar.classList.add("navbar-scroll");
        navbar.classList.remove("navbar-top");
        //navbarLogo.setAttribute("src", "images/logo/logo_w_720x720.png");
    } else {
        navbar.classList.add("navbar-top");
        navbar.classList.remove("navbar-scroll");
        //navbarLogo.setAttribute("src", "images/logo/logo_720x720.png");
    }
}

window.addEventListener("scroll", scrollNavbar);
/*
function toggleMenu() {

    if (document.body.clientWidth < 1025) {
        if (menuFlag) {
            navbarMenu.classList.remove("navbar-menu-active");
            navbarBurguer.style.color = "var(--yellow-color)";
            menuFlag = false;
        } else {
            navbarMenu.classList.add("navbar-menu-active");
            navbarBurguer.style.color = "var(--white-color)";
            menuFlag = true;
        }
    }

}

navbarBurguer.addEventListener("click", toggleMenu);

menuLinks.forEach(element => {

    element.addEventListener("click", function () {

        window.event.preventDefault();

        var target = element.getAttribute("href");
        var section = document.querySelector(target);

        window.scrollTo({
            top: section.offsetTop,
            left: 0,
            behavior: "smooth"
        });

        toggleMenu();

    }, false);

});
*/

/*
var fileInputs = document.querySelectorAll(".file-input");
Array.prototype.forEach.call(fileInputs, function(input) {
    var label = input.nextElementSibling;
    var labelVal = label.innerHTML;

    input.addEventListener("change", function(e) {
        var fileName = "";
        if (this.files && this.files.length > 1) {
            fileName = (
                this.getAttribute("data-multiple-caption") || ""
            ).replace("{count}", this.files.length);
        } else {
            fileName = e.target.value.split("\\").pop();
        }

        if (fileName) label.innerHTML = fileName;
        else label.innerHTML = labelVal;
    });
});
*/
var fileInputs = document.querySelectorAll(".file-input");
fileInputs.forEach((fileInput, inputIndex) => {
    var fileLabel = fileInput.nextElementSibling;

    fileInput.addEventListener("change", function() {
        var fileName = fileInput.value.split("\\").pop();
        fileLabel.innerHTML = fileName;
    });
});
