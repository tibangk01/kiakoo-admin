<x-layouts.app>

    <div class="row">
        <div class="col-sm-6 float-left text-left py-3">

            <a href="{{ route('taxon.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-sm-6 float-right text-right py-3">

            <a href="{{ route('taxon-child.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER DES FAMILLES
            </a>

        </div>

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

                <h3 class="card-title">Ajouter une sous catégorie</h3>

            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'taxon.store']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('taxonomy_id', 'Sélectionner une catégorie') !!}

                    <div class="input-group">

                        {!! Form::select('taxonomy_id', $taxonomies, null, ['class' => 'form-control select2', 'placeholder' => 'Choisissez une catégorie']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('taxonomy_id') }}</span>

                </div>

                <div class="form-group">

                    {!! Form::label('name', 'Entrer la dénomination de la sous catégorie*') !!}

                    <div class="input-group">

                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}

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

</x-layouts.app>
