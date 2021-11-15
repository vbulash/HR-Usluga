@extends('admin.layouts.layout')

@push('title') - @if($show) Карточка @else Редактирование @endif записи блога № {{ $blog->id }}@endpush

@section('body-params')
	data-editor="DecoupledDocumentEditor" data-collaboration="false"
@endsection

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>@if($show) Карточка @else Редактирование @endif записи блога № {{ $blog->id }}</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
						</div>
						<!-- /.card-header -->

						<form role="form" method="post" name="blog-create" id="blog-create"
							  action="{{ route('blog.update', ['blog' => $blog->id]) }}"
							  enctype="multipart/form-data">
							@csrf
							@method('PUT')

							<input type="hidden" name="show" id="show" value="{{ $show }}">

							<div class="card-body">
								{{-- Название записи --}}
								<div class="form-group">
									<label for="name">Название записи</label>
									<input type="text" id="name" name="name" class="form-control"
										   value="{{ $blog->name }}" @if($show) disabled @endif>
								</div>

								{{-- Псевдоним записи --}}
								<div class="form-group">
									<label for="slug">Псевдоним записи</label>
									<input type="text" id="slug" name="slug" class="form-control"
										   value="{{ $blog->slug }}" @if($show) disabled @endif>
								</div>

								{{-- Краткий текст записи (дайджест) --}}
								<div class="form-group">
									<label for="digest" class="mb-2">Краткий текст записи</label>
									<textarea class="form-control" id="digest" name="digest"
											  rows="5" @if($show) disabled @endif>{{ $blog->digest }}</textarea>
								</div>

								{{-- Полный текст записи --}}
								<input type="hidden" id="description" name="description">
								<div class="form-group">
									<label for="editor" class="mb-2">Полный текст записи</label>
									<div class="centered">
										<div class="row">
											<div class="document-editor__toolbar"></div>
										</div>
										<div class="row row-editor">
											<div class="editor"></div>
										</div>
									</div>
								</div>

								{{-- Дата публикации записи блога --}}
								<div class="form-group date col-lg-3 col-xs-12">
									<label for="publish">Дата публикации записи</label>
									<input type="text" class="form-control @error('publish') is-invalid @enderror"
										   id="publish" name="publish" value="{{ $blog->publish }}"
										   @if($show) disabled @endif>
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>

								{{-- Изображение записи--}}
								<div class="form-group col-lg-3 col-xs-12">
									<label
										for="image">Изображение записи</label>
									@if(!$show)
										<input type="file" id="image" name="image"
											   accept="image/*"
											   class="image-file mb-4 form-control"
											   onchange="readImage(this)">
									@endif
									<div>
										<img id="preview_image"
											 src="@if($blog->image) /uploads/{{ $blog->image }} @endif" alt=""
											 class="image-preview">
										@if(!$show)
											<a href="javascript:void(0)"
											   id="clear_image"
											   data-preview="preview_image"
											   class="btn btn-primary mt-3 mb-3 image-clear"
											   @if(!$blog->image) style="display:none;" @endif>Очистить</a>
										@endif
									</div>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								@if(!$show)
									<button type="submit" class="btn btn-primary" id="submit">Сохранить</button>
								@endif
							</div>
						</form>

					</div>
					<!-- /.card -->

				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection

@once
	@push('styles')
		<link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5/ckeditor.css') }}">
	@endpush

	@push('scripts')
		<script src="{{ asset('assets/admin/plugins/ckeditor5/ckeditor.js') }}"></script>
	@endpush
@endonce

@push('scripts.injection')
	<script>
		DecoupledDocumentEditor
			.create(document.querySelector('.editor'), {
				toolbar: {
					items: [
						'heading',
						'|',
						'fontSize',
						'fontFamily',
						'|',
						'fontColor',
						'fontBackgroundColor',
						'|',
						'bold',
						'italic',
						'underline',
						'strikethrough',
						'|',
						'alignment',
						'|',
						'numberedList',
						'bulletedList',
						'|',
						'outdent',
						'indent',
						'|',
						'todoList',
						'link',
						'blockQuote',
						//'imageUpload',
						'insertTable',
						'mediaEmbed',
						'|',
						'undo',
						'redo'
					]
				},
				language: 'ru',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
				licenseKey: '',
				placeholder: 'Введите текст...',
			})
			.then(editor => {
				window.editor = editor;

				document.querySelector('.document-editor__toolbar').appendChild(editor.ui.view.toolbar.element);
				document.querySelector('.ck-toolbar').classList.add('ck-reset_all');

				editor.setData('{!! str_replace("\r\n", "<br/>", $blog->description) !!}');
				@if($show)
					editor.isReadOnly = true;
				@endif
			})
			.catch(error => {
				console.error('Oops, something went wrong!');
				console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
				console.warn('Build id: ebmrqv6vfk7t-u9490jx48w7r');
				console.error(error);
			});

		document.getElementById('blog-create').addEventListener('submit', event => {
			document.getElementById('description').value = editor.getData();
		});

		function readImage(input) {
			if (input.files && input.files[0]) {
				let reader = new FileReader();
				reader.onload = function (event) {
					let preview_image = document.getElementById('preview_image');
					preview_image.setAttribute('src', event.target.result.toString());
					preview_image.style.display = 'block';
					document.getElementById('clear_image').style.display = 'block';
				};
				reader.readAsDataURL(input.files[0]);
			}
		}

		document.getElementById('clear_image').addEventListener('click', event => {
			document.getElementById('image').value = '';
			let preview_image = document.getElementById('preview_image');
			preview_image.setAttribute('src', '');
			preview_image.style.display = 'none';
			document.getElementById('clear_image').style.display = 'none';
		});

		document.addEventListener('DOMContentLoaded', () => {
			//document.getElementById('preview_image').style.display = 'none';
		});
	</script>
@endpush
