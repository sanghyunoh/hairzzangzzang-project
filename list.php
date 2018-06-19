<!DOCTYPE html>

<?php
//connect DB
include "session.php";
include "db_info.php";
$query = "SELECT * FROM hairShop ORDER BY keyValue";
$result = mysqli_query($conn, $query);

?>
<?php
include 'config.php';

// Check if the user is logged in

if(!isset($_SESSION['userId'])  )
{//header("Location: login.php");
//exit;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    <link rel="stylesheet" type="text/css" href="/css/list.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>헤어짱짱</title>
    </style>
</head>

<body>
        <?php
        //include "topBar.html";
        include "topBar.php";
        ?>
        <!-- Main List -->
        <div class="wrapper">
        <?php
         while ($row = mysqli_fetch_assoc($result))
        {
            $keyV = $row['keyValue'];
            $query2 = "SELECT * From review where shopKey = '$keyV'";
            $result2 = mysqli_query($conn, $query2);
            $totalrpeople = 0;
            $totalscore = 0;
            $totalpeople = 0;
            $avg = 0;
            while($row2 = mysqli_fetch_assoc($result2)){
                $totalrpeople++;
                $totalscore += (int)$row2['score'];
            }
            if($totalrpeople == 0){
                $avg = 0;
            }else{
                $avg = $totalscore/$totalrpeople;    
            }
            
        ?>
            <div class="wrap">
                <a class="shoplink" href="info.php?keyValue=<?=$row['keyValue']?>">
                    <img class="shopImg" src="<?=$row['picture']?>listimg/listimg.jpg" /></a>
                    
                        <h2 class="shopName"><?=$row['shopName']?></h2>
                        <h4 class="shopLocation"><?=$row['si']?></h4>
                        <h3 class="avgScore"><?=$avg?>/5.0(총<?=$totalrpeople?>명 평가)</h3>
            </div>
        <?php
            $totalreview = 0;
            $totalscore = 0;
        }
        ?>
        </div>

</body>

</html>