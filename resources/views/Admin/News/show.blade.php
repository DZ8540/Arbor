@extends('Admin.Layouts.index')

@section('title', 'Новость' . $news->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Новость - {{ $news->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
            <div class="form-group">
							<label for="slug">Отображение в адресной строке</label>
							<input type="text" class="form-control" disabled value="{{ $news->slug }}">
						</div>

						<div class="form-group">
							<label for="name">Название</label>
							<input type="text" class="form-control" disabled value="{{ $news->name }}">
						</div>

            <div class="form-group">
							<label for="description">Описание</label>
							<textarea cols="30" rows="10" class="form-control" disabled>{{ $news->description }}</textarea>
						</div>

            <div class="form-group">
							<label for="image" class="control-label">Главное изображение новости</label>
							<br>
							<img src="{{ $news->image }}" alt="" width="200px">
							<br>
						</div>

            <div class="form-group">
							<label for="gallery" class="control-label">Остальные изображения новости</label>
							<br>
							<div style="display: flex; overflow: scroll">
                @foreach($news->newsImages as $item)
									<div style="margin-right: 20px; position: relative">
										<img src="{{ Storage::url($item->image) }}" width="200px" alt="">
									</div>
								@endforeach
              </div>
							<br>
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection