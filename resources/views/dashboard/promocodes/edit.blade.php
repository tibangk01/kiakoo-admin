<x-layouts.app>

    <div class="col-sm-12 text-left py-3">
        <a href="{{ route('promocode.index') }}" class="btn btn-sm btn-info">
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

                <h3 class="card-title">Editer le code promotionnel</h3>

            </div>


            {!! Form::model($promocode, ['route' => ['promocode.update', $promocode->id], 'method' => 'PUT']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('expires_at', "Code valable jusqu'au*") !!}

                        {!! Form::date('expires_at', $promocode->expires_at , ['class' => 'form-control', 'required' => true]) !!}

                    <span class="text-danger text-sm">{{ $errors->first('expires_at') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('code', 'Dénomination du code*') !!}

                    <div class="input-group">

                        {!! Form::text('code', $promocode->code, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ex: ROM-20, ...']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('code') }}</span>

                    @if (session('valid_promocode_provided'))

                        <span class="text-danger text-sm">
                            {{ session('valid_promocode_provided') }}
                        </span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('reward', 'Réduction associée au code(%)*') !!}

                    <div class="input-group">

                        {!! Form::number('reward', $promocode->reward, ['class' => 'form-control', 'required' => true, 'min' => 0, 'max' => 100, 'placeholder' => 'Ex: 10, 30, ...']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('reward') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('quantity', "Coupons restant : " . $promocode->quantity. ", ajoutez une quantité additionnelle ici:") !!}

                    <div class="input-group">

                        {!! Form::number('quantity', 0, ['class' => 'form-control', 'required' => true, 'min' => 0, 'placeholder' => 'Ex: 10, 100, 350, ...']) !!}

                    </div>


                    <span class="text-danger text-sm">{{ $errors->first('quantity') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('description', 'Description*') !!}

                    <div class="input-group">

                        @php
                            $data = json_decode($promocode->data, true)
                        @endphp

                        {!! Form::textarea('description', $data['description'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Ex: code promo noël, ...']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('description') }}</span>

                </div>

            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
