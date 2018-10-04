@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Fout!</h4>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
@endif
@if (Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Gelukt!</h4>
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif