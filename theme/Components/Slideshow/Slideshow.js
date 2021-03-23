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