<x-layouts.app>

    <div class="row">
        <div class="col-sm-6 float-left text-left py-3">

            <a href="{{ route('property.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-sm-6 float-right text-right py-3">

            <a href="{{ route('property-value.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER DES VALEURS DE PROPRIÉTÉS
            </a>

        </div>

    </div>


    <div class="row">

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

                    <h3 class="card-title">Ajouter une propriété </h3>

                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'property.store']) !!}

                <div class="card-body">

                    <div class="form-group">

                        {!! Form::label('name', 'Entrer la dénomination de la propriété') !!}

                        <div class="input-group">

                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => '']) !!}

                        </div>

                        <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                    </div>

                    <div class="form-group">

                        <label for="valueOne" class="form-label">
                            {!! Form::radio('is_technical', '1', true, ['id' => 'valueOne']) !!} Caractéristique technique ?
                        </label>

                        &nbsp;&nbsp;&nbsp;

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('is_technical', '0', null, ['id' => 'valueTwo']) !!} Caractéristique générale ?
                        </label>

                    </div>

                </div>

                <div class="card-footer">

                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</x-layouts.app>
