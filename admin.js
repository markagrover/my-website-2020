/**
 * Created by markgrover on 1/22/20.
 */
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