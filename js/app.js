function insertSVG(){

  if(window.innerWidth < 1000){
    var jumbotron = document.querySelector('.jumbotron');
    // document.querySelector('.jumbotronOverlay').style.height = "0px";
    var svg = document.createElement('img');
    svg.src = 'images/logo.svg';
    svg.style.height = "300px";
    svg.classList.add('mobileJumbotronSVG');
    jumbotron.appendChild(svg);
  }
  window.addEventListener('resize', function(){
    if(!document.querySelector('.mobileJumbotronSVG')){
      insertSVG();
    }
  });
}
insertSVG();


// create mobile navigation
function toggleNavigation(){
  var nav = document.querySelector('nav ul');
  var hamburgerButton = document.querySelector('.hamburgerIcon');
  hamburgerButton.addEventListener('click', function(e){
    if(nav.classList.contains('hideNav')){
      nav.classList.remove('hideNav');
      nav.classList.add('showNav');
    } else {
      nav.classList.remove('showNav');
      nav.classList.add('hideNav');
    }
  });

}
toggleNavigation();
// up arrow to take you to the top of the page
function pageUp(){
  var pageUp = document.querySelector('.pageUp');
  pageUp.addEventListener('click', function(){
    smoothScroll("nav", 2000);
  })
}
pageUp();


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
  if(document.querySelector('.blogTitle') != null){
    titleFlip('.blogTitle');
  }
  titleFlip('.servicesTitle');
  titleFlip('.projectsTitle');
  titleFlip('.aboutTitle');
  titleFlip('.contactTitle');
})

// hide navigation when page is scrolled out of view
function removeNavOnScroll(){
  const nav = document.querySelector('nav ul');
  if(nav.classList.contains('showNav')){
    const bottomOfNav = nav.getBoundingClientRect().bottom;
    if(bottomOfNav < 0){
      nav.classList.remove('showNav');
      nav.classList.add('hideNav');
    }
  }
}
window.addEventListener('scroll', removeNavOnScroll);

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
if(document.querySelector(".blogPostsLink") != null){
  var blogLink = document.querySelector(".blogPostsLink");
  blogLink.addEventListener('click', function(){
    smoothScroll('#blogPost', 1500);
  });
}


// google map
function initMap() {
  // The location of Medway
  var medway = {lat: 42.21517, lng: -71.4334689};
  // The map, centered at Medway
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 10, center: medway});
  var footerMap = new google.maps.Map(
    document.getElementById('footerMap'), {zoom: 10, center: medway});
  // The marker, positioned at Medway
  var marker = new google.maps.Marker({position: medway, map: map});
  var footerMarker = new google.maps.Marker({position: medway, map: footerMap});
}

//check form for empty values
function checkFormFields(e){
  e.preventDefault(); // avoid to execute the actual submit of the form.
  var name = document.querySelector('#name');
  var email = document.querySelector('#email');
  var phone = document.querySelector('#phone');
  var comment = document.querySelector('#comment');
  //check if form field is empty
  if(name.value === ''){
    name.classList.add('error');
    name.value = 'Not Valid Name';
    // add event Listener to clear error from form on focus
    name.addEventListener('focus', function(e){
      e.target.value = "";
    });
  }
  if(email.value === ""){
    email.classList.add('error');
  }
  const emailRe = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(!emailRe.test(email.value)){
    email.value = 'Not Valid Email';
    email.classList.add('error');
    email.addEventListener('focus', function(e){
      e.target.value = "";
    });
  }
  if(phone.value === ""){
    phone.classList.add('error');
  }
  const phoneRe = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(!phoneRe.test(phone.value)){
    phone.value = 'Not Valid Phone';
    phone.classList.add('error');
    phone.addEventListener('focus', function(e){
      e.target.value = "";
    });
  }
  if(comment.value === ""){
    comment.classList.add('error');
    comment.value = 'Not Valid Message';
    comment.addEventListener('focus', function(e){
      e.target.value = "";
    });
  }
  if(name.value != '' && phone.value != '' && email.value != '' && comment.value != '' &&
    !name.classList.contains('error') && !email.classList.contains('error') && !phone.classList.contains('error') &&
    !comment.classList.contains('error')){
    // form passes all test submit form
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
      type: "post",
      url: url,
      data: form.serialize(),// serializes the form's elements.
      success: function(data)
      {
        $('.contactContainer').remove();
        $('.contactMessage').html("<p class='message'>Thank You For Contacting Me. I will be in touch shortly! </p>");
      }
    });
  } else {
    const errorMessage = document.querySelector('.errorMessage');
    errorMessage.innerHTML = 'Please fill out all fields';
  }
}
// stop form from submitting
//this is the id of the form
$("#contactForm").submit(checkFormFields);

// if input is typed into remove red border
function removeRedBorder(e){
  e.target.classList.remove('error');
}

function addEventListenersToForm(){
  const name = document.querySelector('#name');
  const phone = document.querySelector('#phone');
  const email = document.querySelector('#email');
  const comment = document.querySelector('#comment');
  name.addEventListener('input',removeRedBorder);
  phone.addEventListener('input',removeRedBorder);
  email.addEventListener('input',removeRedBorder);
  comment.addEventListener('input',removeRedBorder);
}
addEventListenersToForm();
// decrees character count on textarea
function textAreaCounter(){
  var counter = document.querySelector('.characterCount');
  var textArea = document.getElementById('comment');
  textArea.addEventListener('keydown', function(e){
    counter.innerText = 2000 - textArea.value.length;
  });
}

textAreaCounter();


