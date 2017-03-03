<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">

    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div class="columns" id="app">
        <div class="column is-2 show-grid">
            <aside class="menu menu-center">
                <ul class="menu-list">
                    <li>
                        <div class="select is-fullwidth">
                            <select id="vaults" title="Selecione um cofre para ver seus Logins e Notas Seguras">
                                <option v-for="vault in vaults.getVaults()" :value="vault.id" v-text="vault.name"></option>
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

    <script src="js/app.js"></script>
</body>
</html>
