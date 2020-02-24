/**
 * Created by markgrover on 1/22/20.
 */
$(".loginForm").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
    type: "get",
    url: url,
    data: form.serialize(),// serializes the form's elements.
    success: function(data)
    {
    }
  });
});

