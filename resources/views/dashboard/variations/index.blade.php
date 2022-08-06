<x-layouts.app>

    <div class="row">

        <div class="col-md-12">

            @if (session('success'))

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>

            @endif

        </div>

        <div class="col-sm-12 text-left py-3">
            <a href="{{ route('variation.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER UNE VARIATION
            </a>
        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">LISTE DES VARIATIONS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div>

                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>DÉNOMINATION</th>
                                            <th>QUANTITÉ RESTANTE</th>
                                            <th>PRIX DE VENTTE</th>
                                            <th>RÉDUCTION</th>
                                            <th>ACTIONS</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp

                                        @forelse ($variations as $variation)

                                            <tr>
                                                <td> {{ ++$i }}</td>
                                                <td>{{ $variation->name }}</td>
                                                <td>{{ $variation->stock }}</td>
                                                <td>{{ $variation->price . ' Fcfa' }}</td>
                                                <td>
                                                    @if ($variation->discount !== null)

                                                        <span
                                                            class="badge badge-success">-{{ $variation->discount->amount . '%' }}</span>

                                                    @else

                                                        <span class="badge badge-info">Non</span>

                                                    @endif

                                                </td>

                                                <td class="text-center">

                                                    <a type="button"
                                                        href="{{ route('variation-spec.show', $variation->id) }}"
                                                        class="btn btn-sm btn-outline-dark"><i
                                                            class="fa fa-cogs"></i> Spécifications</a>

                                                    <a type="button"
                                                        href="{{ route('variation-image.show', $variation->id) }}"
                                                        class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-images"></i> Images</a>

                                                    <a type="button" href="{{ route('variation.show', $variation) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fa fa-eye"></i> Détail</a>
                                                    <a type="button" href="{{ route('variation.edit', $variation) }}"
                                                        class="btn btn-sm btn-outline-success"><i
                                                            class="fa fa-edit"></i> Editer</a>
                                                    <a type="button"
                                                        href="{{ route('variation.delete', $variation) }}"
                                                        class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i> Supprimer</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="6"> Pas d'enregistrement.</td>
                                            </tr>

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
