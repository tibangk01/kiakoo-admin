<div class="col-md-12">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif

</div>

<div class="col-md-12">

    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title">Modifier Votre Avatar</h3>
        </div>

        <div class="card-body box-profile">

            <div class="text-center">
                <img class="profile-user-img img-fluid"
                    src="{{ auth()->user()->getMedia('avatar')->first()->getUrl('thumb') ?? asset('adminLte/img/avatar-default.png') }}"
                    alt="User profile picture">
            </div>

            {!! Form::open(['method' => 'put', 'route' => 'avatar.update', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">

                {!! Form::label('avatar', 'Profil') !!}

                <div class="input-group">

                    {!! Form::file('avatar', null, ['required' => '', 'id' => 'avatar']) !!}

                </div>

                <span class="text-danger text-sm">{{ $errors->first('avatar') }}</span>

            </div>

            {!! Form::submit('Enregistrer', ['class' => 'btn btn-info float-right']) !!}

            {!! Form::close() !!}

        </div>

    </div>

</div>
