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
            <a href="{{ route('discount.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER UNE RÉDUCTION
            </a>
        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">LISTE DES RÉDUCTIONS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div>

                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>ARTICLE</th>
                                            <th>RÉDUCTION</th>
                                            <th>QUANTITÉ RESTANTE</th>
                                            <th>QUANTITÉ UTILISÉE</th>
                                            <th>DATE D'EXPIRATION</th>
                                            <th>STATUT</th>
                                            <th>DATE DE CRÉATION</th>
                                            <th>ACTIONS</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;


                                        @endphp

                                        @forelse ($discounts as $discount)

                                            <tr>
                                                <td> {{ ++$i }}</td>
                                                <td>
                                                    {{ $discount->discountable->name }}

                                                    @if ($discount->is_daily_offer == true )
                                                        <span class="badge badge-info"> Offre du jour</span>
                                                    @endif
                                                </td>
                                                <td>{{ $discount->amount . '%' }}</td>
                                                <td>{{ $discount->quantity }}</td>
                                                <td>{{ $discount->quantity_used }}</td>
                                                <td>
                                                    {{ $discount->expires_at }}
                                                </td>
                                                <td>
                                                    @if (now() > $discount->expires_at)
                                                        <span class="badge badge-danger">Expirée</span>
                                                    @else
                                                        @if ($discount->quantity > 0)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-info">Limite atteinte</span>
                                                        @endif
                                                    @endif
                                                </td>

                                                <td>{{ $discount->created_at->diffForHumans() }}</td>

                                                <td class="text-center">

                                                    <a type="button" href="{{ route('discount.show', $discount) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fa fa-eye"></i> Détail</a>
                                                    <a type="button" href="{{ route('discount.edit', $discount) }}"
                                                        class="btn btn-sm btn-outline-success"><i
                                                            class="fa fa-edit"></i> Editer</a>
                                                    <a type="button" href="{{ route('discount.delete', $discount) }}"
                                                        class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i> Supprimer</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="9"> Pas d'enregistrement.</td>
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
