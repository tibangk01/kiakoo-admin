<x-layouts.app>

    <div class="col-sm-12 text-left py-3">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-info">
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

                <h3 class="card-title">Editer le produit</h3>

            </div>

            {!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PUT']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('brand_id', 'Sélectionner une marque*') !!}

                    <div class="input-group">

                        {!! Form::select('brand_id', $brands, $product->brand_id, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Choisissez une marque']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('brand_id') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('taxon_child_id', 'Sélectionner une famille*') !!}

                    <div class="input-group">

                        {!! Form::select('taxon_child_id', $taxonChildren, $product->taxon_child_id, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Choisissez une famille']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('taxon_child_id') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('name', 'Nom du produit*') !!}

                    <div class="input-group">

                        {!! Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                    @if (session('name_already_provided'))

                        <span class="text-danger text-sm">
                            {{ session('name_already_provided') }}
                        </span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('properties', 'Sélectionner les propriétés du produit*') !!}

                    <div class="input-group">

                        {!! Form::select('properties[]', $properties, $product->properties, ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('properties') }}</span>

                </div>




            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
