@extends('layouts.app')

@section('title', "Gebruikers")

@section('page-title', "Gebruikers")

@section('style')
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

    <!-- /.box-header -->
    <table-users
            api-users-url="{{ route('api.get.users') }}"
            api-user-save-url="{{ route('api.post.user.save') }}"
            api-user-create-url="{{ route('api.post.user.create') }}"></table-users>
    <!-- /.box-body -->

@endsection

@section('script')
@endsection