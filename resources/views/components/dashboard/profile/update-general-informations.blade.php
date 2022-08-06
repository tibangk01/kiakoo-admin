<div class="col-md-12">
    @if (session('general_info_update_success'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('general_info_update_success') }}
        </div>

    @endif

    @if (session('general_info_update_error'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('general_info_update_error') }}
        </div>

    @endif
</div>

<div class="card card-info">

    <div class="card-header">

        <h3 class="card-title">Modifier Vos Informations Générales</h3>

    </div>

    {!! Form::model($user, ['route' => 'general_info.update', 'method' => 'PUT']) !!}

    {!! Form::hidden('user_id', $user->id) !!}

    <div class="card-body">

        <div class="form-group">

            {!! Form::label('name', 'Nom') !!}

            <div class="input-group">

                {!! Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nom']) !!}

            </div>

            <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

        </div>

    </div>

    <div class="card-footer">

        {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

    </div>

    {!! Form::close() !!}

</div>

<div class="col-md-12">

    @if (session('email_update_success'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('email_update_success') }}
        </div>
        
    @endif

</div>
