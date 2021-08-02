let images = [];

document.querySelector('#gallery').addEventListener('change', function() {
	let preview = document.querySelector('#imagePreview');

  let files = this.files;
	for (let i = 0; i <= files.length; i++) {
		images.push(files[i]);
	}

  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
});