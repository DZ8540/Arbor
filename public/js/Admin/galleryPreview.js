document.querySelector('#gallery').onchange = evt => {
  document.querySelector('#galleryPreview').innerHTML = '';
  const files = document.querySelector('#gallery').files;

  for (let i = 0; i < files.length; i++) {
    if (files[i]) {
      let image = `
        <div style="margin-right: 20px; position: relative">
<!--            <button style="position: absolute; top: 0; right: 0" class="btn btn-danger galleryImage" id="${i}" type="button">x</button>-->
            <img src="${URL.createObjectURL(files[i])}" width="200px" alt="">
        </div> 
      `;
      document.querySelector('#galleryPreview').insertAdjacentHTML('beforeend', image);
    }
  }

  // let galleryImages = document.querySelectorAll('.galleryImage');
  // galleryImages.forEach(el => {
  //   let id = el.id;
  //   let files = Array.from(document.querySelector('#gallery').files);
  //
  //   el.addEventListener('click', () => {
  //     for (let i = 0; i < files.length; i++) {
  //       if (id == i) {
  //         files.splice(i, 1);
  //       }
  //     }
  //
  //     document.querySelector('#galleryPreview').innerHTML = '';
  //     let image = `
  //           <div style="margin-right: 20px; position: relative">
  //               <button style="position: absolute; top: 0; right: 0" class="btn btn-danger galleryImage" id="${i}" type="button">x</button>
  //               <img src="${URL.createObjectURL(files[i])}" width="200px" alt="">
  //           </div>
  //         `;
  //     document.querySelector('#galleryPreview').insertAdjacentHTML('beforeend', image);
  //   })
  // })
}