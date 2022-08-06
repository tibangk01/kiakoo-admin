<div class="col-md-12">

    @if (session('password_update_success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('password_update_success') }}
        </div>
    @endif

    @if (session('password_update_error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('password_update_error') }}
        </div>
    @endif

</div>

<div class="col-md-12">

    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title">Modifier Votre Mot De Passe</h3>
        </div>

        {!! Form::open(['method' => 'put', 'route' => 'password.update']) !!}

        <div class="card-body">

            <div class="form-group">

                {!! Form::label('old_password', 'Entrer votre ancien mot de passe') !!}

                <div class="input-group">

                    {!! Form::password('old_password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ancien mot de passe']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('old_password') }}</span>

            </div>

            <div class="form-group">

                {!! Form::label('new_password', 'Entrer votre nouveau mot de passe') !!}

                <div class="input-group">

                    {!! Form::password('new_password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nouveau mot de passe']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('new_password') }}</span>

            </div>

            <div class="form-group">

                {!! Form::label('new_password_confirmation', 'Confirmer votre nouveau mot de passe') !!}

                <div class="input-group">

                    {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirmation du nouveau mot de passe']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('new_password_confirmation') }}</span>

            </div>

        </div>

        <div class="card-footer">

            {!! Form::submit('Enregistrer', ['class' => 'btn btn-info float-right']) !!}

        </div>

        {!! Form::close() !!}

    </div>

</div>
