{!! Form::open(['method' => 'POST', 'route' => 'register']) !!}

{{-- <div class="input-group mb-3">

    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nom']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>

</div> --}}

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

<div class="input-group mb-3">

    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirmation de Mot de passse']) !!}

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-8"></div>

    <div class="col-4">
        {!! Form::submit("S'inscrire", ['class' => 'btn btn-primary btn-block']) !!}
    </div>

</div>

{!! Form::close() !!}

@if (Route::has('login'))
<p class="mt-3">
    <a href="{{ route('login') }}">Connexion</a>
</p>
@endif
