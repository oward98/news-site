var menuContent = document.getElementById('headerNav');

function showMenu() {
    menuContent.style.display = 'block';
}

function hideMenu() {
    menuContent.style.display = 'none';
}

function addClickFunctionality() {
    //only true at start if CSS set display to none, therefore mobile
    var menuShowing = menuContent.style.display === 'block';
    if (menuShowing) return;

    var menuButton = document.getElementById('mobileMenuButton');
    function toggleMenu() {
        var menuShowing = menuContent.style.display === 'block';
        if (menuShowing) {
            hideMenu()
        } else {
            showMenu()
        }
    }
    menuButton.onclick = toggleMenu;
}

function keepCheckOnWindowSize() {
    var windowWidth = window.innerWidth;
    window.onresize = function() {
        if (window.innerWidth === windowWidth) return;
        if (window.innerWidth > 850) {
            showMenu();
            windowWidth = window.innerWidth;
        } else {
            hideMenu()
            windowWidth = window.innerWidth;
        }
    }
}


keepCheckOnWindowSize();
addClickFunctionality();
function startSlideshow() {
    var slideIndex = -1;

    var frontSlides = document.getElementById('mainSlideshow').getElementsByClassName("slide");
    var backgroundSlides = document.getElementById('backgroundSlideshow').getElementsByClassName("slide");
    var numOfSlides = frontSlides.length;

    function nextSlide() {
        var oldSlideIndex = slideIndex;
        slideIndex === numOfSlides - 1 ? slideIndex = 0 : slideIndex ++;

        frontSlides[slideIndex].style.opacity = 1;
        frontSlides[slideIndex].style.zIndex = 1;
        if (oldSlideIndex !== -1) {
            frontSlides[oldSlideIndex].style.opacity = 0;
            frontSlides[oldSlideIndex].style.zIndex = 0;
        }
    
        setTimeout(function() { 
            backgroundSlides[slideIndex].style.opacity = 1
            backgroundSlides[slideIndex].style.zIndex = -9;
            if (oldSlideIndex !== -1) {
                backgroundSlides[oldSlideIndex].style.opacity = 0;
                backgroundSlides[oldSlideIndex].style.zIndex = -10;
            }
        }, 500);
    }
    nextSlide();
    setInterval(nextSlide, 5000);
}

window.addEventListener('load', startSlideshow);