<x-layouts.app>

    <div class="col-sm-12 text-left py-3">

        <a href="{{ route('variation.index') }}" class="btn btn-sm btn-info">
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

                <h3 class="card-title">Ajouter une variation </h3>

            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'variation.store']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('state_id', "Sélectionner l'état du produit*") !!}

                    <div class="input-group">

                        {!! Form::select('state_id', $states, null, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Choisissez un état']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('state_id') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('packing_id', 'Sélectionner un conditionnement*') !!}

                    <div class="input-group">

                        {!! Form::select('packing_id', $packings, null, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Choisissez un conditionnement']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('packing_id') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('product', 'Sélectionner un produit*') !!}

                    <div class="input-group">

                        {!! Form::select('product_id', $products, null, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Choisissez un produit']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('product_id') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('name', 'Entrer la dénomination de la variation*') !!}

                    <div class="input-group">

                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('sku', 'Entrer le numéro de série(sku)') !!}

                    <div class="input-group">

                        {!! Form::text('sku', null, ['class' => 'form-control']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('sku') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('price', 'Entrer le prix du produit*') !!}

                    <div class="input-group">

                        {!! Form::number('price', null, ['class' => 'form-control', 'min' => 0, 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('price') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('stock', 'Entrer la quantité en stock*') !!}

                    <div class="input-group">

                        {!! Form::number('stock', null, ['class' => 'form-control', 'min' => 0, 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('stock') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('units_sold', 'Entrer la quantité vendue*') !!}

                    <div class="input-group">

                        {!! Form::number('units_sold', null, ['class' => 'form-control', 'min' => 0, 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('units_sold') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('description', 'Entrer la description de la variation*') !!}

                    {!! Form::textarea('description', null, ['class' => 'd-none summernote', 'required' => true]) !!}

                    <span class="text-danger text-sm">{{ $errors->first('description') }}</span>

                </div>

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="valueOne" class="form-label">
                            {!! Form::radio('is_published', '1', true, ['id' => 'valueOne']) !!} Publier ?
                        </label>

                        &nbsp;&nbsp;&nbsp;

                        <label for="valueTwo" class="form-label">
                            {!! Form::radio('is_published', '0', null, ['id' => 'valueTwo']) !!} Mettre en attente ?
                        </label>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
