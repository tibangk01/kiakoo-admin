<div class="col-md-12">
    @if (session('email_update_error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('email_update_error') }}
        </div>
    @endif

</div>

<div class="col-md-12">

    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title">Modifier Votre Adresse Mail</h3>
        </div>

        {!! Form::open(['method' => 'put', 'route' => 'email.update']) !!}

        <div class="card-body">

            <div class="form-group">

                {!! Form::label('old_email', 'Entrer votre ancienne adresse mail') !!}

                <div class="input-group">

                    {!! Form::email('old_email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ancienne adresse mail']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('old_email') }}</span>

            </div>

            <div class="form-group">

                {!! Form::label('new_email', 'Entrer votre nouvelle adresse mail') !!}

                <div class="input-group">

                    {!! Form::email('new_email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nouvelle adresse mail']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('new_email') }}</span>

            </div>

            <div class="form-group">

                {!! Form::label('new_email_confirmation', 'Confirmer votre nouvelle adresse mail') !!}

                <div class="input-group">

                    {!! Form::email('new_email_confirmation', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirmer votre nouvelle adresse mail']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('new_email_confirmation') }}</span>

            </div>

            <div class="form-group">

                {!! Form::label('password', 'Confirmer votre mot de passe') !!}

                <div class="input-group">

                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirmer votre mot de passe']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('password') }}</span>

            </div>

        </div>

        <div class="card-footer">

            {!! Form::submit('Enregistrer', ['class' => 'btn btn-info float-right']) !!}

        </div>

        {!! Form::close() !!}

    </div>

</div>
