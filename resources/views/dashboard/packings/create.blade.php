<x-layouts.app>

    <div class="col-sm-12 text-left py-3">

        <a href="{{ route('packing.index') }}" class="btn btn-sm btn-info">
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

                <h3 class="card-title">Ajouter un conditionnement </h3>

            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'packing.store']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('name', 'Entrer la dénomination du conditionnement*') !!}

                    <div class="input-group">

                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                </div>

            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
