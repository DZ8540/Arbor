let _token = document.querySelector('#token').value;

let form = document.querySelector('#form');
let formCategory = document.querySelector('#formCategory');
let formThickness = document.querySelector('#formThickness');
let formColor = document.querySelector('#formColor');

formCategory.onchange = async function() {
  let val = this.value;

  let route = form.getAttribute('action');
  form.setAttribute('action', `${route}${val}`);

  document.querySelector('#material').innerHTML = val;
  document.querySelector('#thickness').innerHTML = '';
  document.querySelector('#color').innerHTML = '';

  let deleteClass = 'itemDelete'; // For deleting select's options

  let data = await (await fetch('/services', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-Token': _token
    },
    body: JSON.stringify({
      category_id: val
    })
  })).json();

  formThickness.querySelectorAll(`select option.${deleteClass}`).forEach(el => el.remove());
  for (let item of data.thicknesses) {
    let optionTemplate = `<option value="${item.id}" class="${deleteClass}">${item.name}</option>`;
    formThickness.querySelector('select').insertAdjacentHTML('beforeend', optionTemplate);
  }

  formColor.querySelectorAll(`select option.${deleteClass}`).forEach(el => el.remove());
  for (let item of data.colors) {
    let optionTemplate = `<option value="${item.id}" class="${deleteClass}">${item.name}</option>`;
    formColor.querySelector('select').insertAdjacentHTML('beforeend', optionTemplate);
  }
}

formThickness.querySelector('select').onchange = function() {
  let val = this.querySelector(`option[value="${this.value}"]`).innerHTML;

  document.querySelector('#thickness').innerHTML = val;
};

formColor.querySelector('select').onchange = function() {
  let val = this.querySelector(`option[value="${this.value}"]`).innerHTML;

  document.querySelector('#color').innerHTML = val;
};