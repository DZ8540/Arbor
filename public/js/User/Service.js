let serviceImage = document.querySelector('#serviceImage').value;

class Service {
  id = null;
  item = null;
  count = 1;
  countInput = null;
  template = null;
  decrementElem = null;
  incrementElem = null;
  deleteElem = null;

  sideA = 0;
  sideAElem = null;

  sideB = 0;
  sideBElem = null;

  sideC = 0;
  sideCElem = null;

  sideD = 0;
  sideDElem = null;

  constructor(parent, id) {
    this.parent = parent;
    this.id = id;

    this.create();
    this.handle();
  }

  create() {
    this.template = `
      <div class="row row-cols-lg-2 mb-4 position-relative pt-5 service" id="${this.id}">
        <button class="position-absolute w-auto end-0 top-0 delete">
          <span>Удалить</span>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 6L18 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>

        <div class="mb-3 mb-lg-0">
          <img class="rounded-10 w-100 h-100 bg-gray-light p-3" src="${serviceImage}" alt="">
        </div>

        <div class="d-flex flex-column">
          <fieldset class="form-check align-items-center mb-3">
            <div class="position-relative flex-fill">
              <input class="form-control sideA" type="number" placeholder="0">
              <span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
            </div>
          </fieldset>
          <fieldset class="form-check align-items-center mb-3">
            <div class="position-relative flex-fill">
              <input class="form-control sideB" type="number" placeholder="0">
              <span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
            </div>
          </fieldset>
          <fieldset class="form-check align-items-center mb-3">
            <div class="position-relative flex-fill">
              <input class="form-control sideC" type="number" placeholder="0">
              <span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
            </div>
          </fieldset>
          </fieldset>
          <fieldset class="form-check align-items-center mb-3">
            <div class="position-relative flex-fill">
              <input class="form-control sideD" type="number" placeholder="0">
              <span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
            </div>
          </fieldset>

          <div class="d-flex flex-wrap mt-auto">
            <label class="fw-6 me-4 align-items-center mb-2 mb-lg-0" for="">Количество деталей:</label>
            <div class="quantity-el d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
              <button class="p-0 decrement" type="button">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.32568 8H13.659" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </button>
              <input class="bg-transparent border-0 text-white text-center fw-6 count" type="number" value="1" readonly>
              <button class="p-0 increment" type="button">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.99951 3.33337V12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M3.3335 8H12.6668" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
    this.parent.insertAdjacentHTML('afterbegin', this.template);
    this.item = document.querySelector(`#${this.id}`);
    this.countInput = this.item.querySelector('.count');
    this.decrementElem = this.item.querySelector('.decrement');
    this.incrementElem = this.item.querySelector('.increment');
    this.deleteElem = this.item.querySelector('.delete');

    this.sideAElem = this.item.querySelector('.sideA');
    this.sideBElem = this.item.querySelector('.sideB');
    this.sideCElem = this.item.querySelector('.sideC');
    this.sideDElem = this.item.querySelector('.sideD');
  }

  handle() {
    this.decrementElem.onclick = this.decrement.bind(this);
    this.incrementElem.onclick = this.increment.bind(this);

    this.deleteElem.onclick = this.delete.bind(this);

    this.sideAElem.oninput =
    this.sideBElem.oninput =
    this.sideCElem.oninput =
    this.sideDElem.oninput = this.sideHandler.bind(this);
  }
  
  sideHandler({ target }) {
    if (target.classList.contains('sideA'))
      this.sideA = target.value;
    else if (target.classList.contains('sideB'))
      this.sideB = target.value;
    else if (target.classList.contains('sideC'))
      this.sideC = target.value;
    else if (target.classList.contains('sideD'))
      this.sideD = target.value;
  }

  get() {
    return {
      sides: {
        sideA: this.sideA,
        sideB: this.sideB,
        sideC: this.sideC,
        sideD: this.sideD
      },
      count: this.count,
      id: this.id
    }
  }

  increment() {
    this.count++;
    this.countInput.value = this.count;
  }

  decrement() {
    if (this.count > 1) {
      this.count--;
      this.countInput.value = this.count;
    }
  }

  delete() {
    this.item.remove();
  }
}