

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Autentificare
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form action="templates/procesare_login.php" id="formLogin" method="post">

                    <div class="form-group">
                        <label>Utilizator</label>
                        <input class="form-control" name="login_user" type="text">
                        <p class="help-block">Introdu aici utilizatorul</p>
                    </div>

                    <div class="form-group">
                        <label>Parola</label>
                        <input class="form-control" name="login_parola" type="password">
                        <p class="help-block">Introdu aici parola</p>
                    </div>

                    <button type="submit" class="btn btn-default">Autentificare</button>
                    <button type="reset" class="btn btn-default">Resetare</button>

                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <a href="index.php?pagina=resetareparola" class="btn btn-default">Am uitat parola!</a>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>