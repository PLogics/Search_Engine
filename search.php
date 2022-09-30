<?php
$connect = mysqli_connect("localhost", "root", "", "search_engine") or die("Connection Failed"); ?>
<?php
$connect
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
                        <input type="text" class="form-control" placeholder="Have a question? Ask Now" name="s" />
                        <input type="submit" class="bt1" value="Search" />
                    </div>
                </form>
                <?php
                if (isset($_REQUEST['s'])) {
                    $searchname = $_REQUEST['s'];

                    if ($searchname == "") {
                        echo "Enter text to search.";
                        exit();
                    } else {
                        $query = "select * from data where title like '%$searchname%' or description like '%$searchname%'";
                        // or select title from data where($str==$searchname) MINUS  select description from data where($str==$searchname)";
                    }
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo "<pre>";
                        // print_r($row);
                        // echo "<pre>";
                ?>
                        <div class="d1">
                    <?php
                        echo $row['title'] . "" . "<br>" . "" . $row['description'];
                    }
                }
                    ?>
                        </div>
            </div>
        </div>
    </div>
</body>

</html>