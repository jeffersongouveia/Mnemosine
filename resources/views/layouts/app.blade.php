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
                <a href="#" class="btn btn-link" role="button">Todos itens</a>
                <span>3</span>
            </div>

            <div class="form-group">
              <a href="#" class="btn btn-link" role="button">Favoritos</a>
              <span>1</span>
            </div>

            <fieldset class="form-group">
              <legend>Categorias</legend>

              <div class="form-group no-margin-bottom">
                <a href="#" class="btn btn-link" role="button">Logins</a>
                <span>3</span>
              </div>

              <div class="form-group no-margin-bottom">
                <a href="#" class="btn btn-link" role="button">Notas seguras</a>
                <span>1</span>
              </div>
            </fieldset>

            <div class="form-group">
              <div class="col-md-3 fixed-at-bottom">
                <div>
                  <a id="menu-add" href="#"><img src="img/add.png" alt="Menu de adição"></a>
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
    </div>
  </body>
</html>
