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
            <a href="{{ route('employee.create') }}" class="btn btn-sm btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> AJOUTER UN EMPLOYÉ
            </a>
        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">LISTE DES EMPLOYÉS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div>

                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>NOM & PRÉNOM</th>
                                            <th>STATUS</th>
                                            <th>TÉLÉPHONE</th>
                                            <th>DATE DE CRÉATION</th>
                                            <th>ACTIONS</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp

                                        @forelse ($employees as $employee)

                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>
                                                    {{ $employee->human->last_name . ' ' . $employee->human->first_name }}
                                                </td>

                                                <td>

                                                    @if ($employee->authorized_to_log_in == 1)

                                                        <span class="right badge badge-success">Actif</span>

                                                    @else

                                                        <span class="right badge badge-danger">Dormant</span>

                                                    @endif

                                                </td>

                                                <td>{{ $employee->phone_number }}</td>


                                                <td>{{ $employee->created_at->diffForHumans() }}</td>

                                                <td class="text-center">

                                                    <a type="button" href="{{ route('employee.show', $employee) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fa fa-eye"></i> Détail</a>
                                                    <a type="button" href="{{ route('employee.edit', $employee) }}"
                                                        class="btn btn-sm btn-outline-success"><i
                                                            class="fa fa-edit"></i> Editer</a>

                                                    @hasanyrole('administrateur')

                                                    <a type="button" href="{{ route('user-activity.show', $employee->user->id)}}"
                                                        class="btn btn-sm btn-outline-dark"><i
                                                            class="fa fa-tasks"></i> Activités</a>

                                                    @endhasallroles


                                                    <a type="button" href="{{ route('employee.delete', $employee) }}"
                                                        class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i> Supprimer</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="6"> Pas d'enregistrement.</td>
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
