<x-layouts.app>

    <div class="row">

        <div class="col-sm-6 float-left py-3">

            <a href="{{ route('variation.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> LISTE DES VARIATIONS
            </a>

            <a href="{{ route('variation.show', $variation) }}" class="btn btn-sm btn-info">
                <i class="fa fa-file" aria-hidden="true"></i> FICHE DE LA VARIATION
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

                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>

            @endif

        </div>

    </div>

    <div class="row">

        <div class="col-md-8">

            <div class="row">

                {{-- form --}}
                <div class="col-md-12">

                    <div class="card card-info">

                        <div class="card-header">

                            <h3 class="card-title">Ajouter des valeurs de propriété à la variation :
                                <b>{{ $variation->name }} </b>
                            </h3>

                        </div>

                        {!! Form::open(['method' => 'POST', 'route' => 'variation-spec.store']) !!}

                        {!! Form::hidden('variation_id', $variation->id) !!}

                        <div class="card-body">

                            <div class="form-group">

                                {!! Form::label('propertyValue', 'Choisissez des valeurs de propriété') !!}

                                <span class="btn btn-info btn-xs select-all ml-2">Tout sélectionner</span>
                                <span class="btn btn-info btn-xs deselect-all">Tout supprimer</span>

                                <div class="input-group">

                                    <select class="form-control select2 select2-select" name="propertyValue[]" multiple
                                        required>

                                        @foreach ($variation->product->properties as $property)

                                            @foreach ($property->propertyValues as $propertyValue)

                                                <option value="{{ $propertyValue->id }}">{{ $property->name }}
                                                    ({{ $propertyValue->name }})
                                                </option>

                                            @endforeach

                                        @endforeach

                                    </select>

                                </div>

                                <span class="text-danger text-sm">{{ $errors->first('propertyValue') }}</span>

                            </div>

                        </div>

                        <div class="card-footer">

                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>

                {{-- car --}}
                <div class="col-md-12">

                    <table class="table table-bordered table-striped">

                        <thead>

                            <tr>
                                <th colspan="3">CARACTÉRISTIQUES</th>
                            </tr>

                            <tr>
                                <th>CHAMP</th>
                                <th>VALEUR</th>
                                <th>ACTION</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($variation->propertyValues as $propertyValue)

                                <tr>
                                    <td>{{ $propertyValue->property->name }}</td>
                                    <td>{{ $propertyValue->name }}</td>
                                    <td>

                                        {!! Form::model($variation, ['route' => ['variation-spec.destroy', $variation->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}

                                        {!! Form::hidden('variation_id', $variation->id) !!}
                                        {!! Form::hidden('property_value_id', $propertyValue->id) !!}

                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Supprimer
                                        </button>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">

                    <table class="table table-bordered table-striped">

                        <thead>

                            <tr>
                                <th class="text-center">PROPRIÉTÉS DU PRODUIT</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($variation->product->properties as $property)

                                <tr>
                                    <td>{{ $property->name }}</td>
                                </tr>

                            @empty

                                <tr>
                                    <td>Pas d'enregistrment</td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>


                </div>
            </div>
        </div>



    </div>


</x-layouts.app>
