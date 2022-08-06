<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 float-left py-3">

            <a href="{{ route('promocode.edit', $promocode) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('promocode.delete', $promocode) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('promocode.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

    </div>


    <div class="card card-info card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                        aria-selected="true">DETAILS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                        href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                        aria-selected="false">BÉNÉFICIAIRES</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">

                {{-- DETAILS --}}
                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                    aria-labelledby="custom-tabs-three-home-tab">

                    <div class="row">

                        <div class="col-sm-12">


                            <table class="table table-bordered table-striped">

                                <thead>

                                    <tr>
                                        <th>CHAMP</th>
                                        <th>VALEUR</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @php
                                        $data = json_decode($promocode->data, true);
                                    @endphp

                                    <tr>
                                        <td>Dénomination</td>
                                        <td>{{ $promocode->code }}</td>
                                    </tr>

                                    <tr>
                                        <td>Date de création</td>
                                        <td>{{ $data['created_at'] ?? '' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Réduction associé</td>
                                        <td>{{ $promocode->reward . '%' }}</td>
                                    </tr>



                                    <tr>
                                        <td>Nombre total coupons</td>
                                        <td>{{ $data['initial_quantity'] }}</td>
                                    </tr>

                                    <tr>
                                        <td>Coupons utilisés</td>
                                        <td>{{ $data['initial_quantity'] - $promocode->quantity }}</td>
                                    </tr>

                                    <tr>
                                        <td>Coupons restants</td>
                                        <td>{{ $promocode->quantity }}</td>
                                    </tr>

                                </tbody>

                            </table>


                        </div>

                    </div>

                </div>

                {{-- BENEFICIAIRES --}}
                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-three-profile-tab">

                    <table class="table table-bordered table-striped dataTable">

                        <thead>

                            <tr>
                                <th>Coupon utilisé le</th>
                                <th>Par</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($promocode->users as $user )

                                <tr>
                                    <td>{{ $user->pivot->used_at }}</td>
                                    <td>{{ 'Customer identity, coming soon ...' }}</td>
                                </tr>

                            @empty

                                <td colspan="2" class="text-center">Pas d'enregistrements</td>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
