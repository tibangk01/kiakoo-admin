<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">

                        <h2 class="lead"><b>{{ Auth::user()->employee->human->last_name .' '. Auth::user()->employee->human->first_name }}</b></h2>
                        <h2 class="lead">{{ Auth::user()->employee->work->name }}</h2>

                        <ul class="ml-4 mb-0 mt-5 fa-ul text-muted">

                            <li class="small"><span class="fa-li"><i
                                        class="fas fa-lg fa-history"></i></span> Dernière connexion : {{ Auth::user()->logins->last()->created_at->diffForHumans() }}</li>

                            <li class="small"><span class="fa-li"><i
                                        class="fas fa-lg fa-building"></i></span> Adresse : {{ Auth::user()->employee->address?? '-' }} </li>

                            <li class="small"><span class="fa-li"><i
                                        class="fas fa-lg fa-phone"></i></span> Contact : {{ Auth::user()->employee->phone_number ?? '-' }}
                                    </li>
                            <li class="small"><span class="fa-li"><i
                                        class="fas fa-lg fa-envelope"></i></span>Email : {{ Auth::user()->email }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="{{ Auth::user()->getMedia('avatar')->first()->getUrl('thumb') ?? asset('adminLte/img/avatar-default.png') }}"
                            alt="user-avatar" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="{{ route('profile.show') }}" class="btn btn-info">
                        Modifier vos informations
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
