@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
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
                                <h5 class="card-title m-0">Источники</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group mb-4">
                                            <button type="button" class="btn btn-primary btn-block">
                                                <i class="fa fa-plus"> </i> Добавить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Описание</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>sms1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, enim
                                                        in mollitia soluta quidem similique dignissimos quia</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-success btn-block">Изменить</button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-block">Удалить</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>sms2</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, enim
                                                        in mollitia soluta quidem similique dignissimos quia</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-success btn-block">Изменить</button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-block">Удалить</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Описание</th>
                                                    <th>Действия</th>
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
