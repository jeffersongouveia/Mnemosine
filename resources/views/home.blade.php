@extends('layouts.app')

@section('content')
    <nav class="nav has-shadow">
        <div class="nav-left">
            <a class="nav-item">
                <img src="img/mnemosine.png" class="image" alt="Mnemosine logo">
            </a>
        </div>

        <div class="nav-right nav-menu">
            <div class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="button is-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="columns">
        <div class="column is-2 show-grid">
            <aside class="menu menu-center">
                <ul class="menu-list">
                    <li>
                        <div class="select is-fullwidth">
                            <select id="vaults" title="Selecione um cofre para ver seus Logins e Notas Seguras">
                                <option v-for="vault in getVaults" :value="vault.id" v-text="vault.name"></option>
                            </select>
                        </div>
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
