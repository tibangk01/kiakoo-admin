{!! Form::open(['method' => 'POST', 'route' => 'login']) !!}

<div class="input-group mb-3">

    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ex: email@server.com']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>

</div>

<div class="input-group mb-3">

    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mot de passse']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-7">

        <div class="icheck-primary">

            {!! Form::checkbox('remember', null, null, ['id' => 'remember']) !!}

            <label for="remember">
                Se souvenir de moi
            </label>

        </div>

    </div>

    <div class="col-5">
        {!! Form::submit('Connexion', ['class' => 'btn btn-primary btn-block']) !!}
    </div>

</div>

{!! Form::close() !!}

@if (Route::has('password.request'))
<p class="mb-0 mt-2">
    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
</p>
@endif

{{-- @if (Route::has('register'))
<p class="mb-0">
    <a href="{{ route('register') }}">Pas encore inscrit ?</a>
</p>
@endif --}}
