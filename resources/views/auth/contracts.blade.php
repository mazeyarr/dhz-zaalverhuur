@extends('layouts.app')

@section('title', "Contracten")

@section('page-title', "Contracten")

@section('style')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Contract opstellen</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'admin.contracts.save']) !!}
                    <div class="box-body">
                        <h3>Contractant</h3>
                        <div class="form-group">
                            <label for="name">Naam</label>
                            {{--{!! Form::email('email', old('email'), ['id' => "email", 'class' => "form-control", 'placeholder' => "Email"]) !!}--}}
                            {!! Form::text('name', old('name'), ['id' => "name", 'class' => "form-control"]) !!}
                        </div>
                        <div class="form-group">
                            <label for="name">Adres</label>
                            {!! Form::text('adres', old('adres'), ['id' => "adres", 'class' => "form-control"]) !!}
                        </div>
                        <div class="form-group">
                            <label for="name">Telefoonnummer</label>
                            {!! Form::tel('phone', old('phone'), ['id' => "phone", 'class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 5rem;">
                                <input type="radio" name="business" class="flat-red optionBusiness" checked data-type="private">
                                Particulier
                            </label>
                            <label>
                                <input type="radio" name="business" class="flat-red optionBusiness" data-type="business">
                                Bedrijf
                            </label>
                        </div>
                        <div id="showIfBusiness" style="display: none;">
                            <hr>
                            <h3 class="box-title">Vertegenwoordiger</h3>
                            <div class="form-group">
                                <label for="name">Naam</label>
                                {{--{!! Form::email('email', old('email'), ['id' => "email", 'class' => "form-control", 'placeholder' => "Email"]) !!}--}}
                                {!! Form::text('name-representative', old('name-representative'), ['id' => "name-representative", 'class' => "form-control"]) !!}
                            </div>
                            <div class="form-group">
                                <label for="name">Adres</label>
                                {!! Form::text('adres-representative', old('adres-representative'), ['id' => "adres-representative", 'class' => "form-control"]) !!}
                            </div>
                            <div class="form-group">
                                <label for="name">Telefoonnummer</label>
                                {!! Form::tel('phone-representative', old('phone-representative'), ['id' => "phone-representative", 'class' => "form-control"]) !!}
                            </div>
                            <hr>
                        </div>
                        <div class="form-group">
                            <label>Reservering</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('reservation', old('reservation'), ['id' => "reservationtime", 'class' => "form-control pull-right"]) !!}
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Begintijd versieren:</label>
                                <div class="input-group">
                                    <input name="decoratingtime" type="text" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="name">Aantal gasten</label>
                            {!! Form::number('guests', old('guests'), ['id' => "guests", 'class' => "form-control"]) !!}
                        </div>

                        <label for="rent-room">Zaalverhuur</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                            {!! Form::text('rent-room', 175, ['id' => "rent-room", 'class' => "form-control"]) !!}
                        </div>
                        <br>

                        <label for="rent-room">Beveiliging</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                            {!! Form::text('rent-security', 190, ['id' => "rent-security", 'class' => "form-control"]) !!}
                        </div>
                        <hr>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input name="sound-system" type="checkbox" class="flat-red room-options">
                                Geluidsinstallatie - 35 euro
                            </label><br>
                            <label>
                                <input name="dj" type="checkbox" class="flat-red room-options">
                                DJ (0-4) - 150 euro
                            </label><br>
                            <label>
                                <input name="dj-hours" type="checkbox" class="flat-red room-options">
                                DJ elk extra uur - 30 euro
                            </label><br>
                            <label>
                                <input name="pioneer-cd" type="checkbox" class="flat-red room-options">
                                Twee Pioneer CDJ-850 CD spelers met USB ingang - 40 euro
                            </label><br>
                            <label>
                                <input name="smokemachine" type="checkbox" class="flat-red room-options">
                                Rookmachine - 10 euro
                            </label><br>
                            <label>
                                <input name="lasermachine" type="checkbox" class="flat-red room-options">
                                Lasermachine - 10 euro
                            </label><br>
                            <label>
                                <input name="beamer" type="checkbox" class="flat-red room-options">
                                Beamer + scherm - 25 euro
                            </label><br>
                            <label>
                                <input name="standup-tables" type="checkbox" class="flat-red room-options">
                                Statafels - 10 euro
                            </label><br>
                            <label>
                                <input name="stage-parts" type="checkbox" class="flat-red room-options">
                                Podiumdelen - 25 euro
                            </label><br>
                            <label>
                                <input name="furniture" type="checkbox" class="flat-red room-options">
                                Tafels en banken - 15,-
                            </label><br>
                        </div>
                        <hr>

                        <label for="rent-room">Afkoop munten</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                            {!! Form::text('buyin-coins', "00,00", ['id' => "rent-security", 'class' => "form-control"]) !!}
                        </div>
                        <br>

                        <label for="rent-room">Afkoop drank</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                            {!! Form::text('buyin-liqour', "00,00", ['id' => "rent-security", 'class' => "form-control"]) !!}
                        </div>
                        <br>

                        <label for="rent-room">Borg</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                            {!! Form::text('deposit', 190, ['id' => "rent-security", 'class' => "form-control"]) !!}
                        </div>
                        <br>

                        <label for="rent-room">Minimale baromzet</label>
                        <div class="input-group">
                            <span class="input-group-addon">&euro;</span>
                            {!! Form::text('min-bar-revenue', "00,00", ['id' => "rent-security", 'class' => "form-control"]) !!}
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Genereer contract</button>
                    </div>
                {!! Form::close() !!}
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"].optionBusiness').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            });

            $('input[type="checkbox"].room-options').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            });

            $('input[type="radio"].optionBusiness').on('ifChecked', function(event){
                if(event.target.getAttribute("data-type") === "business"){
                    $('#showIfBusiness').show('fast');
                }else{
                    $('#showIfBusiness').hide('fast');
                }
            });

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false,
                showMeridian: false
            })

            $('#reservationtime').daterangepicker({
                "showDropdowns": true,
                "timePicker": true,
                "timePicker24Hour": true,
                "autoApply": true,
                autoUpdateInput: true,
                "locale": {
                    "format": "MM/DD/YYYY HH:MM",
                    "separator": " - ",
                    "applyLabel": "Bevestigen",
                    "cancelLabel": "Annuleren",
                    "fromLabel": "Van",
                    "toLabel": "Tot",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Ma",
                        "Di",
                        "Wo",
                        "Do",
                        "Vr",
                        "Za",
                        "Zo"
                    ],
                    "monthNames": [
                        "januari",
                        "februari",
                        "maart",
                        "april",
                        "mei",
                        "juni",
                        "juli",
                        "augustus",
                        "september",
                        "oktober",
                        "november",
                        "december"
                    ],
                    "firstDay": 1
                },
                "linkedCalendars": false,
                "opens": "center"
            });

            $('#decoratingtime').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "timePicker24Hour": true,
                "linkedCalendars": false,
                "autoUpdateInput": false,
            });
        })
    </script>
@endsection