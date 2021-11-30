let parent = document.querySelector('#services');
let addBtn = document.querySelector('#addService');
let servicesAdd = document.querySelector('#servicesAdd');
let formSides = document.querySelector('#formSides');
let productServices = document.querySelector('#productServices');

let counter = 0;
let services = [];
addBtn.onclick = () => {
  services.push(new Service(parent, `service${counter}`));
  counter++;
};

let servicesCount = 0;
servicesAdd.onclick = () => {
  let activeServices = parent.querySelectorAll('.service');
  let newActiveServices = [];

  // Get only active services
  for (let service of activeServices) {
    for (let item of services) {
      let { id } = item.get();

      if (id == service.id) 
        newActiveServices.push(item);
    } 
  }
  // Get only active services

  let servicesData = JSON.parse(formSides.value);
  for (let i = 0; i < newActiveServices.length; i++) {
    let data = newActiveServices[i].get();
    servicesCount++;

    let template = `
      <div class="border-top p-3 px-xl-4 px-xxl-5">
        <div class="d-flex justify-content-between mb-4">
          <div>${servicesCount} ДЕТАЛЬ</div>
          <div>х ${data.count} шт.</div>
        </div>
        <div class="d-flex justify-content-between mb-4">
          <div class="fw-normal">Распиловка</div>
          <div>
            <div class="mb-1">a. ${data.sides.sideA} мм</div>
            <div class="mb-1">b. ${data.sides.sideB} мм</div>
            <div class="mb-1">c. ${data.sides.sideC} мм</div>
            <div>d. ${data.sides.sideD} мм</div>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div class="fw-normal">Кромление</div>
          <div>
            <div>Стороны: a, b, c, d</div>
          </div>
        </div>
      </div>
    `;  

    productServices.insertAdjacentHTML('beforeend', template);
    servicesData.push(data);
    newActiveServices[i].delete();
  }

  formSides.value = JSON.stringify(servicesData);
}