<x-layouts.app>

    <div class="col-sm-12 text-left py-3">

        <a href="{{ route('employee.index') }}" class="btn btn-sm btn-info">
            <i class="fa fa-list" aria-hidden="true"></i> RETOUR À LA LISTE
        </a>

    </div>

    <div class="col-md-12">

        @if (session('success'))

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>

        @endif

        @if (session('error'))

            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('error') }}
            </div>

        @endif

    </div>

    <div class="col-md-12">

        <div class="card card-info">

            <div class="card-header">
                <h3 class="card-title">Editer l'employé</h3>
            </div>

            {!! Form::model($employee, ['route' => ['employee.update', $employee->id], 'method' => 'PUT']) !!}

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="row">

                            {{-- work --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('work_id', 'Sélectionner une fonction*') !!}

                                    <div class="input-group">

                                        {!! Form::select('work_id', $works, $employee->work->id, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Sélectionner une fonction']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('work_id') }}</span>

                                </div>

                            </div>

                            {{-- Gender --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('gender_id', 'Sélectionner un genre*') !!}

                                    <div class="input-group">

                                        {!! Form::select('gender_id', $genders, $employee->human->gender->id, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Sélectionner un genre']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('gender_id') }}</span>

                                </div>

                            </div>

                            {{-- Last name --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('last_name', 'Entrer un nom*') !!}

                                    <div class="input-group">

                                        {!! Form::text('last_name', $employee->human->last_name, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer un nom']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('last_name') }}</span>

                                </div>

                            </div>

                            {{-- first name --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('first_name', 'Entrer un prénom*') !!}

                                    <div class="input-group">

                                        {!! Form::text('first_name', $employee->human->first_name, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer un prénom']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('first_name') }}</span>

                                </div>

                            </div>

                            {{-- Address --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('address', 'Entrer une adresse') !!}

                                    <div class="input-group">

                                        {!! Form::textarea('address', $employee->address, ['class' => 'form-control', 'rows' => '5', 'cols' => '5', 'maxlength' => '255', 'placeholder' => 'Entrer une adresse']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('address') }}</span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="row">

                            {{-- phone number --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('phone_number', 'Entrer un N° de téléphone*') !!}

                                    <div class="input-group">

                                        {!! Form::text('phone_number', $employee->phone_number, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer un N° de téléphone']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('phone_number') }}</span>

                                    @if (session('phone_number_already_provided'))

                                        <span class="text-danger text-sm">
                                            {{ session('phone_number_already_provided') }}</span>

                                    @endif

                                </div>

                            </div>

                            {{-- email --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('email', 'Entrer un email*') !!}

                                    <div class="input-group">

                                        {!! Form::email('email', $employee->user->email, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Entrer un email']) !!}

                                    </div>

                                    <span class="text-danger text-sm">{{ $errors->first('email') }}</span>

                                    @if (session('email_already_provided'))

                                        <span class="text-danger text-sm">
                                            {{ session('email_already_provided') }}</span>

                                    @endif

                                </div>

                            </div>

                            {{-- roles --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('role', 'Sélectionner des rôles') !!}

                                    <span class="btn btn-info btn-xs select-all ml-2">Tout sélectionner</span>
                                    <span class="btn btn-info btn-xs deselect-all">Tout supprimer</span>


                                    <div class="input-group">

                                        {!! Form::select('role[]', $roles, $employee->user->roles, ['class' => 'form-control select2 select2-select', 'multiple' => 'multiple']) !!}

                                    </div>

                                </div>

                            </div>


                            {{-- Permissions --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    {!! Form::label('permission', 'Sélectionner des permissions') !!}

                                    <span class="btn btn-info btn-xs select-all-bis ml-2">Tout sélectionner</span>
                                    <span class="btn btn-info btn-xs deselect-all-bis">Tout supprimer</span>


                                    <div class="input-group">

                                        {!! Form::select('permission[]', $permissions, $employee->user->permissions, ['class' => 'form-control select2 select2-select-bis', 'multiple' => 'multiple']) !!}

                                    </div>

                                </div>

                            </div>

                            {{-- status --}}
                            <div class="col-md-12">

                                <div class="form-group">

                                    @php
                                        $valueOne = $employee->authorized_to_log_in == 1 ? true : null;
                                        $valueTwo = $employee->authorized_to_log_in == 1 ? true : null;
                                    @endphp

                                    <label for="valueOne" class="form-label">
                                        {!! Form::radio('authorized_to_log_in', '1', $valueOne, ['id' => 'valueOne']) !!} Employé Actif ?
                                    </label>

                                    &nbsp;&nbsp;&nbsp;

                                    <label for="valueTwo" class="form-label">
                                        {!! Form::radio('authorized_to_log_in', '0', $valueTwo, ['id' => 'valueTwo']) !!} Employé Dormant ?
                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-info']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

</x-layouts.app>
