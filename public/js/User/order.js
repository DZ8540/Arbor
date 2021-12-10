$(document).ready(() => {
  let elem = document.querySelector('input[name="payer_type"]');
  elem.checked = true;
  elem.dispatchEvent(new Event('change'));
});

function changeFieldset(val, name, formId) {
  document.querySelectorAll('#' + formId + ' fieldset.' + name).forEach(function(item) {
    if (item.id != val) {
      item.classList.add('d-none');
      item.setAttribute('disabled', 'disabled');
    } else {
      item.classList.remove('d-none');
      item.removeAttribute('disabled');
    }
  });
}