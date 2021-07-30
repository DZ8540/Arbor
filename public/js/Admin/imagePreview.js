document.querySelector('#image').addEventListener('change', function() {
	var preview = document.querySelector('#imagePreview');
  var file = this.files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
});