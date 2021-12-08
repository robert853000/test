<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learn2";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Naplňte databázi
/*
$conn->query("insert into product (id,name) values ('1','mléko')");
$conn->query("insert into product (id,name) values ('2','rohlík')");
$conn->query("insert into product (id,name) values ('3','šunka')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('1','1','10')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('1','2','12')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('1','3','8')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('2','1','100')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('2','2','120')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('2','3','80')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('3','1','15')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('3','2','30')");
$conn->query("insert into forecast (product_id,outlook,amout) values ('3','3','10')");
$conn->query("insert into sale (product_id,outlook,amout) values ('1','-1','9')");
$conn->query("insert into sale (product_id,outlook,amout) values ('1','-2','13')");
$conn->query("insert into sale (product_id,outlook,amout) values ('1','-3','14')");
$conn->query("insert into sale (product_id,outlook,amout) values ('2','-1','88')");
$conn->query("insert into sale (product_id,outlook,amout) values ('2','-3','61')");
$conn->query("insert into sale (product_id,outlook,amout) values ('3','-1','33')");
$ret=$conn->query("insert into sale (product_id,outlook,amout) values ('3','-4','16')");
if ($ret === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: <br>" . $conn->error;
}

/**********************************************************
 * 
 * 
 *      Řešení : 
 * */
/*
    --  SQL1 --
SELECT 
prod.name AS nazevProduktu,
 @Total := IFNULL( (SELECT sum(amout) from sale where sale.outlook = '-1' and sale.product_id=prod.id ) ,0)as sum1,
 @Total2 := IFNULL( (SELECT sum(amout) from sale where sale.outlook = '-2' and sale.product_id=prod.id ),0) as sum2,
 @Total3 := IFNULL( (SELECT sum(amout) from sale where sale.outlook = '-3' and sale.product_id=prod.id ),0) as sum3
FROM
    product as prod

    -- SQL2 --
SELECT 
prod.name AS nazevProduktu,
 (SELECT sum(amout) from forecast where (forecast.outlook = '1' or forecast.outlook = '2' or forecast.outlook = '3') and forecast.product_id=prod.id ) as vyhledProdeju,
 (SELECT sum(amout) from sale where (sale.outlook = '-1' or sale.outlook = '-2' or sale.outlook = '-3') and sale.product_id=prod.id ) as posledniProdeje
FROM
    product as prod

    -- SQL3 --
EXPLAIN SELECT 
prod.name AS nazevProduktu,
 (SELECT sum(amout) from forecast where (forecast.outlook = '1' or forecast.outlook = '2' or forecast.outlook = '3') and forecast.product_id=prod.id ) as vyhledProdeju,
 (SELECT sum(amout) from sale where (sale.outlook = '-1' or sale.outlook = '-2' or sale.outlook = '-3') and sale.product_id=prod.id ) as posledniProdeje
FROM
    product as prod

*/

$sql = "SELECT ";
$sql .= " prod.name AS nazevProduktu,";
$sql .= "  @Total := IFNULL( (SELECT sum(amout) from sale where sale.outlook = '-1' and sale.product_id=prod.id ) ,0)as sum1,";
$sql .= " @Total2 := IFNULL( (SELECT sum(amout) from sale where sale.outlook = '-2' and sale.product_id=prod.id ),0) as sum2,";
$sql .= " @Total3 := IFNULL( (SELECT sum(amout) from sale where sale.outlook = '-3' and sale.product_id=prod.id ),0) as sum3";
$sql .= " FROM";
$sql .= " product as prod";
$result = $conn->query($sql);
echo "<h2>Databáze</h2>";
if ($result->num_rows > 0) {

    echo "<table border=2>";
    echo "<tr><td>Název<br>produktu</td><td>prodej<br>aktuální<br>měsíc</td><td>prodej<br>předchozí<br>měsíc</td><td>prodej<br>předminulý<br>měsíc</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["nazevProduktu"]."</td>\n";
        echo "<td>".$row["sum1"]."</td>\n";
        echo "<td>".$row["sum2"]."</td>\n";
        echo "<td>".$row["sum3"]."</td>\n";
        echo "</tr>";
    }
    echo "</table>";
} else {
  echo "0 results";
}
if (!($result)) {
    
    echo "<h2>Error: </h2><br>" . $conn->error;
}


$sql2 = "SELECT ";
$sql2 .= " prod.name AS nazevProduktu,";
$sql2 .= " (SELECT sum(amout) from forecast where (forecast.outlook = '1' or forecast.outlook = '2' or forecast.outlook = '3') and forecast.product_id=prod.id ) as vyhledProdeju,";
$sql2 .= " (SELECT sum(amout) from sale where (sale.outlook = '-1' or sale.outlook = '-2' or sale.outlook = '-3') and sale.product_id=prod.id ) as posledniProdeje";
$sql2 .= " FROM";
$sql2 .= " product as prod";
$result = $conn->query($sql2);
echo "<h2>Databáze</h2>";
if ($result->num_rows > 0) {

    echo "<table border=2>";
    echo "<tr><td>Název<br>produktu</td><td>výhled<br>prodejů</td><td>poslední<br>prodeje</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["nazevProduktu"]."</td>\n";
        echo "<td>".$row["vyhledProdeju"]."</td>\n";
        echo "<td>".$row["posledniProdeje"]."</td>\n";
        echo "</tr>";
    }
    echo "</table>";
} else {
  echo "0 results";
}
if (!($result)) {
    
    echo "<h2>Error: </h2><br>" . $conn->error;
}

$conn->close();
?>
<h1>Mean absolute percentage error</h1>
<img src="./images/MAPE.JPG"><br>
<?php
// Mean absolute percentage error
$forecast = array(185,149,153,128,138,142,0,168,154,177,260,292);
$sale = array(153,147,139,131,134,143,137,155,151,161,0,269);
$sampleSize=0;
$summation= 0;
echo "t | a | f | a - f | (a-f)%a | |(a-f)%a<br>\n";
for ($i=0;$i<count($sale);$i++){
    $observed=$sale[$i];
    $predicted =$forecast[$i];
    if($observed<>0 and $predicted<>0){
        echo "$i | $observed | $predicted | ". ((($observed - $predicted)/$observed))." | ".abs((($observed - $predicted)/$observed))."<br>\n";
        $sampleSize+=1;
        $summation = $summation + abs((($observed - $predicted)/$observed));//*100
    }else echo "error division by zero <br>\n";

}
$mape = (100 * $summation) / $sampleSize;
echo "MAPE=$mape%<br>\n";
?>

<?php
// Dělitelná čísla
for ($i=1;$i<=100;$i++){
    $del3=$i%3==0?true:false;
    $del5=$i%5==0?true:false;
    if ($del3 or $del5){
        if($del3==$del5){
            echo "ARulezzz<br>\n";
        }elseif($del3){
            echo "B<br>\n";
        }else{
            echo "Rulezzz<br>\n";
        }

    }else{
        echo "$i<br>\n";
    }
}

?>