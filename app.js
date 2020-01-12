function smoothScroll(target, duration){
    var target = document.querySelector(target);
    var targetPosition = target.getBoundingClientRect().top;
    var startPosition = window.pageYOffset;
    var distance = targetPosition - startPosition;
    var startTime = null;
    console.log(targetPosition);

    function animationScroll(currentTime){
        if(startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var run = ease(timeElapsed, startPosition, distance, duration);
        window.scrollTo(0, run);
        if(timeElapsed < duration) requestAnimationFrame(animationScroll);
    }

    function ease(t, b, c, d) {
	t /= d;
	t--;
	return c*(t*t*t*t*t + 1) + b;
}

    requestAnimationFrame(animationScroll);
}

var aboutLink = document.querySelector(".aboutLink");
aboutLink.addEventListener('click', function(){
   smoothScroll('#about', 1000);
});

var servicesLink = document.querySelector(".servicesLink");
servicesLink.addEventListener('click', function(){
   smoothScroll('#services', 1000);
});

var projectsLink = document.querySelector(".projectsLink");
projectsLink.addEventListener('click', function(){
   smoothScroll('#projects', 1000);
});

var contactLink = document.querySelector(".contactLink");
contactLink.addEventListener('click', function(){
   smoothScroll('#contact', 1000);
});