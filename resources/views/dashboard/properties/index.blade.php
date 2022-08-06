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
            <a href="{{ route('property.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER UNE PROPRIÉTÉ
            </a>
        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">LISTE DES PROPRIÉTÉS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="">

                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>DÉNOMINATION</th>
                                            <th>DATE DE CRÉATION</th>
                                            <th>DATE DE MISE À JOUR</th>
                                            <th>ACTIONS</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp

                                        @forelse ($properties as $property)

                                            <tr>
                                                <td> {{ ++$i }}</td>
                                                <td>{{ $property->name }}</td>
                                                <td>{{ $property->created_at->diffForHumans() }}</td>
                                                <td>{{ $property->updated_at->diffForHumans() }}</td>

                                                <td class="text-center">

                                                    <a type="button"
                                                        href="{{ route('property.show', $property) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fa fa-eye"></i> Détail</a>
                                                    <a type="button"
                                                        href="{{ route('property.edit', $property) }}"
                                                        class="btn btn-sm btn-outline-success"><i
                                                            class="fa fa-edit"></i> Editer</a>
                                                    <a type="button"
                                                        href="{{ route('property.delete', $property) }}"
                                                        class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i> Supprimer</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="5"> Pas d'enregistrement.</td>
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
