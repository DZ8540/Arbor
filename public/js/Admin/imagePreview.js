document.querySelector('#image').onchange = evt => {
  const [file] = document.querySelector('#image').files;
  if (file) {
    document.querySelector('#imagePreview').src = URL.createObjectURL(file);
  }
}