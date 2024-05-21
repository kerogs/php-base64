<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Base64</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <header>
        <h1>PHP-Base64</h1>
    </header>

    <main>
        <fieldset>
            <legend>
                <h2>Base64 -> IMG</h2>
            </legend>
            <form action="" method="post">
                <textarea name="base64" name="base64"><?= $_POST['base64'] ?></textarea>
                <button type="submit">Envoyer</button>
            </form>
            <?php
            if (isset($_POST['base64'])) {
                echo '<hr>';
                $base64 = $_POST['base64'];
                $prefix = 'data:image/png;base64,';

                // Vérifie si la chaîne commence par le préfixe
                if (strpos($base64, $prefix) != 0) {
                    $base64 = $prefix . $base64;
                }

                // Affiche l'image
                echo '<a href="' . $base64 . '" target="_blank"><img src="' . htmlspecialchars($base64, ENT_QUOTES, 'UTF-8') . '"></a>';

                // Génère un nom de fichier unique pour le téléchargement
                $filename = 'image_' . uniqid() . '.png';

                echo '<table>
                    <tr>
                        <td><a href="' . $base64 . '" download="' . $filename . '">Télécharger</a></td>
                        <td><a href="data:text/plain;base64,' . base64_encode($base64) . '" download="base64.txt">Download Base64</a></td>
                        <td><a href="' . $base64 . '" target="_blank">Ouvrir dans un nouvel onglet</a></td>
                    </tr>
                  </table>';

                echo '<textarea id="base64Text" style="display:none;">' . htmlspecialchars($base64, ENT_QUOTES, 'UTF-8') . '</textarea>';
            }
            ?>
        </fieldset>
    </main>

    <footer>
        <p>Copyright &copy; 2020 - <?php echo date('Y'); ?>. Tous droits réservés.</p>
    </footer>

</body>

</html>