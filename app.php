<?php
define('SITE_ROOT', __DIR__);
define('SUB_FOLDER', 'make');

echo "Creo i file di testo e le cartelle da un file di testo\n";
$handle = fopen("lista.txt", "r");
if ($handle) {
	
	// Creo sottocartella principale
	$sottocartella = SITE_ROOT.DIRECTORY_SEPARATOR.SUB_FOLDER;	
	if (!mkdir($sottocartella, 0777, true)) {
		die('Errore nel creare la cartella...');
	}
    
	while (($line = fgets($handle)) !== false) {
		$titolo = trim(preg_replace('/\s+/', ' ', $line));
		
		$cartella = SUB_FOLDER.DIRECTORY_SEPARATOR.$titolo;
		$fileTxt = $cartella.DIRECTORY_SEPARATOR.$titolo.".txt";
		$cartellaImg = $cartella.DIRECTORY_SEPARATOR."Img sito";
		$cartellaPdf = $cartella.DIRECTORY_SEPARATOR."Pdf estratto";
		$cartellaCoverPdf = $cartella.DIRECTORY_SEPARATOR."Pdf cover";
		
		// Creo la cartella principale
		if (!mkdir($cartella, 0777, true)) {
			die('Errore nel creare la cartella: '.$cartella);
		}
		
		// Creo le cartelle secondarie
		if (!mkdir($cartellaPdf, 0777, true)) {
			die('Errore nel creare la cartella: '.$cartellaPdf);
		}
		
		if (!mkdir($cartellaImg, 0777, true)) {
			die('Errore nel creare la cartella: '.$cartellaImg);
		}
		
		if (!mkdir($cartellaCoverPdf, 0777, true)) {
			die('Errore nel creare la cartella: '.$cartellaCoverPdf);
		}
		
		// Creo file di testo
		
		$file = fopen($fileTxt, "w") or die("Errore nello scrivere il file: ".$filename);
		
		$txt = "Dati generali\n\n";
		fwrite($file, $txt);
		
		$txt = "Trama\n\n";
		fwrite($file, $txt);
		
		$txt = "Autore/Autrice\n\n";
		fwrite($file, $txt);
		
		$txt = "Recensioni\n\n";
		fwrite($file, $txt);
		
		fclose($file);
		
		
	}

    fclose($handle);
} else {
    echo "Errore nella lettura del file";
} 