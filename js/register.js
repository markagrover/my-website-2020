/**
 * Created by markgrover on 2/20/20.
 */
$(".registrationForm").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  const username = $('#username');
  const email = $('#email');
  const password = $('#password');
  const passwordConfirm = $('#passwordConfirm');

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
    type: "post",
    url: url,
    data: form.serialize(),// serializes the form's elements.
    success: function(data)
    {
      // parse json data
      const parsedData = JSON.parse(data);
      if(parsedData.error){
        // display error message if one exist
        $('.registerMessage').text(parsedData.error.msg);
      }
      // check for error code
      // 101 means passwords don't match
      if(parsedData.error.code === 101){
        password.addClass('error');
        passwordConfirm.addClass('error');
        // remove class when form field is typed into
        password.keydown(function(){
          password.removeClass('error');
        });
        // remove class when form field is typed into
        passwordConfirm.keydown(function(){
          passwordConfirm.removeClass('error');
        });
      }

      // error code 201 means username already exist
      if(parsedData.error.code === 201){
        username.addClass('error');
        username.keydown(function(){
          username.removeClass('error');
        })
      }

      // error code 301 means email already exist
      if(parsedData.error.code === 301){
        email.addClass('error');
        email.keydown(function(){
          email.removeClass('error');
        })
      }
      $(".registrationForm").each(function(){
        this.reset();
      });
    }
  });
});
