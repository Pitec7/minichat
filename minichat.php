<?php
// Démarrage de la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <title>Minichat</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-8 col-md-6 col-lg-4" action="minichat_post.php" method="post">
                <div class="my-3 row form-group">
                    <label for="pseudo" class="col-3 col-form-label">Pseudo:</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="pseudo" id="pseudo" />
                    </div>
                </div>
                <div class="mb-3 row form-group">
                    <label for="message" class="col-3 col-form-label">Message:</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="message" id="message" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <div class="mt-5 container">
        <?php
        for ($i = 1; $i <= 10; $i++)
        {
        ?>
            <div class="my-2 row justify-content-center">
                <div class="col-3"><?php echo $_SESSION['message'][$i]['pseudo']; ?>:</div>
                <div class="col-9"><?php echo $_SESSION['message'][$i]['message']; ?></div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>