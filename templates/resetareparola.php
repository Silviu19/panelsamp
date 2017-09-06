<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Resetare parola
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form action="templates/procesare_resetare.php" id="formLogin" method="post">

                    <div class="form-group">
                        <label>Utilizator</label>
                        <input class="form-control" name="reset_user" type="text">
                        <p class="help-block">Introdu aici utilizatorul</p>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="reset_email" type="text">
                        <p class="help-block">Introdu aici emailul tau</p>
                    </div>

                    <button type="submit" class="btn btn-default">Restare parola</button>

                </form>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

