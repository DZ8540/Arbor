@extends('Admin.Layouts.index')

@section('title', 'Добавить товары')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Добавить товары из xml файла</h2>
			</div>

			<div class="panel-content">
				<div class="row">

					<form action="{{ route('admin.xml.products.add') }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
							<label for="images">Изображения товаров</label>
              <input type="file" id="images" name="images[]" class="form-control" multiple>
						</div>
            
            <div class="form-group">
							<label for="xml">XML файл с товарами</label>
              <input type="file" id="xml" name="xml" class="form-control">
						</div>

						<br>
            @csrf
						<button type="submit" class="btn btn-success">Добавить</button>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection