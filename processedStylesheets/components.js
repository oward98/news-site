var breadcrumbs = document.getElementById('breadcrumbs');
breadcrumbs.isStuck = false;

window.onscroll = function() {
    console.log('scrolllll')
    var breadcrumbsTopPosition = breadcrumbs.getBoundingClientRect().top;
    console.log(breadcrumbsTopPosition);
    if (breadcrumbsTopPosition<1) {
        console.log('making sticky!!')
        breadcrumbs.style.position = 'fixed';
        breadcrumbs.style.top = 0;
        breadcrumbs.isStuck = true;
    }
}
var planningSearchButton = document.getElementById('planningSearchButton');
var mapButton = document.getElementById('map');

function planningClick() {
    window.open('https://planningsearch.bloomsburyconservation.org.uk');
}

function mapClick() {
    window.open('https://map.bloomsburyconservation.org.uk');
}