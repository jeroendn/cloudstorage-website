$(document).ready(function() {

  // sticky header
  $(window).scroll(function() {
      var height = $(window).scrollTop();

      if(height > 100) {
        $('#header').addClass('floating');
      }
      else {
        $('#header').removeClass('floating');
      }
  });

  // login submit
  $('#login-form').submit(function(e) {
    var request;
    e.preventDefault();

    if (request) {
      request.abort();
    }

    var form = $(this);
    var inputs = form.find("input, select, button, textarea");
    var serializedData = form.serialize();

    inputs.prop("disabled", true);

    request = $.ajax({
      url: "php/ajax/login_submit.php",
      type: "post",
      data: serializedData
    });

    request.done(function () {
      window.location.href = 'documents';
    });

    request.always(function () {
      inputs.prop("disabled", false);
    });

  });

});
