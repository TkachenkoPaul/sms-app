@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i>Ошибка</h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
                    </div>
        </div>
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
                                <h5 class="card-title m-0">Группы</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group mb-2">
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target="#modal-default">
                                                <i class="fa fa-plus"> </i> Добавить</button>
                                        </div>
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Добавить группу</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="add-group" method="POST"
                                                            action="{{ route('add-group') }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Имя группы:</label>
                                                                        <input name="name" type="text"
                                                                            class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                        <label>Описание </label>
                                                                        <textarea name="desc" class="form-control" rows="3" placeholder="Введите краткое описание группы"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Закрыть</button>
                                                        <button type="submit" form="add-group"
                                                            class="btn btn-primary">Добавить</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

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
