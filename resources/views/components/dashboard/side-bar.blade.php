<aside class="main-sidebar sidebar-dark-info elevation-4">

    <a href="{{ route('dashboard.index') }}" class="brand-link">

        <img src="{{ asset('adminLte/img/AdminLTELogo.png') }}" alt="Kiakoo Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">{{ config('app.name') ?? 'Kiakoo' }}</span>

    </a>

    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">

                    <a href="{{ route('dashboard.index') }}" class="nav-link active">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>Tableau de bord</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Utilisateurs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Rôles</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Gestion des utilisateurs</p>
                            </a>

                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        &nbsp;&nbsp; <i class="fa fa-angle-right nav-icon"></i>
                                        <p>Clients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('employee.index') }}" class="nav-link">
                                        &nbsp;&nbsp; <i class="fa fa-angle-right nav-icon"></i>
                                        <p>Employés</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        &nbsp;&nbsp; <i class="fa fa-angle-right nav-icon"></i>
                                        <p>Configurations</p>
                                    </a>

                                    <ul class="nav nav-treeview">

                                        <li class="nav-item">
                                            <a href="{{ route('work.index') }}" class="nav-link">
                                                &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-angle-right nav-icon"></i>
                                                <p>Fonctions</p>
                                            </a>
                                        </li>

                                    </ul>

                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tshirt"></i>
                        <p>Produits</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                &nbsp;&nbsp; <i class="fa fa-angle-right nav-icon"></i>
                                <p>Gestion des produits</p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('product.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Produits</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('variation.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Variations</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                &nbsp;&nbsp; <i class="fa fa-angle-right nav-icon"></i>
                                <p>Configurations</p>
                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('taxonomy.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Catégories</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('taxon.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Sous-catégories</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('taxon-child.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Familles</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('brand.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Marques</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('property.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Propriétés</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('property-value.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Valeurs de propriétés</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('state.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>États</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('packing.index') }}" class="nav-link">
                                        &nbsp;&nbsp;&nbsp; &nbsp;<i class="fa fa-angle-right nav-icon"></i>
                                        <p>Conditionnements</p>
                                    </a>
                                </li>

                            </ul>

                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Marketing
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('discount.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Réductions</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('promocode.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Codes promotionnels</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Registres d'activités
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('activity.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Journal d'activités</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('authentication-log.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Journal de connexions</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-cog"></i>

                        <p>Paramètres</p>

                    </a>

                </li>

        </nav>

    </div>

</aside>
