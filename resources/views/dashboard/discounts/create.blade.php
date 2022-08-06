<x-layouts.app>

    <div class="col-sm-12 text-left py-3">

        <a href="{{ route('discount.index') }}" class="btn btn-sm btn-info">
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

        @if (session('warning'))

            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('warning') }}
            </div>

        @endif

    </div>

    <div class="col-md-12">

        <div class="card card-info">

            <div class="card-header">

                <h3 class="card-title">Ajouter une réduction </h3>

            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'discount.store']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('variation_id', 'Sélectionner un article*') !!}

                    <div class="input-group">

                        {!! Form::select('variation_id', $variations, null, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Choisissez un article']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('variation_id') }}</span>

                    @if (session('discount_already_exists'))

                        <span class="text-danger text-sm">{{ session('discount_already_exists') }}</span>

                    @endif

                    @if (session('stock_empty'))

                        <span class="text-danger text-sm">{{ session('stock_empty') }}</span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('amount', 'Entrer la réduction associée(%)*') !!}

                    <div class="input-group">

                        {!! Form::number('amount', null, ['class' => 'form-control', 'min' => 0, 'max' => 100, 'required' => true, 'placeholder' => 'Ex: 10, 20, ...']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('amount') }}</span>

                </div>


                <div class="form-group">

                    {!! Form::label('expires_at', "Choisissez la date d'expiration*") !!}

                    <div class="input-group">

                        {!! Form::date('expires_at', now(), ['class' => 'form-control', 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('expires_at') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('quantity', 'Entrer le nombre de réductions*') !!}

                    <div class="input-group">

                        {!! Form::number('quantity', null, ['class' => 'form-control', 'min' => 1, 'required' => true, 'placeholder' => 'Ex: 100, 250, ...']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('quantity') }}</span>

                    @if (session('form_quantity_greater_than_variation_one'))

                        <span
                            class="text-danger text-sm">{{ session('form_quantity_greater_than_variation_one') }}</span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('is_daily_offer', 'Cet article est-elle une offre du jour ?') !!}

                    <br>

                    <label for="valueOne" class="form-label">
                        {!! Form::radio('is_daily_offer', '0', true, ['id' => 'valueOne']) !!} Non ?
                    </label>

                    &nbsp;&nbsp;&nbsp;

                    <label for="valueTwo" class="form-label">
                        {!! Form::radio('is_daily_offer', '1', null, ['id' => 'valueTwo']) !!} Oui ?
                    </label>

                </div>

            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
