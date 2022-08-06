{!! Form::open(['method' => 'POST', 'route' => 'password.update']) !!}


{!! Form::hidden('token', request()->token) !!}

<div class="input-group mb-3">

    {!! Form::email('email', request()->email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ex: email@server.com']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>

</div>

<div class="input-group mb-3">

    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nouveau Mot de passse', 'autofocus' => '']) !!}
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>

</div>

<div class="input-group mb-3">

    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirmation de Mot de passse']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-3"></div>

    <div class="col-9">
        {!! Form::submit('Réinitialiser le mot de passe', ['class' => 'btn btn-primary btn-block']) !!}
    </div>

</div>

{!! Form::close() !!}

<p class="mt-3">
    <a href="{{ route('login') }}">Connexion</a>
</p>
