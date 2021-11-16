let form = document.querySelector('#form');

// Sorting
let sort = document.querySelector('#sort');

sort.onchange = function() {
  let showCount = this.querySelector('#showCount').value;
  let sorts = this.querySelectorAll('input');
  let sortChecked = 'reset';

  for (let item of sorts) {
    if (item.checked)
      sortChecked = item.value;
  }

  form.querySelector('#formSort').value = sortChecked;
  form.querySelector('#formShowCount').value = showCount;
  form.submit();
};
// Sorting

// Filter
let filters = document.querySelectorAll('.Filter');
let formColors = form.querySelector('#formColors');
let formThicknesses = form.querySelector('#formThicknesses');

for (let item of filters) {
  item.onclick = function() {
    let parent = null;

    switch (this.name) {
      case 'color':
        parent = formColors;

        break;
      case 'thickness':
        parent = formThicknesses;
        
        break;
    }

    let arr = JSON.parse(parent.value);

    if (arr.includes(this.value))
      arr = arr.filter(el => el != this.value);
    else
      arr.push(this.value);
    
    parent.value = JSON.stringify(arr);

    form.submit();
  }
}
// Filter

// Show more
let currentPageLink = document.querySelector('#currentPageLink').value;
let currentShowCount = document.querySelector('#currentShowCount').value;
let page = document.querySelector('#currentPage').value;

let showMore = document.querySelector('#showMore').onclick = () => {
  loadMore(page);
  page++;
};
   
function loadMore(page) {
  $.ajax({
    url: `${currentPageLink}&page=${page}`,
    type: 'get',
    datatype: 'html',
    success: (data) => {
      // console.log(data)
      if (data.length) {
        for (let item of data) {
          let template = `
            <div class="position-relative">
              <div class="card">
                <img class="card-img-top"
                  src="${item.image}"
                  alt="${item.name}">
                <div class="card-body d-flex flex-column d-flex flex-column p-2 p-xxl-3 text-center">
                  <a href="${item.route}" class="card-title stretched-link fw-6">${item.name}</a>
                  <div class="card-subtitle">${item.format}</div>
                  <div class="small text-muted text-end my-2">Код: ${item.code}</div>
                  <div class="fw-6 mb-3">${item.price} руб./шт</div>
                  <div class="card-hov flex-column justify-content-between mt-auto">
                    <div
                      class="rounded-pill px-2 px-lg-3 d-flex align-items-center justify-content-center border b-accent mb-2">
                      <button class="px-0">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M3.77246 8H13.1058" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </button>
                      <div>
                        <input class="bg-transparent border-0 text-center fw-6" type="number" value="1">
                      </div>
                      <button class="px-0">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8.56055 3.33337V12.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path d="M3.89355 8H13.2269" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </button>
                    </div>
                    <button class="fs-6 bttn open-sans p-2 px-3">
                      <span>В корзину</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          `;
  
          $("#products").append(template);
        }
      }
    }
  });
}
// Show more