<x-layouts.app>

    <div class="row">

        <div class="col-sm-12 text-left py-3">

            <a href="{{ route('activity.index') }}" class="btn btn-sm btn-info">
                <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
            </a>

        </div>

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">DETAIL DU JOURNAL D'ACTIVITÉS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">



                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>
                                            <th>CHAMPS</th>
                                            <th>VALEURS</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Date de l'activité</td>
                                            <td>{{ $activity->created_at }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nom de l'activité</td>
                                            <td>{{ $activity->log_name }}</td>
                                        </tr>


                                        <tr>
                                            <td>Opération</td>
                                            <td>
                                                <span class="badge badge-warning">
                                                    {{ $activity->event }}
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>N° de l'entité cible</td>
                                            <td>{{ $activity->subject_id }}</td>
                                        </tr>

                                        <tr>
                                            <td>Type de l'entité cible</td>
                                            <td>{{ $activity->subject_type }}</td>
                                        </tr>


                                        <tr>
                                            <td>Données créées, modifiées ou supprimées</td>
                                            <td>{{ $activity->properties }}</td>
                                        </tr>

                                        <tr>
                                            <td>N° de l'auteur</td>
                                            <td>{{ $activity->causer_id ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <td>Type de l'auteur</td>
                                            <td>{{ $activity->causer_type ?? '-' }}</td>
                                        </tr>


                                        <tr>
                                            <td>Nom & Prénom de l'auteur</td>
                                            <td>{{ $activity->causer->employee->human->last_name ?? '' }}
                                                {{ $activity->causer->employee->human->first_name ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <td>Adresse de l'auteur</td>
                                            <td>{{ $activity->causer->employee->address ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone de l'auteur</td>
                                            <td>{{ $activity->causer->employee->phone_number ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email de l'auteur</td>
                                            <td>{{ $activity->causer->email ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <td>Détail de l'activité</td>
                                            <td>{{ $activity->description }}</td>
                                        </tr>

                                    </tbody>

                                </table>

                            

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
