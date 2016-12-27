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
    </body>
</html>
