<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">

    <title>{{config('app.name')}}</title>
</head>
<body>
    <div class="columns" id="app">
        <div class="column is-2 show-grid">
            <aside class="menu menu-center">
                <ul class="menu-list">
                    <li>
                        <div class="select is-fullwidth">
                            <select title="Selecione um cofre para ver seus itens relacionados">
                                <option v-for="vault in vaults.getVaults()" value="vault.id" v-text="vault.name"></option>
                            </select>
                        </div>
                    </li>

                    <li>
                        <a>Todos itens<span class="is-pulled-right">X</span></a>
                    </li>

                    <li>
                        <a>Favoritos<span class="is-pulled-right">X</span></a>
                    </li>

                    <p class="menu-label">Categorias</p>
                    <li><a>Logins</a></li>
                    <li><a>Notas seguras</a></li>

                    <li>
                        <a class="is-pulled-left">
                            <app-menu>
                                <span class="icon is-medium">
                                    <i class="fa fa-plus-square-o"></i>
                                </span>
                            </app-menu>
                        </a>

                        <a class="is-pulled-right">
                            <span class="icon is-medium">
                                <i class="fa fa-trash-o"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>

        <div class="column is-3 show-grid">
            <div class="control has-icon">
                <input type="text" class="input" placeholder="Pesquisar">
                <span class="icon is-small">
                    <i class="fa fa-search"></i>
                </span>
            </div>

            <dropdown-sort></dropdown-sort>

            <login-list :items="logins" @select="selectLogin"></login-list>
        </div>

        <div class="column show-grid">
            <login-details :login="loginSelected"></login-details>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
