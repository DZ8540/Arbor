let form = document.querySelector('#newsForm');
form.onchange = form.submit;

let dates = form.querySelector('#dates');
let currentDateFromInput = document.querySelector('#currentDateFromInput').value;
for (let i = 0; i < 3; i++) {
  let now = new Date().getFullYear() - i;

  dates.insertAdjacentHTML('beforeend', `
    <label class="active px-0 pb-2 pb-lg-4 me-3 text-start" role="button">
      <input type="radio" name="date" value="${now}" ${currentDateFromInput == now ? 'checked' : ''} class="d-none" />
      ${now}
    </label>
  `);

  console.log(currentDateFromInput == now);
}

let currentPageLink = document.querySelector('#currentPageLink').value;
let page = 1;

let showMore = document.querySelector('#showMore').onclick = () => {
  loadMore(page);
  page++;
};
   
function loadMore(page) {
  $.ajax({
    url: `${currentPageLink}?page=${page}`,
    type: 'get',
    datatype: 'html',
    success: (data) => {
      for (let item of data) {
        let template = `
          <div class="row mb-4">
            <div class="new-img col-lg-4 pe-xxl-4 mb-3 mb-lg-0">
              <img class="w-100 h-100 rounded-10" src="${item.image}" alt="">
            </div>
            <div class="col-sm-7 col-lg-8 d-flex flex-column pb-xxl-3">
              <span class="text-muted">${item.itemDate}</span>
              <div class="mt-2 mt-xxl-5 mb-auto">
                <h5 class="fw-6 mb-xl-3">${item.name}</h5>
                <p>${item.description}</p>
              </div>
              <a href="${item.route}" class="c-accent fw-5 roboto">
                <span>Подробнее</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M12 5L19 12L12 19" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        `;

        $("#news").append(template);
      }
    }
  });
}

// !!! Remove this code if it dont need
// let paginationItems = document.querySelectorAll('[data-id="paginationItems"]');

// let pagination = {
//   items: paginationItems,
//   removeItem() {
    
//   }
// };
// paginationItems[0].parentElement.removeChild(paginationItems[0]);