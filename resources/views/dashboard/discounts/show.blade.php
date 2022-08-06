<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('discount.edit', $discount) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('discount.delete', $discount) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('discount.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">DETAIL DE LA RÉDUCTION</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

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

                                   

                                    <tr>
                                        <td>Article</td>
                                        <td>
                                            {{ $discount->discountable->name }}

                                            @if ($discount->is_daily_offer == true)
                                                <span class="badge badge-info"> Offre du jour</span>
                                            @endif

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Quantité total</td>
                                        <td>{{ $discount->quantity }}</td>
                                    </tr>

                                    <tr>
                                        <td>Quantité utilisée</td>
                                        <td>{{ $discount->quantity_used }}</td>
                                    </tr>

                                    <tr>
                                        <td>Réduction</td>
                                        <td>{{ $discount->amount . '%' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Statut</td>
                                        <td>
                                            @if (now() > $discount->expires_at)
                                                <span class="badge badge-danger">Expirée</span>
                                            @else
                                                @if ($discount->quantity > $discount->quantity_used)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-info">Limite atteinte</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Date d'expiration</td>
                                        <td>{{ $discount->expires_at }}</td>
                                    </tr>

                                    <tr>
                                        <td>Date de création</td>
                                        <td>{{ $discount->created_at }}</td>
                                    </tr>

                                    <tr>
                                        <td>Date de mise à jour </td>
                                        <td>{{ $discount->updated_at }}</td>
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



                            <tr>
                                <td>{{ 'Customer identity, coming soon ...' }}</td>
                                <td>{{ 'Customer identity, coming soon ...' }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
