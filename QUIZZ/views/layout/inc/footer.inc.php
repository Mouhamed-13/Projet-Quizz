

<script type="text/javascript" src="<?=WEBROOT?>/assets/js/validationInput.js"></script>

<script type="text/javascript" src="<?=WEBROOT?>/assets/js/validateQuestion.js"></script>
        </div>
    </div>
        </div>
    </div>

    <script type="text/javascript" src="<?=WEBROOT?>/assets/js/modal.js"></script>
    <script type="text/javascript" src="<?=WEBROOT?>/assets/js/main.js"></script>
        <div>

 <script>
 const decon = document.getElementById('deconnexion');
if(decon != null){
    decon.addEventListener("click", e => {
        if(!confirm('Voulez vous se deconnecter ?')){
            e.preventDefault();
        }
    });
}
 
 
 </script>       
</body>

</html>