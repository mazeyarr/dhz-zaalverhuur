@extends('layouts.app')

@section('title', "Mijn profiel")

@section('page-title', "Mijn profiel")

@section('style')
@endsection

@section('content')
    @include('partials.auth._notification')
    <div class="row">
        <div class="col-md-6">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ $user->email }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Dispuut</b> <span class="pull-right">-</span>
                        </li>
                        <li class="list-group-item">
                            <b>Jaar</b> <span class="pull-right">-</span>
                        </li>
                        <li class="list-group-item">
                            <b>Gemaakte Contracten</b> <span class="pull-right">{{ $user->contracts }}</span>
                        </li>
                    </ul>
                    <hr class="style-eight">
                    <form action="{{ route('admin.user.password.update', $user->id) }}">
                        <div class="form-group">
                            <label for="old_password">Oud wachtwoord</label>
                            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Voer hier uw oude wachtwoord in">
                        </div>
                        <div class="form-group">
                            <label for="new_password">Nieuw wachtwoord</label>
                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Voer hier uw nieuwe wachtwoord in">
                        </div>
                        <div class="form-group">
                            <label for="rep_password">Herhaal wachtwoord</label>
                            <input type="password" class="form-control" name="rep_password" id="rep_password" placeholder="Herhaal het nieuwe wachtwoord">
                        </div>
                        <button class="btn btn-success btn-block"><b>Opslaan</b></button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('script')
@endsection