@extends('layouts.app')

@section('title', "Gebruikers")

@section('page-title', "Gebruikers")

@section('style')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
@endsection

@section('content')
    @if (count($errors))
        <div class="row">
            @foreach($errors->all() as $error)
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p>{{ $error }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="row" style="margin-bottom: 20px; float: right;">
        <div class="col-md-12">
            <button class="btn btn-success"><i class="fa fa-plus"></i> Gebruiker Toevoegen</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Huidig Senaat</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Gebruikersnaam</th>
                            <th>Naam</th>
                            <th>Functie</th>
                            <th>Gemaakte Contracten</th>
                        </tr>
                        @foreach($users->where('created_at', '>', \Carbon\Carbon::createFromDate(date('Y'), 9, 1)) as $senateUser)
                            @if($senateUser->isAdmin())
                                @continue
                            @endif
                            <tr>
                                <td>{{ $senateUser->email }}</td>
                                <td>{{ $senateUser->name }}</td>
                                <td>{{ $senateUser->transRole($senateUser->role) }}</td>
                                <td><span class="label label-success">{{ $senateUser->contracts()->get()->count() }}</span></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Overige Gebruikers</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Gebruikersnaam</th>
                            <th>Naam</th>
                            <th>Functie</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->isAdmin())
                                <tr>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->transRole() }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Oud Senaat</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Gebruikersnaam</th>
                            <th>Naam</th>
                            <th>Functie</th>
                            <th>Gemaakte Contracten</th>
                        </tr>
                        @foreach($users->where('created_at', '<', \Carbon\Carbon::createFromDate(date('Y'), 9, 1)) as $user)
                            @if($user->isAdmin())
                                @continue
                            @endif
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->transRole($user->role) }}</td>
                                <td><span class="label label-success">{{ $user->contracts()->get()->count() }}</span></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- date-range-picker -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
@endsection