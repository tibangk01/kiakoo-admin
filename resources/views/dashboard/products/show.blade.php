<x-layouts.app>

    <div class="row">

        <div class="col-sm-6 float-left text-left py-3">

            <a href="{{ route('product.edit', $product) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('product.delete', $product) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('product.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-sm-6 float-right text-right py-3">

            <a href="{{ route('variation.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> GESTION DES VARIATIONS DES PRODUIT
            </a>

        </div>
{{--
    TODO: add product variation liste tab --}}
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">DETAIL DU PRODUIT</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="">

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>
                                            <th>CHAMP</th>
                                            <th>VALEUR</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Dénomination</td>
                                            <td>{{ $product->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Propriétés(s) possible</td>
                                            <td>
                                                @forelse ($product->properties as $property)

                                                    <span>

                                                        {{ $property->name }}

                                                        @if (!$loop->last)
                                                            {{ ', ' }}
                                                        @endif

                                                        @if ($loop->iteration % 3 === 0)
                                                            <br>
                                                        @endif

                                                    </span>

                                                @empty

                                                    <span> - </span>

                                                @endforelse
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Marque</td>
                                            <td>{{ $product->brand->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Catégorisation</td>
                                            <td>{{ $product->taxonChild->taxon->taxonomy->name. ', '. $product->taxonChild->taxon->name.', '. $product->taxonChild->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de création</td>
                                            <td>{{ $product->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de mise à jour </td>
                                            <td>{{ $product->updated_at }}</td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
