<?php
include("dbconnect.php");

$ob = new articles();

// if (!empty($_REQUEST['search_keyword'])) {

// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" text="text/css">
    <title>Document</title>
</head>

<body>

    <div class="container">

        <div class="row height d-flex align-items-center">

            <div class="col-md-8">
                <form method="get" action="">
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" placeholder="Have a question? Ask Now" name="search_keyword" />
                        <input type="submit" class="bt1" value="Search" />
                    </div>
                </form>
                <div class="d1">
                    <?php
                    $ob->search($_REQUEST);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>