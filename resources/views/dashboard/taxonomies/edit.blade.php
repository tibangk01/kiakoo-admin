<x-layouts.app>

    <div class="row">
        <div class="col-sm-6 float-left text-left py-3">

            <a href="{{ route('taxonomy.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-sm-6 float-right text-right py-3">

            <a href="{{ route('taxon.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER DES SOUS-CATÉGORIES
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

                <h3 class="card-title">Editer la catégorie</h3>

            </div>

            {!! Form::model($taxonomy, ['route' => ['taxonomy.update', $taxonomy->id], 'method' => 'PUT', 'files' => true]) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('name', 'Dénomination de la catégorie*') !!}

                    <div class="input-group">

                        {!! Form::text('name', $taxonomy->name, ['class' => 'form-control', 'required' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                    @if (session('name_already_provided'))

                        <span class="text-danger text-sm">
                            {{ session('name_already_provided') }}
                        </span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('image', 'Choisissez une image représentative de la catégorie*') !!}

                    <div class="input-group">

                        {!! Form::file('image', [ 'id' => 'file-input']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('image') }}</span>

                    <div id="preview"></div>

                </div>

                <div class="form-group">

                    <div class="input-group">

                        @php
                            $image = $taxonomy->media->first();
                        @endphp

                        <img src="{{ $image->getUrl('thumb') }}" width="60" height="60" class="img-fluid mb-1" alt="variation" />

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
