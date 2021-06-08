<!DOCTYPE html>
<html>
<head>
	<title>Web Service : Gestion Clients</title>
	<meta charset="utf-8">
	<style>
        .page {
        	background: yellow;
        }
        .titre {
        	background: red;
        }
        .bordure {
            border : 5px solid black; 
        }
    </style>
</head>
<body class="page">

	<!-- Header-->
	<header>bastienprob@gmail.com</header>

	<h1>Les Web Services : CRUD</h1>

	<!-- ////////////////////////////// CREATE //////////////////////////////-->

	<p class="titre">Create</p>

	<form method="post" class="bordure"> <!-- Formulaire en méthode POST-->
		Ecrire "create" ici : <input type="text" name="METHOD" id="METHOD"> </br> <!-- Pour s'assurer d'appliquer la bonne méthode, obligatoire à remplir-->
    	<label for="Nouveau client">Nouveau client</label> </br>
    	<label for="NCLI">NCLI</label>
    	<input type="text" name="NCLI" id="NCLI"> </br>
    	<label for="NOM">NOM</label>
    	<input type="text" name="NOM" id="NOM"> </br>
    	<label for="ADRESSE">ADRESSE</label>
    	<input type="text" name="ADRESSE" id="ADRESSE"> </br>
    	<label for="LOCALITE">LOCALITE</label>
    	<input type="text" name="LOCALITE" id="LOCALITE"> </br>
    	<label for="CAT">CAT</label>
    	<input type="text" name="CAT" id="CAT"> </br>
    	<label for="COMPTE">COMPTE</label>
    	<input type="number" name="COMPTE" id="COMPTE"> </br>
    	<button>Enregistrer</button>
	</form>

	<!-- ////////////////////////////// READ //////////////////////////////-->

	<p class="titre">Read</p>

	<table class="bordure"> <!-- Tableau où stocker et afficher les valeurs-->
    <thead>
        <th>NCLI</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Localite</th>
        <th>Categorie</th>
        <th>Compte</th>
    </thead>
    <tbody>
        <?php
        require_once('DbOperations.php');
        foreach($res as $client){
            ?>
            <tr>
                <td><?= $client['NCLI'] ?></td>
                <td><?= $client['NOM'] ?></td>
                <td><?= $client['ADRESSE'] ?></td>
                <td><?= $client['LOCALITE'] ?></td>
                <td><?= $client['CAT'] ?></td>
                <td><?= $client['COMPTE'] ?></td>
            </tr>
            <?php
            require_once('DbOperations.php');
        }
        ?>
    </tbody>
	</table>

	<!-- ////////////////////////////// UPDATE //////////////////////////////-->

	<p class="titre">Update</p>

	<form method="post" class="bordure"> <!-- Formulaire en méthode POST-->
		Ecrire "update" ici : <input type="text" name="METHOD" id="METHOD"> </br> <!-- Pour s'assurer d'appliquer la bonne méthode, obligatoire à remplir-->
    	<label for="Modifier client">Modifier client</label> </br>
    	<label for="NCLI">NCLI</label>
    	<input type="text" name="NCLI" id="NCLI"> </br>
    	<label for="NOM">NOM</label>
    	<input type="text" name="NOM" id="NOM"> </br>
    	<label for="ADRESSE">ADRESSE</label>
    	<input type="text" name="ADRESSE" id="ADRESSE"> </br>
    	<label for="LOCALITE">LOCALITE</label>
    	<input type="text" name="LOCALITE" id="LOCALITE"> </br>
    	<label for="CAT">CAT</label>
    	<input type="text" name="CAT" id="CAT"> </br>
    	<label for="COMPTE">COMPTE</label>
    	<input type="number" name="COMPTE" id="COMPTE"> </br>
    	<button>Enregistrer</button>
	</form>

	<!-- ////////////////////////////// DELETE //////////////////////////////-->

	<p class="titre">Delete</p>

	<form method="post" class="bordure"> <!-- Formulaire en méthode POST-->
		Ecrire "delete" ici : <input type="text" name="METHOD" id="METHOD"> </br> <!-- Pour s'assurer d'appliquer la bonne méthode, obligatoire à remplir-->
    	<label for="Modifier client">Supprimer client</label> </br>
    	<label for="NCLI">NCLI</label>
    	<input type="text" name="NCLI" id="NCLI"> </br>
    	<button>Enregistrer</button>
	</form>

	<!-- Footer-->
	<footer>bastienprob@gmail.com</footer>

</body>
</html>