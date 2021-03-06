@extends('layouts.app')

@section('content')
    @include('menu')

    <div id="side-menu" class="columns">
        <div class="column is-2 show-grid">
            <aside class="menu menu-center">
                <ul class="menu-list">
                    <li>
                        <vaults></vaults>
                    </li>

                    <li>
                        <router-link to="/all">
                            Todos itens<span class="is-pulled-right">X</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/favorites">
                            Favoritos<span class="is-pulled-right">X</span>
                        </router-link>
                    </li>

                    <p class="menu-label">Categorias</p>
                    <li>
                        <router-link to="/equipments">Equipamentos</router-link>
                    </li>
                    <li>
                        <router-link to="/logins" exact>Logins</router-link>
                    </li>
                    <li>
                        <router-link to="/notes">Notas seguras</router-link>
                    </li>

                    <li>
                        <div class="hold-on-bottom">
                            <router-link to="" exact class="is-pulled-left">
                                <app-menu>
                                    <span class="icon is-medium">
                                        <i class="fa fa-plus-square-o"></i>
                                    </span>
                                </app-menu>
                            </router-link>

                            <router-link to="" exact class="is-pulled-right">
                                <span class="icon is-medium">
                                    <i class="fa fa-trash-o"></i>
                                </span>
                            </router-link>
                        </div>
                    </li>
                </ul>
            </aside>
        </div>

        <div class="column">
            <router-view></router-view>
        </div>
    </div>
@endsection
