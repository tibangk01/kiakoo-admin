<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('role.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">SUPPRESSION DU RÔLE</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="">

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>

                                            <td class="text-bold" colspan="2">

                                                {!! Form::model($role, ['route' => ['role.destroy', $role->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}

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
                                            <td>Dénomination</td>
                                            <td>{{ $role->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Liste des autorisations</td>
                                            <td>

                                                @forelse ($role->permissions as $permission)

                                                    <span class="right badge text-bold badge-success">

                                                        {{ $permission->name }}

                                                    </span>

                                                @empty

                                                    <i class="text-muted">
                                                        {{ "Ce rôle est dépourvu d'autorisation(s)" }}
                                                    </i>


                                                @endforelse

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Date de création</td>
                                            <td>{{ $role->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date de mise à jour </td>
                                            <td>{{ $role->updated_at }}</td>
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
