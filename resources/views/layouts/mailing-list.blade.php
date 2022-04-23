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
                                <h5 class="card-title m-0">Альфа имя 1</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <form method="POST" action="#" class="form-inline">
                                            <div class="input-group mr-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation">
                                            </div>
                                            <div class="form-group mr-3">
                                                <select class="form-control select2bs4">
                                                    <option value="0">Все</option>
                                                    <option value="1">Источник 1</option>
                                                    <option value="2">Источник 2</option>
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
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop
