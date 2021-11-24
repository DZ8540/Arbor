let products = document.querySelectorAll('.product');
for (let item of products) {
  let input = item.querySelector('input');
  let decrement = item.querySelector('.decrement');
  let increment = item.querySelector('.increment');
  let count = item.querySelector('input[name="count"]');

  increment.onclick = () => {
    ++input.value;
    count.value = input.value;
  }

  decrement.onclick = () => {
    if (input.value > 1) {
      --input.value;
      count.value = input.value;
    }
  }
}