<x-layouts.app>

    <div class="col-sm-12 text-left py-3">
        <a href="{{ route('role.index') }}" class="btn btn-sm btn-info">
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

    </div>

    <div class="col-md-12">

        <div class="card card-info">

            <div class="card-header">

                <h3 class="card-title">Editer le rôle</h3>

            </div>


            {!! Form::model($role, ['route' => ['role.update', $role->id], 'method' => 'PUT']) !!}

            <div class="card-body">

                <div class="form-group">

                    {!! Form::label('name', 'Dénomination de le rôle') !!}

                    <div class="input-group">

                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}

                    </div>

                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>

                    @if (session('name_already_provided'))

                        <span class="text-danger text-sm">
                            {{ session('name_already_provided') }}
                        </span>

                    @endif

                </div>

                <div class="form-group">

                    {!! Form::label('permission', 'Sélectionner des autorisations') !!}

                    <span class="btn btn-info btn-xs select-all ml-2">Tout sélectionner</span>
                    <span class="btn btn-info btn-xs deselect-all">Tout supprimer</span>

                    <div class="input-group">

                        {!!Form::select('permission[]', $permissions, $role->permissions, ['class' => 'form-control select2 select2-select', 'multiple' => 'multiple']) !!}

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
