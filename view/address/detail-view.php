<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
</head>

<body>

    <table>
        <tr>
            <td>rue</td>
            <td><?= $address->getRue() ?></td>
        </tr>
        <tr>
            <td>code postal</td>
            <td><?= $address->getCodePostal() ?></td>
        </tr>
        <tr>
            <td>ville</td>
            <td><?= $address->getVille() ?></td>
        </tr>
    </table>

</body>

</html>