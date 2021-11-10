@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @php
        //use Illuminate\Support\Facades\Redis;
        //Redis::set('test', 'Test');
    @endphp

    <!-- Блог -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Блог</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Свернуть / развернуть">
                        <i class="fas fa-minus"></i></button>
                    {{--                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"--}}
                    {{--                            title="Remove">--}}
                    {{--                        <i class="fas fa-times"></i></button>--}}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                </div>
            </div>
            <!-- /.card-body -->
        {{--            <div class="card-footer">--}}
        {{--                Footer--}}
        {{--            </div>--}}
        <!-- /.card-footer-->
        </div>
        <!-- /.Блог -->

    </section>
    <!-- /.content -->
@endsection
