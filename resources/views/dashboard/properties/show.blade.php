<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('property.edit', $property) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('property.delete', $property) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('property.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">DETAIL DE LA PROPRIÉTÉ</h3>

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
                                            <td>{{ $property->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Valeur(s) possible</td>
                                            <td>
                                                @forelse ($property->propertyValues as $propertyValue)

                                                    <span class="text-bold">

                                                        {{ $propertyValue->name }}

                                                        @if (!$loop->last)
                                                            {{ ', ' }}
                                                        @endif

                                                        @if (($loop->iteration % 3) === 0)
                                                             <br>
                                                        @endif

                                                    </span>

                                                @empty

                                                    <span> - </span>

                                                @endforelse
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Date de création</td>
                                            <td>{{ $property->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de mise à jour </td>
                                            <td>{{ $property->updated_at }}</td>
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
