<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/app.css">

        <title>Mnemosine</title>
    </head>
    <body>
      <div class="container centralizar-login">
        <div class="row">
          <div class="col-xs-12">
            <h3>LOGO</h3>
            <form class="form-horizontal" method="post">
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Seu e-mail" required>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Sua senha mestra" required>
              </div>

              <div class="form-group">
                <label>
                  <input type="checkbox"> Lembrar e-mail
                </label>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    <img src="img/locked-padlock.png" alt="Cadeado">
                    Abrir cofre
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row" id="app">
          <div class="col-md-3 show-grid">
              <div class="container-fluid">
                  <form class="form-horizontal" method="post">
                      <div class="form-group">
                          <select class="form-control" name="vault">
                              <option v-for="vault in vaults.getVaults()" value="vault.id" v-text="vault.name"></option>
                          </select>
                      </div>

                      <div class="form-group no-margin-bottom">
                          <div class="col-md-3 align-menu-itens no-padding">
                              <div class="align-left">
                                  <a href="#" class="btn btn-link no-padding" role="button">Todos itens</a>
                              </div>

                              <div class="align-right">
                                  <span v-text="logins.count()"></span>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-3 align-menu-itens no-padding">
                              <div class="align-left">
                                  <a href="#" class="btn btn-link no-padding" role="button">Favoritos</a>
                              </div>

                              <div class="align-right">
                                  <span>0</span>
                              </div>
                          </div>
                      </div>

                      <fieldset class="form-group">
                          <legend>Categorias</legend>

                          <div class="form-group no-margin-bottom align-menu-itens col-md-3">
                              <div class="align-left">
                                  <a href="#" class="btn btn-link" role="button">Logins</a>
                              </div>

                              <div class="align-right">
                                  <span v-text="logins.count()"></span>
                              </div>
                          </div>

                          <div class="form-group no-margin-bottom align-menu-itens col-md-3">
                              <div class="align-left">
                                  <a href="#" class="btn btn-link" role="button">Notas seguras</a>
                              </div>

                              <div class="align-right">
                                  <span>1</span>
                              </div>
                          </div>
                      </fieldset>

                      <div class="form-group">
                          <div class="col-md-3 fixed-at-bottom">
                              <div class="col-md-3 align-menu-itens">
                                  <div class="align-left">
                                      <div class="dropup">
                                          <button id="menu-add" type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-plus-square-o fa-2x"></i>
                                          </button>

                                          <ul class="dropdown-menu" aria-labelledby="menu-add">
                                              <li><a href="#">Login</a></li>
                                              <li><a href="#">Nota segura</a></li>
                                              <li role="separator" class="divider"></li>
                                              <li><a href="#">Usuário</a></li>
                                              <li><a href="#">Grupo</a></li>
                                              <li role="separator" class="divider"></li>
                                              <li><a href="#">Configurações</a></li>
                                          </ul>
                                      </div>
                                  </div>

                                  <div class="align-right">
                                      <i class="fa fa-trash-o fa-2x"></i>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </form>
              </div>
          </div>

          <div class="col-md-3 show-grid scrollable">
              <form class="form-horizontal" method="post">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-search fa-lg"></i></span>
                          <input type="text" class="form-control" name="search" placeholder="Pesquisar">
                      </div>
                  </div>

                  <div class="form-group">
                      <div id="text-sort">
                          <span id="sort-count">3</span>
                          <span>itens ordenados por</span>
                          <div id="sort-type" class="dropdown">
                              <button id="sort" type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Título
                                  <span class="caret"></span>
                              </button>

                              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="sort">
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio1" value="titulo" checked>
                                              Título
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio2" value="ip">
                                              IP
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio3" value="freq_uso">
                                              Frequência de uso
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio4" value="data_mod">
                                              Data de modificação
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio5" value="data_cri">
                                              Data de criação
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio6" value="data_ult_uso">
                                              Data de último uso
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio7" value="forca_senha">
                                              Força da senha
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListType" id="optionRadio8" value="idade_senha">
                                              Idade da senha
                                          </label>
                                      </div>
                                  </li>
                                  <li role="separator" class="divider"></li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListOrder" id="optionRadio9" value="ord_cres" checked>
                                              Ordem crescente
                                          </label>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" class="radio-no-circle" name="sortListOrder" id="optionRadio10" value="ord_dec">
                                              Ordem decrescente
                                          </label>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>

                      @include('logins')
                  </div>
              </form>
          </div>


          <div class="col-md-6 show-grid">

          </div>
      </div>
    </body>
</html>
