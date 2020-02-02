/**
 * Created by markgrover on 2/2/20.
 */
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

// stop form from submitting
//this is the id of the form
$(".deleteRecord").click(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var link = $(this);
  var url = link.attr('href');

  $.ajax({
    type: "get",
    url: url,
    // data: form.serialize(),// serializes the form's elements.
    success: function(data)
    {
      window.location.href = "../admin.php";
    }
  });
});