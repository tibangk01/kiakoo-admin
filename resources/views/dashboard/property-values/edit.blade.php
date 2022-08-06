<x-layouts.app>

    <div class="row">
        <div class="col-sm-6 float-left text-left py-3">

            <a href="{{ route('property-value.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-sm-6 float-right text-right py-3">

            <a href="{{ route('product.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER DES PRODUITS
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

                    <h3 class="card-title">Editer la valeur de propriété</h3>

                </div>

                {!! Form::model($propertyValue, ['route' => ['property-value.update', $propertyValue->id], 'method' => 'PUT']) !!}

                <div class="card-body">

                    <div class="form-group">

                        {!! Form::label('property_id', 'Sélectionner une propriété') !!}

                        <div class="input-group">

                            {!! Form::select('property_id', $properties, $propertyValue->property->id, ['class' => 'form-control select2']) !!}

                        </div>

                        <span class="text-danger text-sm">{{ $errors->first('property_id') }}</span>

                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Dénomination de la valeur de propriété') !!}

                        <div class="input-group">

                            {!! Form::text('name', $propertyValue->name, ['class' => 'form-control', 'required' => 'required']) !!}

                        </div>

                        <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                        @if (session('name_already_registered'))

                            <span class="text-danger text-sm">
                                {{ session('name_already_registered') }}
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

    </div>

</x-layouts.app>
