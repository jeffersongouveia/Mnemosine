<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/app.css">

    <title>{{ config('app.name') }}</title>
  </head>
  <body>
    <div class="row">
      <div class="col-md-3 show-grid">
        <div class="container-fluid">
          <form class="form-horizontal" method="post">
            <div class="form-group">
              <select class="form-control" name="vault">
                <option value="1">Cofre</option>
                <option value="2">Segundo cofre</option>
              </select>
            </div>

            <div class="form-group no-margin-bottom">
              <div class="col-md-3 align-menu-itens no-padding">
                <div class="align-left">
                  <a href="#" class="btn btn-link no-padding" role="button">Todos itens</a>
                </div>

                <div class="align-right">
                  <span>3</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3 align-menu-itens no-padding">
                <div class="align-left">
                  <a href="#" class="btn btn-link no-padding" role="button">Favoritos</a>
                </div>

                <div class="align-right">
                  <span>1</span>
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
                  <span>3</span>
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
                <div class="dropup">
                  <button id="menu-add" type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/add.png" alt="Menu de adição">
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

                <div>
                  <a id="trash" href="#"><img src="img/garbage.png" alt="Acesso à Lixeira"></a>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>

      <div class="col-md-3 show-grid">
      </div>

      <div class="col-md-6 show-grid">
      </div>

      <script src="js/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    </div>
  </body>
</html>
