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
        <div class="row">
            <div class="col-xl-12 text-center">
                <h4 id="tit1">Foutmelding: </h4>

                <?php
                    if(ISSET($_GET['error'])) {
                        $error = $_GET['error'];
                    
                        echo "Deze $error bestaat al.";
                    }
                   
                ?>

            </div>
            <div class="col-xl-12" text center>
                
            </div>    
        </div>
    </div>
</body>
</html>