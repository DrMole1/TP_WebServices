
<?php

// Classe contenant les différentes requêtes liées au CRUD.

// Include des autres fichiers .php
include_once("Constantes.php"); // Inclut une seule fois le fichier Constantes.php
include_once("DbConnect.php"); // Inclut une seule fois le fichier DbConnect.php
include_once("Client.php"); // Inclut une seule fois le fichier Client.php

// On inclut la connexion à la base
require_once('DbConnect.php');

// Affectation de la méthode 
$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET") // ===================================== READ =====================================
{
	// Affectation de la requête
	$sql = "SELECT * from client";

	// Récupération des valeurs selon la db et la requête
	$resultat = mysqli_query($conn, $sql);

	// Création d'une array
	$rows = array();

	// Si il y a au moins 1 résultat
	if(mysqli_num_rows($resultat) > 0)
	{
		while($r = mysqli_fetch_assoc($resultat))
		{
			// Ajoute le résultat au tableau tant qu'il en reste
			array_push($rows, $r);
		}
	}

	// Formatage en json des valeurs du tableau
	//$res = safe_json_encode($rows);

	$res = $rows;

	// Affichage des valeurs
	//print_r($res);
}
else if($method == "POST" && $_POST['METHOD'] == "create") // ===================================== CREATE =====================================
{
	// Récupération des valeurs du formulaire (méthode POST) et affectation aux variables
	$ncli = $_POST['NCLI'];
	$nom = $_POST['NOM'];
	$adresse = $_POST['ADRESSE'];
	$localite = $_POST['LOCALITE'];
	$cat = $_POST['CAT'];
	$compte = $_POST['COMPTE'] ? $_POST['COMPTE'] : null;

	// Insertion des valeurs dans la db
	$sql = "INSERT INTO client VALUES ('" . $ncli . "','" . $nom . "','" . $adresse . "','" . $localite . "','" . $cat . "','" . $compte . "')";

	if($conn_post->query($sql) === true)
	{

	}
	else
	{
		var_dump("error" . mysqli_error($conn));
	}

	// On récupère le contenu du fichier
    $texte = file_get_contents('journal.txt');

    // On récupère la date et l'heure courante
    $horaire = date('Y-m-d H:i:s');
            
    // On ajoute notre nouveau texte à l'ancien
    $texte .= "\n" . $horaire . " : insertion client " . $ncli;
            
    // On écrit tout le texte dans notre fichier
    file_put_contents('journal.txt', $texte);

	// Fermeture de la connexion
	$conn_post->close();
}
else if($method == "POST" && $_POST['METHOD'] == "delete") // ===================================== DELETE =====================================
{
	// On récupère le client à supprimer
	$ncli = $_POST['NCLI'];

	// Supression du client
	$sql = "DELETE FROM client WHERE NCLI = '" . $ncli . "'";

	if($conn_post->query($sql) === true)
	{

	}
	else
	{
		var_dump("error" . mysqli_error($conn));
	}

	// On récupère le contenu du fichier
    $texte = file_get_contents('journal.txt');

    // On récupère la date et l'heure courante
    $horaire = date('Y-m-d H:i:s');
            
    // On ajoute notre nouveau texte à l'ancien
    $texte .= "\n" . $horaire . " : suppression client " . $ncli;
            
    // On écrit tout le texte dans notre fichier
    file_put_contents('journal.txt', $texte);

	// Fermeture de la connexion
	$conn_post->close();
}
else if($method == "POST" && $_POST['METHOD'] == "update") // ===================================== UPDATE =====================================
{
	// Récupération des valeurs du formulaire (méthode POST) et affectation aux variables
	$ncli = $_POST['NCLI'];
	$nom = $_POST['NOM'];
	$adresse = $_POST['ADRESSE'];
	$localite = $_POST['LOCALITE'];
	$cat = $_POST['CAT'];
	$compte = $_POST['COMPTE'] ? $_POST['COMPTE'] : null;

	// Modification des valeurs selon le client
	$sql = "UPDATE client SET NOM = '" . $nom . "', ADRESSE = '" . $adresse . "', LOCALITE = '" . $localite . "', CAT = '" . $cat . "', COMPTE = '" . $compte . "' WHERE NCLI = '" . $ncli . "'";

	if($conn_post->query($sql) === true)
	{

	}
	else
	{
		var_dump("error" . mysqli_error($conn));
	}

	// On récupère le contenu du fichier
    $texte = file_get_contents('journal.txt');

    // On récupère la date et l'heure courante
    $horaire = date('Y-m-d H:i:s');
            
    // On ajoute notre nouveau texte à l'ancien
    $texte .= "\n" . $horaire . " : modification client " . $ncli;
            
    // On écrit tout le texte dans notre fichier
    file_put_contents('journal.txt', $texte);

	// Fermeture de la connexion
	$conn_post->close();
}


?>