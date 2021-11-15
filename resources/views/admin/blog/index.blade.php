@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Блог</h1>
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
                            <h3 class="card-title">Записи блога</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Добавить
                                запись блога </a>
                            @if (count($blog))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="blog_table"
                                           style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
											<th>Опубликовано</th>
                                            <th>Псевдоним</th>
											<th>Название записи</th>
                                            <th>Краткий текст</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            @else
                                <p>Записей блога пока нет...</p>
                            @endif
                        </div>
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
    @if (count($blog) > 0)
        @push('styles')
            <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables/datatables.css') }}">
        @endpush

        @push('scripts')
            <script src="{{ asset('assets/admin/plugins/datatables/datatables.js') }}"></script>
        @endpush
    @endif
@endonce

@if(count($blog) > 0)
    @push('scripts.injection')
        <script>
			function clickDelete(id) {
				if(window.confirm('Удалить запись блога № ' + id + ' ?')) {
					$.ajax({
						method: 'DELETE',
						url: "{{ route('blog.destroy', ['blog' => '0']) }}",
						data: {
							id: id,
						},
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						success: () => {
							window.datatable.ajax.reload();
						}
					});
				}
			}

            $(function () {
                window.datatable = $('#blog_table').DataTable({
                    language: {
                        "url": "{{ asset('assets/admin/plugins/datatables/lang/ru/Russian.json') }}"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('blog.index.data') !!}',
                    responsive: true,
                    columns: [
                        {data: 'id', name: 'id', responsivePriority: 1},
						{data: 'publish', name: 'publish', responsivePriority: 1},
                        {data: 'slug', name: 'slug', responsivePriority: 1},
                        {data: 'name', name: 'name', responsivePriority: 2},
						{data: 'digest', name: 'digest', responsivePriority: 3, sortable: false, className: 'wrap'},
                        {
                            data: 'action',
                            name: 'action',
                            sortable: false,
                            responsivePriority: 1,
                            className: 'no-wrap dt-actions'
                        }
                    ]
                });
            });
        </script>
    @endpush
@endif

