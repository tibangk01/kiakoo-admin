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

                <h3 class="card-title">Editer la réduction de l'article :
                    <b>{{ $discount->discountable->name }}</b>
                </h3>

            </div>

            {!! Form::model($discount, ['route' => ['discount.update', $discount->id], 'method' => 'PUT']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('amount', 'Modifier la réduction associée(%)*') !!}

                    <div class="input-group">

                        {!! Form::number('amount', $discount->amount, ['class' => 'form-control', 'min' => 0, 'max' => 100, 'required' => true, 'placeholder' => 'Ex: 10, 20, ...']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('amount') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('expires_at', "Modifier la date d'expiration*") !!}

                    <div class="input-group">

                        {!! Form::date('expires_at', $discount->expires_at, ['class' => 'form-control', 'required' => true]) !!}

                    </div>




                    <span class="text-danger text-sm">{{ $errors->first('expires_at') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('quantity', 'Ajouter une quantité additionnelle') !!}

                    <div class="input-group">

                        {!! Form::number('quantity', 0, ['class' => 'form-control', 'min' => 0, 'placeholder' => 'Ex: 100, 250,...']) !!}

                    </div>

                    <span class="text-sm"> Quantité additionnelle maximum :
                        <b>{{ $discount->discountable->stock - $discount->quantity }} </b></span>

                    <span class="text-danger text-sm">{{ $errors->first('quantity') }}</span>

                    @if (session('bad_new_quantity'))

                        <br>
                        <span class="text-sm text-danger">{{ session('bad_new_quantity') }}</span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('is_daily_offer', 'Cet article est-elle une offre du jour ?') !!}

                    <br>

                    @php
                        $valueOne = $discount->is_daily_offer == 0 ? true : null;
                        $valueTwo = $discount->is_daily_offer == 1 ? true : null;
                    @endphp

                    <label for="valueOne" class="form-label">
                        {!! Form::radio('is_daily_offer', '0', $valueOne, ['id' => 'valueOne']) !!} Non ?
                    </label>

                    &nbsp;&nbsp;&nbsp;

                    <label for="valueTwo" class="form-label">
                        {!! Form::radio('is_daily_offer', '1', $valueTwo, ['id' => 'valueTwo']) !!} Oui ?
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
