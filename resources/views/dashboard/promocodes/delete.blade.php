<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('promocode.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">SUPPRESSION DU CODE PROMOTIONNEL</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div>

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>

                                            <td class="text-bold" colspan="2">

                                                {!! Form::model($promocode, ['route' => ['promocode.destroy', $promocode->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}

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

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
