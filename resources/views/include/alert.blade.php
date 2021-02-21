@if ($message = Session::get('success'))

    <div class="alert alert-default-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-check"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('error'))

    <div class="alert alert-default-danger alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-ban"></i> {{ $message }}

    </div>

    @endif
