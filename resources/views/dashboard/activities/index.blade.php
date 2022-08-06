<x-layouts.app>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">JOURNAL D'ACTIVITÉS</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">



                                <table class="table table-bordered table-striped dataTable">

                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>DATE CRÉATION</th>
                                            <th>NOM ACTIVITÉ</th>
                                            <th>TYPE ACTIVITÉ</th>
                                            <th>N° AUTEUR</th>
                                            <th>TYPE AUTEUR</th>
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
                                                        {{ $activity->event }}</td>
                                                    </span>
                                                <td>{{ $activity->causer_id }}</td>
                                                <td>{{ $activity->causer_type }}</td>
                                                <td>{{ $activity->subject_id }}</td>
                                                <td>{{ $activity->subject_type }}</td>
                                                <td>
                                                    <a type="button btn-sm"
                                                        href="{{ route('activity.show', $activity) }}"
                                                        class="btn btn-outline-info"><i class="fa fa-eye"></i>
                                                        Détail</a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="8"> Pas d'enregistrement.</td>
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

</x-layouts.app>
