<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('discount.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">SUPPRESSION DE LA DISCOUNT</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div>

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>

                                            <td class="text-bold" colspan="2">

                                                {!! Form::model($discount, ['route' => ['discount.destroy', $discount->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}

                                                Souhaitez-vous vraiment supprimer cet élément ?

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Supprimer
                                                </button>

                                                {!! Form::close() !!}

                                            </td>
                                        </tr>

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

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
