$(document).ready(function() {
  console.log('Document loaded!');

  // Attach button html to the DOM where a given file upload field is to allow
  // for more flexible styling.
  $('input[type="file"].button').each(function() {
    // Get the ID of this file field.
    var id = $(this).attr('id');

    // Prepare the button.
    var markup = '<button class="input-file-button ' + id + '">Choose File</button>'

    // Hide the input upload button.
    $(this).css({'text-indent': '-9999px'});

    // Append our new button.
    $(this).after(markup);
  });

  // We need to append click listeners to the file replacement buttons.  Since
  // they get attached to the dom after the fact, we listen for events that
  // bubble up to the body and check their source ('.input-file-button')
  $('body').on('click', '.input-file-button', function(e) {
    // Stop this button from submitting the form
    e.preventDefault();

    // Parse out the class names to find the id we stored.
    var classes = $(this)[0].className.split(" ");
    var id = classes[0] == 'input-file-button' ? classes[1] : classes[0];

    // Select the file upload field now using our 'id' and click it!
    $('#' + id).click();
  });

  $('form').on('submit', function(e) {
    var valid = true;
    var error = '';

    $('input', $(this)).each(function() {
      if ($(this).attr('type') !== 'submit') {
        if ($(this).val() === '' || $(this).val() === null) {
          valid = false;
          error = "All fields must be filled.";
        }

        if ($(this).hasClass('error')) {
          valid = false;
          error = "All errors must be resolved.";
        }
      }
    });

    if (!valid) {
      alert(error);
      return false;
    }

  });

  $('input[name="newpassword"], #createAccountForm input[name="password"]').on('keyup', function(e) {
    // Valid password regex testers
    var pass_strength = /((?=.*\d)(?=.*[a-z]).{7,15})/gm;

    var current_val = $(this).val();

    if (!pass_strength.test(current_val)) {
      $(this).addClass('error');
    }
    else {
      $(this).removeClass('error');

      if (current_val === $('input[name="confirmPassword"]').val()) {
        $('input[name="confirmPassword"]').removeClass('error');
      }
      else {
        $('input[name="confirmPassword"]').addClass('error');
      }
    }
  });

  $('input[name="confirmPassword"]').on('keyup', function(e) {
    var confirmation_pass = $(this).val();
    var main_pass = $('input[name="newpassword"]').val() || $('#createAccountForm input[name="password"]').val();

    if (confirmation_pass !== main_pass) {
      $(this).addClass('error');
    }
    else {
      $(this).removeClass('error');
    }
  });

});
