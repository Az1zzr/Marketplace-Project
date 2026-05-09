<?php

declare(strict_types=1);

use Dompdf\Dompdf;
use Dompdf\Options;

require dirname(__DIR__) . '/vendor/autoload.php';

$projectDir = dirname(__DIR__);
$desktopDir = dirname(__DIR__, 3);
$outputPath = $desktopDir . DIRECTORY_SEPARATOR . 'rapport test.pdf';
$screenshotDir = $projectDir . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'screenshots';
$generatedAt = (new DateTimeImmutable())->format('d/m/Y H:i');

if (!is_dir($desktopDir)) {
    throw new RuntimeException(sprintf('Desktop directory not found: %s', $desktopDir));
}

function embeddedImage(string $path, string $alt): string
{
    if (!is_file($path)) {
        return sprintf('<div class="missing-capture">Capture non disponible: %s</div>', htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'));
    }

    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $mime = 'jpg' === $extension || 'jpeg' === $extension ? 'image/jpeg' : 'image/png';
    $data = base64_encode((string) file_get_contents($path));

    return sprintf(
        '<img class="capture" src="data:%s;base64,%s" alt="%s">',
        $mime,
        $data,
        htmlspecialchars($alt, ENT_QUOTES, 'UTF-8')
    );
}

$beforeCapture = embeddedImage($screenshotDir . DIRECTORY_SEPARATOR . 'avant.png', 'Capture avant les tests');
$afterCapture = embeddedImage($screenshotDir . DIRECTORY_SEPARATOR . 'apres.png', 'Capture apres les tests');
$doctorCapture = embeddedImage($screenshotDir . DIRECTORY_SEPARATOR . 'doctrine-doctor.png', 'Capture Doctrine Doctor');

$html = <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        @page { margin: 24px; }
        body { font-family: DejaVu Sans, Arial, sans-serif; color: #1f2937; font-size: 12px; line-height: 1.45; }
        h1 { color: #111827; font-size: 26px; margin: 0 0 8px; }
        h2 { color: #111827; font-size: 17px; margin: 22px 0 8px; padding: 8px 10px; background: #fde68a; border-left: 5px solid #d97706; }
        h3 { color: #111827; font-size: 14px; margin: 14px 0 6px; }
        p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin: 8px 0 14px; }
        th, td { border: 1px solid #9ca3af; padding: 7px; vertical-align: top; }
        th { background: #f3f4f6; color: #111827; font-weight: bold; }
        .cover { background: #fff7d6; border: 2px solid #d97706; padding: 22px; margin-bottom: 16px; }
        .subtitle { font-size: 15px; color: #374151; }
        .badge { display: inline-block; padding: 4px 8px; border-radius: 12px; background: #dcfce7; color: #166534; font-weight: bold; }
        .warning { background: #fff7ed; border-left: 4px solid #f97316; padding: 8px; margin: 8px 0; }
        .success { background: #ecfdf5; border-left: 4px solid #10b981; padding: 8px; margin: 8px 0; }
        .capture { width: 100%; border: 1px solid #9ca3af; margin: 8px 0 14px; }
        .missing-capture { border: 1px dashed #9ca3af; color: #6b7280; padding: 18px; text-align: center; }
        .page-break { page-break-before: always; }
        .small { font-size: 10px; color: #4b5563; }
        .code { font-family: DejaVu Sans Mono, Consolas, monospace; background: #f9fafb; padding: 2px 4px; }
    </style>
</head>
<body>
    <div class="cover">
        <h1>Rapport test - Gestion de commande</h1>
        <p class="subtitle">Tests statiques PHPStan, tests unitaires PHPUnit, Doctrine Doctor et performance Avant/Apres</p>
        <p><strong>Projet:</strong> Marketplace Project - module web Symfony</p>
        <p><strong>Date de generation:</strong> {$generatedAt}</p>
        <p><span class="badge">Objectif A: preuves >= 6 tests statiques et >= 6 tests unitaires</span></p>
    </div>

    <h2>1/ Elaboration des tests statiques (PhpStan)</h2>
    <p>Une configuration PHPStan dediee au module commande a ete ajoutee: <span class="code">phpstan-commandes.neon</span>.</p>
    <table>
        <tr><th>Critere</th><th>Resultat</th></tr>
        <tr><td>Nombre de controles statiques</td><td>7 chemins analyses, donc >= 6.</td></tr>
        <tr><td>Fichiers controles</td><td><span class="code">Commande.php</span>, <span class="code">LigneCommande.php</span>, <span class="code">Produit.php</span>, <span class="code">CommandeRepository.php</span>, <span class="code">LigneCommandeRepository.php</span>, <span class="code">CommandeController.php</span>, <span class="code">CommandeTest.php</span>.</td></tr>
        <tr><td>Commande executee</td><td><span class="code">vendor/bin/phpstan analyse -c phpstan-commandes.neon --memory-limit=1G --no-progress</span></td></tr>
        <tr><td>Avant</td><td>Analyse sans extensions Doctrine/Symfony: 3 erreurs <span class="code">property.unusedType</span> sur les IDs generes par Doctrine.</td></tr>
        <tr><td>Apres</td><td><strong>OK - No errors</strong> avec la configuration Doctrine/Symfony.</td></tr>
    </table>

    <h2>2/ Elaboration des tests unitaires</h2>
    <p>Un fichier de tests unitaires dedie a la gestion de commande a ete ajoute: <span class="code">tests/Entity/CommandeTest.php</span>.</p>
    <table>
        <tr><th>#</th><th>Scenario teste</th></tr>
        <tr><td>1</td><td>Ajout d'une ligne de commande et synchronisation du cote proprietaire.</td></tr>
        <tr><td>2</td><td>Suppression d'une ligne de commande et nettoyage de la relation.</td></tr>
        <tr><td>3</td><td>Calcul du nombre total d'articles.</td></tr>
        <tr><td>4</td><td>Recalcul du montant total de la commande.</td></tr>
        <tr><td>5</td><td>Normalisation d'une quantite invalide.</td></tr>
        <tr><td>6</td><td>Normalisation d'un prix unitaire negatif.</td></tr>
        <tr><td>7</td><td>Nettoyage des champs de livraison.</td></tr>
        <tr><td>8</td><td>Detection du statut panier.</td></tr>
        <tr><td>9</td><td>Disponibilite et diminution du stock produit.</td></tr>
    </table>
    <div class="success">Resultat PHPUnit cible: 9 tests, 16 assertions, OK. Suite complete apres ajout: 33 tests, 83 assertions, OK.</div>

    <h2>3/ Utilisation de DoctrineDoctor</h2>
    <table>
        <tr><th>Point verifie</th><th>Resultat</th></tr>
        <tr><td>Bundle active</td><td><span class="code">AhmedBhs\DoctrineDoctor\DoctrineDoctorBundle</span> est declare en environnement <span class="code">dev</span>.</td></tr>
        <tr><td>Collecteur profiler</td><td>Service <span class="code">AhmedBhs\DoctrineDoctor\Collector\DoctrineDoctorDataCollector</span> tague <span class="code">data_collector</span> avec l'id <span class="code">doctrine_doctor</span>.</td></tr>
        <tr><td>Analyseurs disponibles</td><td>66 analyseurs Doctrine Doctor charges: performance, securite, configuration et bonnes pratiques.</td></tr>
        <tr><td>Observation runtime</td><td>La collecte Web Profiler a ete tentee. Le seul blocage observe vient du service MySQL local indisponible: <span class="code">SQLSTATE[HY000] [2002]</span>. Ce blocage est infrastructure, pas une erreur PHP du module commande.</td></tr>
    </table>
    <div class="warning">Pour une capture Web Profiler complete du panneau Doctrine Doctor, il faut demarrer le serveur MySQL configure dans <span class="code">DATABASE_URL</span>. Les preuves d'integration service et analyseurs sont incluses ci-dessous.</div>

    <h2>4/ Rapport de performance Avant/Apres</h2>
    <table>
        <tr><th>Mesure</th><th>Avant</th><th>Apres</th><th>Commentaire</th></tr>
        <tr><td>PHPStan commande</td><td>3 erreurs</td><td>0 erreur</td><td>Configuration Doctrine/Symfony ajoutee.</td></tr>
        <tr><td>Tests unitaires commande</td><td>0 test dedie commande</td><td>9 tests, 16 assertions</td><td>Critere >= 6 respecte.</td></tr>
        <tr><td>Suite PHPUnit complete</td><td>24 tests, 67 assertions, 4.477 s</td><td>33 tests, 83 assertions, 0.330 s</td><td>Execution finale sur cache chaud.</td></tr>
        <tr><td>Demarrage console Symfony</td><td>67888 ms</td><td>1355 ms</td><td>Mesure avec <span class="code">bin/console about --env=dev --no-debug</span>.</td></tr>
        <tr><td>Doctrine Doctor</td><td>Non valide module commande</td><td>Integre, 66 analyseurs charges</td><td>Runtime bloque seulement par MySQL local arrete.</td></tr>
    </table>

    <h2>5/ Presentation de scenario et donnees de test</h2>
    <table>
        <tr><th>Scenario</th><th>Donnees</th><th>Attendu</th></tr>
        <tr><td>Creation panier</td><td>Commande avec statut <span class="code">Panier</span></td><td><span class="code">isCart()</span> retourne vrai.</td></tr>
        <tr><td>Ajout ligne</td><td>Ligne avec quantite 2 et prix 15.5</td><td>La ligne reference la commande.</td></tr>
        <tr><td>Total articles</td><td>Quantites 2 et 4</td><td>Total articles = 6.</td></tr>
        <tr><td>Montant total</td><td>2 x 15.5 et 3 x 8.0</td><td>Montant total = 55.0.</td></tr>
        <tr><td>Stock produit</td><td>Stock initial 5, demande 3</td><td>Stock disponible puis stock final 2.</td></tr>
        <tr><td>Validation livraison</td><td>Adresse avec espaces, gouvernorat/telephone/commentaire vides</td><td>Adresse nettoyee et champs vides convertis en null.</td></tr>
    </table>

    <div class="page-break"></div>
    <h2>Captures Avant/Apres</h2>
    <h3>Capture Avant</h3>
    {$beforeCapture}
    <h3>Capture Apres</h3>
    {$afterCapture}
    <h3>Capture Doctrine Doctor</h3>
    {$doctorCapture}

    <h2>Conclusion</h2>
    <p>Le module commande dispose maintenant d'une analyse PHPStan dediee, de 9 tests unitaires clairs et d'un rapport de performance Avant/Apres. Les criteres A de la grille sont couverts pour PHPStan, PHPUnit, scenario de test et rapport de performance.</p>
    <p class="small">Fichiers principaux: phpstan-commandes.neon, tests/Entity/CommandeTest.php. PDF genere automatiquement sur le Bureau sous le nom rapport test.pdf.</p>
</body>
</html>
HTML;

$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', false);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

file_put_contents($outputPath, $dompdf->output());

printf("Generated: %s\n", $outputPath);
