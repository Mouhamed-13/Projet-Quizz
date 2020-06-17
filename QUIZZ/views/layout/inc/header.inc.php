<!doctype html>
<html lang="en">

<head>

    <title>Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=WEBROOT?>/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/styleBreadcrumb.css">
    <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/homeAdmin.css">
    <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/fin.css">
       <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/styleCheck.css">
       <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/modal.css">
       <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/styleCheckAdmin.css">
       <link rel="stylesheet" type="text/css" href="<?=WEBROOT?>/assets/css/creerQuestion.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

</head>

<script type="text/javascript">

window.onload = function() {
       setTimeout(function(){ 
               document.getElementById("alert").style.display='none';
           }, 3000);
       }
   </script>

<body>

    <header class="bgSecondary">
      
        <div class="logo"></div>
        <div class="titre">Le plaisir de jouer</div>
        
        
        
    </header>
    <style>
    
    .titre{
      text-align: center;
    color: white;
    line-height: 2.5em;
    font-size: 35px;
    }
    .logo{
    background: url('<?=WEBROOT?>/assets/img/logo-QuizzSA.png');
    background-size: cover;
    float: left;
    margin-left: 10px;
    margin-top: 10px;
    height: 100%;
    width: 40px;

    }
     body{
        background:url('<?=WEBROOT?>/assets/img/Background.png') ;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 10px;
      }
      * {
  box-sizing: border-box;
}
.tabs {
  display: flex;
    flex-direction: row;
  justify-content: center;
  flex-wrap: wrap;
  max-width: 700px;
  background: #efefef;
  box-shadow: 0 48px 80px -32px rgba(0,0,0,0.3);
}
.input {
  position: absolute;
  opacity: 0;
}
.label {
  width: 100%;
  padding: 20px 30px;
  background: #e5e5e5;
  cursor: pointer;
  font-weight: bold;
  font-size: 18px;
  color: #3addd6;
  transition: background 0.1s, color 0.1s;
}

.label:hover {
  background: #d8d8d8;
}

.label:active {
  background: #ccc;
}

.input:focus + .label {
  box-shadow: inset 0px 0px 0px 3px #2aa1c0;
  z-index: 1;
}

.input:checked + .label {
  background: #fff;
  color: #818181;
}

@media (min-width: 600px) {
  .label {
    width: auto;
  }
}
.panel {
  display: none;
  padding: 20px 30px 30px;
  background: #fff;
}

@media (min-width: 600px) {
  .panel {
    order: 99;
  }
}

.input:checked + .label + .panel {
  display: block;
}

    
    .right-deux p{
        font-size: 23px;
        margin: 14px 0px 0px 31px;
      }
      .right-deux h5{
        text-align:start;
      }
      .left-trois p{
margin-left: 10px;
      }
      
      .right-one p{
        color:black;
        font-size: 20px;
        margin: 14px 0px 0px 31px;
      }

    .input-validation
    {
		position: relative;
		font-size: 80%;
		left: 20%;
		color: red;
	}
    ul li{
        color:black;
    }

    .LJmiddleJoueur tr{
      color: #818181;
    }

    
    </style>