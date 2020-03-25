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

  // Register submit
  $('#register-form').submit(function(e) {
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
      url: "php/ajax/register.php",
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

  // delete document
  $('#documents .card .btn-delete').on('click', function() {
    let document_id = $(this).parent().parent().find('input[type="hidden"]').val();

    $.ajax({
      url: "php/ajax/delete_document.php",
      type: "post",
      data: { document_id:document_id },
      success: (json) => {
        $(this).parent().parent().fadeOut();
      }
    });
  });

  // open share document tab
  $('#documents .card .btn-share').on('click', function() {
    let share = $(this).parent().parent().find('.share');
    let visibility;

    if (share.is(':visible')) { visibility = true; } else { visibility = false; }

    $('.share').each(function() { $(this).slideUp('fast'); });

    if (visibility) { share.slideUp('fast'); } else { share.slideDown('fast'); }
  });

  // save a file to the directory's secret location
  // $('#documents .card input[name="upload"]').on('click', function() {
  //   // get the file
  //   // let file = $(this).prev().prop('files')[0];
  //   let file;
  //
  //   var reader = new FileReader();
  //       reader.readAsText(file);
  //       reader.onload = function(e) {
  //           // alert(e.target.result);
  //           file = btoa(unescape(encodeURIComponent(e.target.result)));
  //       };
  //   // get file name
  //   let file_path = $(this).prev().val();
  //   let file_name = file_path.substring(file_path.lastIndexOf("\\")+1);
  //   console.log(file + file_path + file_name);
  //
  //   $.ajax({
  //     url: "php/ajax/save_file.php",
  //     type: "post",
  //     data: { file:file, file_name:file_name },
  //     success: (json) => {
  //
  //     }
  //   });
  // });


});
