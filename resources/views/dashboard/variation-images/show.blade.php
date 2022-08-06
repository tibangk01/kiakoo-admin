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

        <div class="col-md-12">

            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title">Ajouter des images à la variation du produit : <b> {{ $variation->name }} </b></h3>

                </div>


                {!! Form::open(['method' => 'POST', 'route' => 'variation-image.store','files' => true]) !!}

                {!! Form::hidden('variation_id', $variation->id) !!}

                <div class="card-body">

                    <div class="form-group">

                        {!! Form::file('variation_images[]', ['required' => true, 'id' => 'file-input', 'multiple' => true]) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('variation_images') }}</span>

                    <div id="preview"></div>

                </div>

                <div class="card-footer">

                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

                </div>

                {!! Form::close() !!}

            </div>

        </div>

        <div class="col-md-12">

            <div class="card card-info card-outline card-tabs">

                <div class="card-body">

                    <div class="d-flex flex-wrap">

                        @forelse ($variation->media as $image)

                            <div class="col-md-2 text-center mb-2">

                                <div class="row">

                                    <div class="col-12">
                                        <img src="{{ $image->getUrl('slides') }}" class="img-fluid mb-1"
                                            alt="variation" />
                                    </div>

                                    <div class="col-12">

                                        {!! Form::model($variation, ['route' => ['variation-image.destroy', $variation->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}

                                        {!! Form::hidden('variation_id', $variation->id) !!}
                                        {!! Form::hidden('media_id', $image->id) !!}

                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Supprimer
                                        </button>

                                        {!! Form::close() !!}

                                    </div>
                                </div>

                            </div>

                        @empty

                            <div>Pas d'images</div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
