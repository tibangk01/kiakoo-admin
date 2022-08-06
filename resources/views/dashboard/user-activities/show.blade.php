<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('employee.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE DES EMPLOYÉS
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">ACTIVITÉS DE L'EMPLOYÉ :
                        <?php if (count($activities) > 0) {
                            echo '<span class="badge badge-warning">' . $activities[0]->causer->employee->human->last_name . ' ' . $activities[0]->causer->employee->human->first_name . '</span>';
                        } ?></h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="">

                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>DATE CRÉATION</th>
                                            <th>NOM ACTIVITÉ</th>
                                            <th>TYPE ACTIVITÉ</th>
                                            <th>N° ENTITÉ CIBLE</th>
                                            <th>TYPE ENTITÉ CIBLE</th>
                                            <th>ACTION</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp

                                        @forelse ($activities as $activity)

                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $activity->created_at }}</td>
                                                <td>{{ $activity->log_name }}</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        {{ $activity->event }}
                                                    </span>
                                                </td>
                                                <td>{{ $activity->subject_id }}</td>
                                                <td>{{ $activity->subject_type }}</td>
                                                <td>
                                                    <a type="button" href="{{ route('activity.show', $activity) }}"
                                                    class="btn btn-sm btn-outline-info"><i
                                                        class="fa fa-eye"></i> Détail</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr class="text-center ">
                                                <td colspan="7"> Pas d'activités pour cet utilisateur.</td>
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
