<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('property-value.edit', $propertyValue) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('property-value.delete', $propertyValue) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('property-value.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">DETAIL DE LA VALEUR DE PROPRIÉTÉ</h3>

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
                                            <td>{{ $propertyValue->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Famille</td>
                                            <td>{{ $propertyValue->property->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de création</td>
                                            <td>{{ $propertyValue->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de mise à jour </td>
                                            <td>{{ $propertyValue->updated_at }}</td>
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
