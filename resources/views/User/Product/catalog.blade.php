@extends('User.Layouts.index')

@section('title', 'Каталог')

@section('content')
<div class="container mb-5 pb-xl-4">
	
  {{ Breadcrumbs::render('catalog') }}

	<h1 class="mb-4">Каталог</h1>
	<div class="row gx-xxl-5">

		<div class="col-lg-3 mb-4">
			<div class="catalogue-sidebar rounded-10">

        @foreach ($category_types as $category_type)
          @if ($category_type->categories->count())
            <div class="bg-dark text-white p-3 px-xxl-4 fw-6 fs-5">{{ $category_type->name }}</div>

            @foreach ($category_type->categories as $item)
              <a href="{{ route('user.category', $item->slug) }}"
                class="d-flex justify-content-between align-items-center position-relative border-bottom p-3 ps-xxl-5 pe-xxl-4">
                <span class="stretched-link">{{ $item->name }}</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9 18L15 12L9 6" stroke="#4B4B4B" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </a>  
            @endforeach
          @endif
          
        @endforeach
				
			</div>
		</div>

		<div class="col-lg-9 categ-section">

      @foreach ($category_types as $category_type)
        @if ($category_type->categories->count())
          <h4 class="fw-6 mb-4">{{ $category_type->name }}</h4>
          <div class="row row-cols-lg-3 gy-4 text-center h4 fw-5 pb-5">

            @foreach ($category_type->categories as $item)
              <div>
                <a href="{{ route('user.category', $item->slug) }}" class="rounded-30 CategoryCard position-relative">
                  <img class="w-100 h-100" src="{{ $item->image }}" alt="">
                  <span class="p-3 w-100 start-0 bottom-0 position-absolute stretched-link">{{ $item->name }}</span>
                </a>
              </div>  
            @endforeach
            
          </div>
        @endif
      @endforeach
			
		</div>
	</div>
</div>

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection