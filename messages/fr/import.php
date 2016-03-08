<?php

return array(
	// 
	"001" => "L'entité n'a pas de nom",
	// Partie concernant l'adresse
	"100" => "L'entité n'a aucune informations l'adresse.",
	"101" => "L'entité n'a pas de code postal.",
	"102" => "L'entité n'a pas de code INSEE.",
	"103" => "L'entité n'a pas de commune.",
	"104" => "L'entité n'a pas de pays.",
	"105" => "L'entité n'a pas de nom rue.",
	"106" => "Ce code postal n'existe pas dans notre base de données.",
	"110" => "Nous n'avons pas trouver la commune : Vérifier si le code postal et le nom de la commune soient bonnes",
	"111" => "Nous n'avons pas réussi a récupérer le nom de la commune car l'INSEE et le code postal ne sont pas compatibles. Vérifier l'adresse.",
	"112" => "Nous n'avons pas réussi récupérer le code INSEE. Vérifier l'adresse.",

	// Partie concernant la géolocalisation
	"150" => "L'entité n'a pas de géolocalisation.",
	"151" => "L'entité n'a pas de latitude.",
	"152" => "L'entité n'a pas de longitude.",
	"153" => "L'entité n'a pu être géolocalisé précisément : Repositionner le.",
	"154" => "Nous n'avons pas réussi à géolocaliser l'entité: Vérifier l'adresse et Repositionner le.",

	// Partie concernant la géolocalisation et l'adresse.
	"170" => "Incohérence entre la géolocalisation et le code postal. Vérifier l'adresse et la géolocalisation",
	"171" => "L'INSEE du fichier et celui retourné par la géolocalisation n'est pas le même.",
	"172" => "Le code postal du fichier et celui retourné par la géolocalisation n'est pas le même."
);

?>