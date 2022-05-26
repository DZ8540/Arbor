<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu2">
	<div class="offcanvas-header flex-column align-items-start border-bottom">
		<button class="d-flex align-items-center mb-3" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
			<svg class="me-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M12.6667 8L3.33341 8" stroke="black" stroke-width="2" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M8 12.6667L3.33333 8.00008L8 3.33341" stroke="black" stroke-width="2" stroke-linecap="round"
					stroke-linejoin="round" />
			</svg>
			<span>Назад</span>
		</button>
		<div class="c-accent">Каталог</div>
	</div>
	<div class="offcanvas-body px-0">

    {{-- <div class="accordion" id="accordionExample">
      @foreach ($category_types as $item)

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">
              {{ $item->name }}
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
            <div class="accordion-body">
              <ul class="list-unstyled">
                @foreach ($item->categories as $category)

                  <li class="p-3 border-bottom">
                    <a href="{{ route('user.category', $category->slug) }}">{{ $category->name }}</a>
                  </li>

                @endforeach
              </ul>

            </div>
          </div>
        </div>

      @endforeach
    </div> --}}

    <div class="accordion" id="accordionExample">
      @foreach ($category_types as $item)

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{ $item->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="false" aria-controls="collapse{{ $item->id }}">
              {{ $item->name }}
            </button>
          </h2>
          <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <ul class="list-unstyled">
                @foreach ($item->categories as $category)
  
                  <li class="p-3 border-bottom">
                    <a href="{{ route('user.category', $category->slug) }}">{{ $category->name }}</a>
                  </li>
  
                @endforeach
              </ul>
            </div>
          </div>
        </div>

      @endforeach
    </div>
		
	</div>
</div>










