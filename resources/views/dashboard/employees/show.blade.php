<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('employee.edit', $employee) }}" class="btn btn-sm btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i> ÉDITER
            </a>

            <a href="{{ route('employee.delete', $employee) }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i> SUPPRIMER
            </a>

            <a href="{{ route('employee.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">DETAIL DE L'EMPLOYÉ</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div >

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>
                                            <th>CHAMP</th>
                                            <th>VALEUR</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Genre</td>
                                            <td>{{ $employee->human->gender->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nom & Prénom(s)</td>
                                            <td>{{ $employee->human->last_name . ' ' . $employee->human->first_name }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>N° de téléphone</td>
                                            <td>{{ $employee->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse</td>
                                            <td>{{ $employee->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Rôle(s)</td>
                                            <td>

                                                @forelse ($employee->user->roles as $role)

                                                    <span class="right badge badge-success">

                                                        {{ $role->name }}


                                                        @if (!$loop->last)
                                                           {{ ', ' }}
                                                        @endif

                                                    </span>

                                                @empty

                                                    <span> - </span>

                                                @endforelse

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Permission(s)</td>
                                            <td>

                                                @forelse ($employee->user->permissions as $permission)

                                                    <span class="right badge badge-warning">

                                                        {{ $permission->name }}

                                                        @if (!$loop->last)
                                                           {{ ', ' }}
                                                        @endif

                                                    </span>

                                                @empty

                                                    <span> - </span>

                                                @endforelse

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Fonction</td>
                                            <td>{{ $employee->work->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Status</td>

                                            <td>
                                                @if ($employee->authorized_to_log_in == 1)

                                                    <span class="right badge badge-success">Actif</span>

                                                @else

                                                    <span class="right badge badge-danger">Dormant</span>

                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Date de création</td>
                                            <td>{{ $employee->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $employee->user->email }}</td>
                                        </tr>

                                        @if ($employee->password_changed == 0)

                                            <tr>
                                                <td>Mot de passe temporaire</td>
                                                <td>{{ $employee->temporary_password }}</td>
                                            </tr>

                                        @endif

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
