
<!DOCTYPE html>
<html>
<head>
	<title>walkap</title>

	<!-- Insertion du fichier css pour le style -->
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8" style="padding : 0.5em;">
				<div class="card bg-light">
					<div class="card-body">
						<h2 class="card-title">
							<!-- On traite l'information lorsque c'est soumit -->
							<?php
							if(isset($_POST['nombre'])){
                               	//On filtre le nombre et on se rassure que le nombre n'est pas une chaine de caractere et est dans l'intervale [1,20]
								if(filter_var($_POST['nombre'], FILTER_VALIDATE_INT) === false || intval($_POST['nombre']) < 1 || intval($_POST['nombre']) > 20 ){
									echo 'Veuillez entrer un nombre entre 1 et 20';
								}else{
                               		//Si le nombre est divisible par 3 et 5 on affiche walkap
									if(intval($_POST['nombre'])%3 == 0 && intval($_POST['nombre'])%5 == 0){
										echo "Walkap";
									}
                               		//Si le nombre est divisible par 3 on affiche wal
									else if(intval($_POST['nombre'])%3 == 0){
										echo "Wal";
									}
                               		//Si le nombre est divisible par 3 on affiche wal
									else if(intval($_POST['nombre'])%5 == 0){
										echo "Kap";
									}
									else{
										//On ecrit le nombre
										echo $_POST['nombre'];
									}
								}
							}
							?>
						</h2>
						<!-- Debut du formulaire -->
						<form method="POST" action="" id="form-nombre" onsubmit="return verification();">
							<div class="form-group">
								<label for="nombre" class="col-form-label">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre"
								placeholder="">
								<div id="nombre-feedback" class="invalid-feedback">

								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Valider</button>
							</div>
						</form>
						<!-- fin du formulaire -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Code javascript de verification -->
	<script type="text/javascript">

		function verification(){

    //On determine le format du nombre
    var a = /^[0123456789]/;
   	//On recupere la valeur du nombre entré
   	var nombre = document.getElementById('nombre').value;

      //On s'assure que le nombre entré respecte le format
      if(!a.test(nombre)){

      	//Message qui s'affiche lorsque le format n'est respecté
      	document.getElementById('nombre-feedback').innerHTML = "Veuillez entrer un nombre entre 1 et 20";
      	document.getElementById('nombre-feedback').style.display = 'block';
      	//On enpeche l'envoie du formulaire
      	return false;

      }else if(parseINT(nombre) < 1 || parseINT(nombre) > 20){

      	//Message qui s'affiche lorsque le format n'est respecté
      	document.getElementById('nombre-feedback').innerHTML = "Veuillez entrer un nombre entre 1 et 20";
      	document.getElementById('nombre-feedback').style.display = 'block';
      	//On enpeche l'envoie du formulaire
      	return false;

      }

  }
</script>

</body>
</html>
