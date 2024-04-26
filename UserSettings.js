$(document).ready(function() {
    $('#username').on('input', function() {
      var currentValue = $(this).val();
      if (!currentValue.startsWith('@')) {
        $(this).val('@' + currentValue);
      }
    });
});

function previewFile() {
    const preview = document.getElementById('previewImage');
    const file = document.getElementById('formFile').files[0]; // Utilizza l'ID corretto
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "/images/User_ProfilePic.PNG"; // Default image if no file is selected
    }
}
