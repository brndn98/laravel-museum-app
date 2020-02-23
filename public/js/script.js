const navbar = document.getElementById("navbar-id");
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
    } else {
        navbar.classList.add("navbar-top");
        navbar.classList.remove("navbar-scroll");
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
const fileInputs = document.querySelectorAll(".file-input");
fileInputs.forEach((fileInput, inputIndex) => {
    let fileLabel = fileInput.nextElementSibling;

    fileInput.addEventListener("change", function() {
        let fileName = fileInput.value.split("\\").pop();
        fileLabel.innerHTML = fileName;
    });
});

// AJAX REQUEST WITH FETCH API

const likeIcons = document.querySelectorAll(".fa-heart");

const toggleLikes = function() {
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    let post_id = this.id;
    let thisPost = this;
    let thisPostId = "post-likes-count-" + this.id;
    let thisLikes = document.getElementById(thisPostId);
    let likesCount = thisLikes.innerText.replace(/\D+/g, "");

    let url = "/ajaxRequest";

    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            post_id: post_id
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success === "liked") {
                if (thisPost.classList.contains("grid-post-icons")) {
                    thisPost.classList.replace(
                        "grid-post-actions",
                        "grid-post-actions-active"
                    );
                } else {
                    thisPost.classList.replace(
                        "post-likes",
                        "post-likes-active"
                    );
                }
                thisLikes.innerText = 1 + +likesCount + " likes";
            } else if (data.success === "disliked") {
                if (thisPost.classList.contains("grid-post-icons")) {
                    thisPost.classList.replace(
                        "grid-post-actions-active",
                        "grid-post-actions"
                    );
                } else {
                    thisPost.classList.replace(
                        "post-likes-active",
                        "post-likes"
                    );
                }
                thisLikes.innerText = likesCount - 1 + " likes";
            }
        })
        .catch(function(error) {
            console.log(error);
        });
};

likeIcons.forEach(icon => {
    icon.addEventListener("click", toggleLikes);
});
