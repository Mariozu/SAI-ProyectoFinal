<?php
/*******************************************************************
*Proyecto: SAST.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 26/11/15.
 * 
*Descripcion: Funcion para llenar el calendario
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
session_start();
// liste des événements
 $json = array();
 // requête qui récupère les événements
 $requete = "SELECT * FROM evento_gerente WHERE id_gerente=$_SESSION[id_gerente]";
 
 // connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=sap', "root", "timServidorWeb");
 } catch(Exception $e) {
 exit('No se Pudo Conectar.');
 }
 // exécution de la requête
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 // envoi du résultat au success
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>
