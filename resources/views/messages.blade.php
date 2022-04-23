@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Рассылка</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">{{ $header }}</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm btn-primary" >
                                    <i class="fas fa-plus"></i> Создать
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <form method="GET" action="{{ route('messages')}}" class="form-inline">
                                            <div class="input-group mr-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="date" class="form-control float-right" id="reservation">
                                            </div>
                                            <div class="form-group mr-3">
                                                <select class="form-control select2bs4" name='src'>
                                                    <option value="0">Все</option>
                                                    @foreach ($sources as $source)
                                                        <option value="{{ $source->id }}">{{ $source->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Показать</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Сообщение</th>
                                                    <th>Статус</th>
                                                    <th>Создал</th>
                                                    <th>Источник</th>
                                                    <th>Создано</th>
                                                    <th>Изменено</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($messages ?? " " as $message )
                                                    <tr>
                                                        <td>{{ $message->id }}</td>
                                                        <td>{{ $message->name }}</td>
                                                        <td>{{ $message->phone }}</td>
                                                        <td>{{ $message->message }}</td>
                                                        <td>{{ $message->state }}</td>
                                                        <td>{{ $message->admin->name }}</td>
                                                        <td>{{ $message->source->name }}</td>
                                                        <td>{{ $message->created_at }}</td>
                                                        <td>{{ $message->updated_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Сообщение</th>
                                                    <th>Статус</th>
                                                    <th>Создал</th>
                                                    <th>Источник</th>
                                                    <th>Создано</th>
                                                    <th>Изменено</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop
