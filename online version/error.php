<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="SQLmutatie.css">
    <title>Error</title>
</head>
<body>
    <div class="container">
        <div class="row  text-center">
            <div class="col-xl-12">
                <h4 id="tit1">Foutmelding: </h4>

                <?php
                    if(ISSET($_GET['error'])) {
                        $error = $_GET['error'];
                        echo "Deze $error bestaat al";
                    }
                ?>

            </div>
            <div class="col-xl-12">
                <a class="knoppie" href="SQLhome.php">
                    <button class="btn btn-primary">
                        Terug naar home
                    </button>
                </a>
            </div>    
        </div>
    </div>
</body>
</html>