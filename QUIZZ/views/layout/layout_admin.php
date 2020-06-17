<?php require_once("./views/layout/inc/header.inc.php");
$user = unserialize($_SESSION['userConnect']);
?>

    <div id="main" style="background:none;" class="d-flex justify-content-center align-items-center ">

        <section style="width:92vw ;">
            <div class="section-header bgPrimary position-relative ">
                <h3 class=" w-100 py-2 d-inline-block text-center">CREER ET PARAMETRER VOS QUIZZ</h3>
         <!--"index.php?origin=deconnexion" -->
                    <a class="deconnexion position-absolute btn btn-primary"
                    style="right: 10px; top: 10px;" id="deconnexion"  href="<?=WEBROOT?>/security/seDeconnecter" role="button">Deconnexion</a>
                <!--  -->
            


            <div class="section-body bgWhite px-5 " style="height: auto;">

                <div class="row d-flex align-items-center h-100">
                    <!-- Menu -->
                    <div class="col-md-4 pl-3">
                        <div class="menu " style="width: 85%;">
                            <div class="menu-header  py-3 d-flex align-items-center justify-content-between px-3">
                                
                                    <img class="img-fluid" style="width: 140px;height: 140px;border-radius: 50%;border: solid 2px #51bfd0;" src="<?=WEBROOT?>/assets/img/Uploads/<?= $user->getAvatar()?>" alt="">
                               
                                <h5 class="text-white"><?= $user->getFullName()?></h5>
                            </div>

                            <nav class="nav flex-column py-3 ">
                            <?php if($_GET['url']=="questions/listQ"){ ?>

                                <a class="nav-link active" style="background:url(<?=WEBROOT?>/assets/img/ic-liste-active.png) no-repeat right;" href="<?=WEBROOT?>/questions/listQ">Lister Question</a>
                            <?php }else{ ?>
                                <a class="nav-link " style="background:url(<?=WEBROOT?>/assets/img/ic-liste.png) no-repeat right;" href="<?=WEBROOT?>/questions/listQ">Lister Question</a>
                                <?php } ?>

                                <?php if($_GET['url']=="security/loadViewInscriptionA"){ ?>
                                <a class="nav-link active" style="background:url(<?=WEBROOT?>/assets/img/ic-ajout-active.png) no-repeat right;" href="<?=WEBROOT?>/security/loadViewInscriptionA">Créer Admin</a>
                                <?php }else{ ?>
                                    <a class="nav-link " style="background:url(<?=WEBROOT?>/assets/img/ic-ajout.png) no-repeat right;" href="<?=WEBROOT?>/security/loadViewInscriptionA">Créer Admin</a>
                                <?php } ?>

                                <?php if($_GET['url']=="jeu/listeJoueur"){ ?>
                                <a class="nav-link active" style="background:url(<?=WEBROOT?>/assets/img/ic-liste-active.png) no-repeat right;" href="<?=WEBROOT?>/jeu/listeJoueur">Liste joueur</a>
                                <?php }else{ ?>
                                <a class="nav-link " style="background:url(<?=WEBROOT?>/assets/img/ic-liste.png) no-repeat right;" href="<?=WEBROOT?>/jeu/listeJoueur">Liste joueur</a>
                                <?php } ?>
                                <?php if($_GET['url']=="questions/creerQuestion"){ ?>
                                <a class="nav-link active" style="background:url(<?=WEBROOT?>/assets/img/ic-ajout-active.png) no-repeat right;" href=" <?=WEBROOT?>/questions/creerQuestion">Creer Question</a>
                                <?php }else{ ?>
                                    <a class="nav-link" style="background:url(<?=WEBROOT?>/assets/img/ic-ajout.png) no-repeat right;" href=" <?=WEBROOT?>/questions/creerQuestion">Creer Question</a>
                                <?php } ?>
                            </nav>
                        </div>
                    </div>

                    <!-- Form inscription -->

                    <div class="col-md-8">
                        
                    <?= $content_for_layout ?> 

                    </div>

                </div>

            </div>
        </section>
    </div>
   
    <?php require_once("./views/layout/inc/footer.inc.php") ?>