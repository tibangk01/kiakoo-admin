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
            <a href="{{ route('promocode.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER UN CODE PROMOTIONNEL
            </a>
        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">LISTE DES CODES PROMOTIONNELS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>DESCRIPTION</th>
                                            <th>CODE(REDUCTION)</th>
                                            <th>COUPON TOTAL</th>
                                            <th>COUPONS RESTANT</th>
                                            <th>STATUT</th>
                                            <th>VALIDE JUSQU'AU</th>
                                            <th>ACTIONS</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp

                                        @forelse ($promocodes as $promocode)

                                            @php
                                                $data = json_decode($promocode->data, true)
                                            @endphp

                                            <tr>
                                                <td> {{ ++$i }}</td>

                                                <td>{{ $data['description'] ?? '' }}</td>

                                                <td>{{ $promocode->code.'(-'.$promocode->reward.'%)' }}</td>

                                                <td>{{ $data['initial_quantity'] }}</td>

                                                <td>{{ $promocode->quantity }}</td>
                                                <td>

                                                    @if ($promocode->expires_at < now())

                                                        <span class="badge badge-danger">Code promo expiré</span>

                                                    @else

                                                        @if ($promocode->quantity === 0)

                                                        <span class="badge badge-info">Limite code promo atteinte</span>


                                                        @else
                                                        <span class="badge badge-success">Code promo valide</span>


                                                        @endif

                                                    @endif

                                                </td>

                                                <td>{{ $promocode->expires_at}}</td>

                                                <td class="text-center">

                                                    <a type="button" href="{{ route('promocode.show', $promocode) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fa fa-eye"></i> Détail</a>

                                                    <a type="button" href="{{ route('promocode.edit', $promocode) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fa fa-pencil"></i> Editer</a>

                                                    <a type="button"
                                                        href="{{ route('promocode.delete', $promocode) }}"
                                                        class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i> Supprimer</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="8"> Pas d'enregistrement.</td>
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

</x-layouts.app>
