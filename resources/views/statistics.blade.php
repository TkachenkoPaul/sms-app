@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Статистика</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box elevation-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sms"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Альфа имя 1</span>
                                <span class="info-box-number">
                                    140
                                    <small>шт.</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box elevation-3 mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sms"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Альфа имя 2</span>
                                <span class="info-box-number">130 <small>шт.</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box elevation-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-comment-dots"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Очередь</span>
                                <span class="info-box-number">
                                    11
                                    <small>шт.</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Статистика</h5>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Имя</th>
                                            <th>Телефон</th>
                                            <th>Сообщение</th>
                                            <th>Статус</th>
                                            <th>Создано</th>
                                            <th>Изменено</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Петр Иванов</td>
                                            <td>0720001122</td>
                                            <td>Сообщение для членов группы номер 1</td>
                                            <td>Отправлено</td>
                                            <td>2022.04.21 08:00:00</td>
                                            <td>2022.04.21 08:01:00</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Петр Иванов</td>
                                            <td>0720001122</td>
                                            <td>Сообщение для членов группы номер 1</td>
                                            <td>В очереди</td>
                                            <td>2022.04.21 08:00:00</td>
                                            <td>2022.04.21 08:01:00</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Петр Иванов</td>
                                            <td>0720001122</td>
                                            <td>Сообщение для членов группы номер 1</td>
                                            <td>В очереди</td>
                                            <td>2022.04.21 08:00:00</td>
                                            <td>2022.04.21 08:01:00</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Петр Иванов</td>
                                            <td>0720001122</td>
                                            <td>Сообщение для членов группы номер 2</td>
                                            <td>В очереди</td>
                                            <td>2022.04.21 08:00:00</td>
                                            <td>2022.04.21 08:01:00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Имя</th>
                                            <th>Телефон</th>
                                            <th>Сообщение</th>
                                            <th>Статус</th>
                                            <th>Создано</th>
                                            <th>Изменено</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
