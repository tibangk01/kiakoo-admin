<x-layouts.app>

    <div class="row">

        <div class="col-sm-6 float-left py-3">

            <a href="{{ route('variation.edit', $variation) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('variation.delete', $variation) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('variation.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-sm-6 float-right text-right py-3">

            <a target="_blank" href="{{ route('variation-image.show', $variation->id) }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> GERER LES IMAGES
            </a>

            <a target="_blank" href="{{ route('variation-spec.show', $variation->id) }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> GERER LES VALEURS DE PROPRIÉTÉS
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
        </div>
    </div>


    <div class="card card-info card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                        aria-selected="true">INFORMATIONS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                        href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                        aria-selected="false">DESCRIPTION</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
                        href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings"
                        aria-selected="false">FICHE TECHNIQUE</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                        href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                        aria-selected="false">IMAGES</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">

                {{-- Informations --}}
                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                    aria-labelledby="custom-tabs-three-home-tab">

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
                                            <td>Statut</td>
                                            <td>
                                                @if ($variation->is_published === true)

                                                    <span class="badge badge-success">Publié</span>

                                                @else

                                                    <span class="badge badge-warning">En attente</span>

                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>N° de série (sku)</td>
                                            <td>
                                                @if ($variation->sku !== null)

                                                {{ $variation->sku }}

                                                @else
                                                    Non enregistré.
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>État</td>
                                            <td>
                                                <span class="badge badge-info">{{ $variation->state->name }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Conditionnement</td>
                                            <td>
                                                <span class="badge badge-info">{{ $variation->packing->name }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Nom</td>
                                            <td>{{ $variation->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Prix de vente</td>
                                            <td>{{ $variation->price.' Fcfa'}}</td>
                                        </tr>

                                        <tr>
                                            <td>Quantité en stock</td>
                                            <td>{{ $variation->stock }}</td>
                                        </tr>

                                        <tr>
                                            <td>Quantité vendue</td>
                                            <td>{{ $variation->units_sold }}</td>
                                        </tr>

                                        @if ($variation->discount !== null)

                                        <tr>
                                            <td>Réduction</td>
                                            <td>
                                                Pourcentage : -{{ $variation->discount->amount.'%' }} <br>
                                                Quantité totale : {{ $variation->discount->quantity }} <br>
                                                Quantité utilisée : {{ $variation->discount->quantity_used }} <br>
                                                Quantité restante : {{ $variation->discount->quantity -  $variation->discount->quantity_used }} <br>
                                                Date d'expiration : {{ $variation->discount->expires_at }}
                                            </td>
                                        </tr>

                                        @else

                                        <tr>
                                            <td>Réduction</td>
                                            <td>
                                                <span class="badge badge-warning">Non</span>
                                            </td>
                                        </tr>
                                        @endif


                                        <tr>
                                            <td>Date de création</td>
                                            <td>{{ $variation->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de mise à jour </td>
                                            <td>{{ $variation->updated_at }}</td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Description --}}
                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-three-profile-tab">

                    <div class="row">

                        @php
                            echo $variation->description;
                        @endphp

                    </div>

                </div>

                {{-- Images --}}
                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-three-messages-tab">

                    <div class="row">

                        @forelse ($variation->media as $image)

                            <div class="col-sm-2">
                                <a href="#">
                                    <img src="{{ $image->getUrl('thumb') }}" class="img-fluid mb-2" alt="#" />
                                </a>
                            </div>

                        @empty

                            <div>Pas d'images</div>

                        @endforelse

                    </div>


                </div>

                {{-- Fiche techniques --}}
                <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-three-settings-tab">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="">

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>
                                            <th colspan="2">CARACTÉRISTIQUES</th>
                                        </tr>

                                        <tr>
                                            <th>CHAMP</th>
                                            <th>VALEUR</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @forelse ($variation->propertyValues as $propertyValue)

                                            <tr>

                                                <td>{{ $propertyValue->property->name }}</td>

                                                <td>{{ $propertyValue->name }}</td>

                                            </tr>


                                        @empty

                                            <td colspan="2">
                                                Pas encore d'enregistrements ? Ajoutez-les en cliquant ici: <a href="{{ route('variation-spec.show', $variation->id) }}"
                                                    class="badge badge-info">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                        @endforelse


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
