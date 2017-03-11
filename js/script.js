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

});
