<x-layouts.app>

    <div class="col-sm-12 text-left py-3">
        <a href="{{ route('work.index') }}" class="btn btn-sm btn-info">
            <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
        </a>
    </div>

    <div class="col-md-12">

        @if (session('success'))

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>

        @endif

    </div>

    <div class="col-md-12">

        <div class="card card-info">

            <div class="card-header">

                <h3 class="card-title">Editer la fonction</h3>

            </div>

            {!! Form::model($work, ['route' => ['work.update', $work->id], 'method' => 'PUT']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('name', 'Dénomination de la fonction') !!}

                    <div class="input-group">

                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>


                    @if (session('name_already_provided'))

                        <span class="text-danger text-sm">
                            {{ session('name_already_provided') }}
                        </span>

                    @endif

                </div>

            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
