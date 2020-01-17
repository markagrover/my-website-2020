// make jumbotronOverlay the height of the image
function createOverlay(){
  const overlay = document.querySelector(".jumbotronOverlay");
  const imageHeight = document.querySelector('.jumbotron img').height;
  overlay.style = "height:" +imageHeight+"px";
}
createOverlay();
window.addEventListener('resize', function(){
  createOverlay();
});

// up arrow to take you to the top of the page
var pageUp = document.querySelector('.pageUp');
pageUp.addEventListener('click', function(){
  smoothScroll("nav", 2000);
})

// animation for title flip
function titleFlip(target){
  var target = document.querySelector(target);
  var targetPosition = target.getBoundingClientRect().top;
  var windowHeight = window.innerHeight;
  if(targetPosition < windowHeight - 150){
    if(!target.classList.contains('flip')){
      target.classList.toggle("flip");
    }
  } else if (targetPosition > windowHeight){
    target.classList.remove("flip");
  }
}
window.addEventListener('scroll', function(e){

  titleFlip('.servicesTitle');
  titleFlip('.projectsTitle');
  titleFlip('.aboutTitle');
  titleFlip('.contactTitle');
})

// smooth scroll for navigation
function smoothScroll(target, duration){
    var target = document.querySelector(target);
    var targetPosition = target.getBoundingClientRect().top;
    var startPosition = window.pageYOffset;
    var distance = targetPosition - startPosition;
    var startTime = null;

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
   smoothScroll('#about', 1500);
});

var servicesLink = document.querySelector(".servicesLink");
servicesLink.addEventListener('click', function(){
   smoothScroll('#services', 1500);
});

var projectsLink = document.querySelector(".projectsLink");
projectsLink.addEventListener('click', function(){
   smoothScroll('#projects', 1500);
});

var contactLink = document.querySelector(".contactLink");
contactLink.addEventListener('click', function(){
   smoothScroll('#contact', 1500);
});

// google map
function initMap() {
  // The location of Medway
  var medway = {lat: 42.21517, lng: -71.4334689};
  // The map, centered at Medway
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 10, center: medway});
  // The marker, positioned at Medway
  var marker = new google.maps.Marker({position: medway, map: map});
}

// stop form from submitting
// this is the id of the form
$("#contactForm").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
    type: "GET",
    url: url,
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {
      $('.contactContainer').remove();
      $('.contactMessage').html("<p class='message'>Thank You For Contacting Me. I will be in touch shortly! </p>");
    }
  });
});






