<x-layouts.app>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">JOURNAL DE CONNEXIONS</h3>

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
                                            <th>TYPE UTILISATEUR</th>
                                            <th>ADRESSE IP</th>
                                            <th>PLATFORME</th>
                                            <th>NAVIGATEUR</th>
                                            <th>DERNIÈRE CONNEXION</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp

                                        @forelse ($authenticationLogs as $authenticationLog)

                                            <tr>

                                                <td> {{ ++$i }}</td>

                                                {{--
                                                    TODO: format for customer & for employee --}}
                                                <td>{{ $authenticationLog->user->id}}
                                                </td>

                                                @if ($authenticationLog->user->user_type == config('kiakoo.user_type.employee'))

                                                    <td class="text-center">
                                                        <span class="right badge badge-info">Employé(e)</span>
                                                    </td>

                                                @else

                                                    <td class="text-center">
                                                        <span class="right badge badge-warning">Client(e)</span>
                                                    </td>

                                                @endif

                                                <td>{{ $authenticationLog->ip_address }}</td>

                                                <td>{{ $authenticationLog->device->platform }}</td>

                                                <td>{{ $authenticationLog->device->browser . ', ' . $authenticationLog->device->browser_version . ',' . $authenticationLog->device->language }}
                                                </td>

                                                <td> {{ $authenticationLog->created_at }}</td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="7"> Pas d'enregistrement.</td>
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
