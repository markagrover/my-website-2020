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
      let parsedData = {};
      console.log('json parse ',data);
      // parse json data
      if(data){
        parsedData = JSON.parse(data);
      }

      if(parsedData.error){
        // display error message if one exist
        $('.registerMessage').text(parsedData.error.msg);
      }
      // check for error code
      // 101 means passwords don't match
      if(parsedData.error){
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
          // reset field
          document.querySelector('#password').value = '';
          document.querySelector('#passwordConfirm').value = '';
        }

        // error code 201 means username already exist
        if(parsedData.error.code === 201){
          username.addClass('error');
          username.keydown(function(){
            username.removeClass('error');
          })
          document.querySelector('#username').value = '';
        }

        // error code 301 means email already exist
        if(parsedData.error.code === 301){
          email.addClass('error');
          email.keydown(function(){
            email.removeClass('error');
          })
          document.querySelector('#email').value = '';
        }

        // error code 401 means passwords too short
        if(parsedData.error.code === 401){
          password.addClass('error');
          passwordConfirm.addClass('error');

          // reset field
          document.querySelector('#password').value = '';
          document.querySelector('#passwordConfirm').value = '';

          // remove class when form field is typed into
          password.keydown(function(){
            password.removeClass('error');
          });
          // remove class when form field is typed into
          passwordConfirm.keydown(function(){
            passwordConfirm.removeClass('error');
          });
        }
      }


      if(!parsedData.error){
        $(".registrationForm").each(function(){
          this.reset();
        });
        $('.registrationForm').remove();
        window.location.href = "login.php";
      }

    }
  });
});
