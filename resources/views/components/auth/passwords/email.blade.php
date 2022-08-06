{!! Form::open(['method' => 'POST', 'route' => 'password.email']) !!}

<div class="input-group mb-3">

    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ex: email@server.com', 'autofocus' => '']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-2"></div>

    <div class="col-10">
        {!! Form::submit('Demander un nouveau mot de passe', ['class' => 'btn btn-primary btn-block']) !!}
    </div>

</div>

{!! Form::close() !!}

<p class="mt-3">
    <a href="{{ route('login') }}">Connexion</a>
</p>
