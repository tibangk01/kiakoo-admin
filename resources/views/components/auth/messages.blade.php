<div class="row justify-content-center">

    @if ($errors->any())
        <div class="col-md-12 text-danger text-justify">
            {!! implode('', $errors->all(':message</br>')) !!}
        </div>
    @endif

    @if (session('status'))
        <div class="col-md-12 text-success text-justify">
            {{ session('status') }}
        </div>
    @endif

</div>
