<div id="connexion-form" class="w-25">

            <div class="connexion-form-header">
                <h3 class="bgPrimary h5 p-3 m-0">Login form</h3>
            </div>

            <div class="connexion-form-body bgWhite p-3">

                         <?php if (isset($err_login)) {
                            
                            ?>
                        <small id="helpId" class="text-danger"><?= $err_login ?></small>
                        <?php }
                            ?>

                <form class="py-2" method="post" action="<?=WEBROOT?>/security/seConnecter">
                    <div class="form-group ">
                        <input type="text" placeholder="Login" name="login" class="form-control" id="text">
                        <?php if (isset($erreurs['login'])) {
                            
                            ?>
                        <small id="helpId" class="text-danger"><?= $erreurs['login'] ?></small>
                        <?php }
                            ?>
                    </div>

                    <div class="form-group py-2">
                        <input type="password" placeholder="Password" name="pwd" class="form-control">
                        <?php if (isset($erreurs['pwd'])) {
                            
                        ?>
                        <small id="helpId" class="text-danger"><?= $erreurs['pwd'] ?></small>
                        <?php }
                            ?>
                    </div>


                    <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
                    <a href="<?=WEBROOT?>/security/loadViewInscriptionJ" class="text-secondary pl-5">S'inscrire pour jouer</a>
                </form>
            </div>

        </div>