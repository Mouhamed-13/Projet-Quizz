
        <div id="inscription-form" class="w-50 bgWhite container rounded  text-secondary py-2">
            <div class=" inscription-form-header">
                <h1 class="h4 m-0">S'INSCRIRE</h1>
                <p class="mb-1 ">Pour proposer un quizz</p>
                <hr class="w-50 m-0">
            </div>

            <div class="inscription-form-body row">
                <div class="col-md-7">
                     <?php if (isset($err_login)) {
                            
                            ?>
                        <small id="helpId" class="text-danger"><?= $err_login ?></small>
                        <?php }
                            ?>
                        <?php if (isset($erreurs['image'])) {
                            
                            ?>
                        <small id="helpId" class="text-danger"><?= $erreurs['image']?></small>
                        <?php }
                            ?>
                    <form class="pr-5" id="form-inscription" method="post" action="<?=WEBROOT?>/security/creerUtlisateur" enctype="multipart/form-data">
                    
                        <div class="form-group mb-1">
                            <label class="m-0 p-1" for="prenom">Prenom</label>
                            <input name="prenom" type="text" error="error_prenom" class="form-control" id="prenom">
                            <small class="text-danger" id="error_prenom"></small>
                        </div>

                        <div class="form-group mb-1">
                            <label class="m-0 p-1" for="nom">Nom</label>
                            <input name="nom" type="text" error="error_nom" class="form-control" id="nom">
                            <small class="text-danger" id="error_nom"></small>
                        </div>

                        <div class="form-group  mb-1">
                            <label class="m-0 p-1" for="login" >Login</label>
                            <input name="login" type="text" error="error_login" class="form-control" id="login">
                            <small class="text-danger" id="error_login"></small>
                        </div>

                        <div class="form-group mb-1">
                            <label class="m-0 p-1" for="password1">Password</label>
                            <input name="password1" type="password" error="error_pwd1" class="form-control" id="password1">
                            <small class="text-danger" id="error_pwd1"></small>
                            <?php if (isset($erreurs['password1'])) {
                            
                                ?>
                            <small id="helpId" class="text-danger"><?= $erreurs['password1'] ?></small>
                            <?php }
                                ?>
                        </div>

                        <div class="form-group mb-1">
                            <label class="m-0 p-1" for="password2" >Confirmer Password</label>
                            <input name="password2" type="password" error="error_pwd2" class="form-control" id="password2">
                            <small class="text-danger" id="error_pwd2"></small>
                        </div>

                        <div class="form-group  my-2 d-flex justify-content-between">
                        <button class="btn-uploadImage" style="background-color: #3addd6;border: 1px solid #fff;color: white;/* width: 221px; */height: 47px;z-index: 3;margin-left: 167px;padding: 8px 25px;border-radius: 10px;font-size: 22px;font-weight: bold;">Choisir Image</button>
                           <input type="file" style="/* right: 0; *//* top: 0; */opacity: 0;z-index: 4;margin: 3px 0px 0px 170px;position: fixed;font-size: 11px;height: 44px;width: 222px;color:white;" name="imgUser"  id="imgUser">
                            
                        </div>

                        <button type="submit" name="btn_inscription" class="btn btn-primary">Creer compte</button>

                        </form>

                </div>
                <div class="col-md-4">
                    <div class="avatar w-75 ">
                        <img class="img-fluid" id="avatar" src="./img/" alt="">
                    </div>
                </div>
            </div>


            <script>
                    //console.log() permet de faire le débuggage quand il y a erreur
                    //On va dans inspecter et console pour voir les messages

                    //Js
                    /*
                    1)Recuperer l'element(balise) sur lequel on veut faire un traitement
                        On peut récuperer à travers :
                            a)id
                                document.getElementById("id")
                                document.querySelector("#id")
                            b)nomBalise
                                document.getElementsByTagName("balise")
                                document.querySelectorAll("balise")
                            c)classe
                                document.getElementsByClassName("classe")
                                document.querySelectorAll(".nomClasse")
                    2)Evenement: fait qui lorsqu'il se realise dans la page alors on déclenche
                        2_1)un ensemble de Traitement

                            _click
                            _blur
                            _mouseover
                            _mousedown
                            _keyup

                        2_2)Ecouteur d'evenement

                            var elt=document.getElementById("id")
                            elt.addEventListener("nomEvt",function(event){
                                //Actions à effectuer

                            })
                            //event:Contient toutes les informations de l'evenement déclenché
                            event.target=>source de l'evenement


                            for(let elt of tableau){

                            }

                    */

            /*const prenom=document.getElementById("prenom")
            const errorPrenom=document.getElementById("error_prenom")
            
            document.getElementById("form-inscription").addEventListener("submit",function(){
                //let: lorsqu'on déclare une variable avec let alors cette variable n'est
                //disponible que dans le bloc actuel
                let valid=true;
                //Prenom est Vide
                if (!prenom.value.trim()) {
                    valid=false
                    errorPrenom.innerText="Champ obligatoire"
                    //innerHTML=>ajouter du contenu HTML dans une balise HTML
                } 

            })

            prenom.addEventListener("keyup",function(event){
                errorPrenom.innerText="";

            })*/

            //NB:l'ecouteur on le pose sur un élément mais pas sur un tableau
            const inputs=document.getElementsByTagName("input")
            for(let input of inputs){

                input.addEventListener("keyup",function(event){
                if (event.target.hasAttribute("error")) {
                    //recuperer la valeur de l'attribut error
                    let idSmall=event.target.getAttribute("error")
                    //recuperer l'objet Small
                    const errorSmall=document.getElementById(idSmall)
                    errorSmall.innerText=""
                    //innerHTML=>ajouter du contenu HTML dans une balise HTML
                }

                })



                }




            document.getElementById("form-inscription").addEventListener("submit",function(){
            let valid=true;  
                for(let input of inputs){
                   
                //chaque Input est Vide
                if (!input.value.trim()) {
                    valid=false
                   //Verifie si l'attribut error existe dans le input
                    if (input.hasAttribute("error")) {
                         //recuperer la valeur de l'attribut error
                        let idSmall=input.getAttribute("error")
                        //recuperer l'objet Small
                        const errorSmall=document.getElementById(idSmall)
                        errorSmall.innerText="Champ obligatoire"
                        //innerHTML=>ajouter du contenu HTML dans une balise HTML
                    }
                    } 
                                
                }

                //Empeche le Rechargement de page
                if (valid==false) {
                    event.preventDefault();
                    return false;   
                }

                }); 


                //Chargement de l'image
                const imgUpload=document.querySelector("#imgUser")

                function prevUpload(){
                    //Récuperation de l'image du champ input
                    let fileImg=imgUpload.files[0]
                    //Transformer l'image en un flux d'octets
                    let reader=new FileReader()
                    if(fileImg){
                        reader.readAsDataURL(fileImg)
                        reader.onloadend=function(){
                            const avatar=document.querySelector("#avatar")
                            avatar.src=reader.result
                            avatar.style.width="50px"
                            avatar.style.width="175px"
                            avatar.style.borderRadius="50% "
                        }
                    }

                }

                //Ecouteur d'Evenement
                imgUpload.addEventListener("change",prevUpload);


                

                /*function prevUpload(){

                }
                ou

                prevUpload=function(){

                }
                ou
                //fonction fléché(Arrow fonction)
                prevUpload=()=>{

                }
                
                
                
                */

               
            

            
            </script>


        