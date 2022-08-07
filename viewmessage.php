<?php
require_once('header.php');


?>






<div class="container">
            <div class="row ">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5 mb-1">
                        <div class="card-title mt-5 text-center text-dark">
                          <h3 class="">Messages</h3>

                           
                        </div>
                        <div class="card-body">

                        <?php
                        echo "<table class='table table-hover table-primary'>";

echo "<thead style='border-bottom: 2px solid black'><tr>

<th>From</th>
<th>Subject</th>
<th>Message</th>
<th>Date</th></tr></thead>";



class TableRows extends
RecursiveIteratorIterator{
    function __construct($it){
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current(){
        return "<td>" . parent::current(). "</td>";
    }
    function beginChildren(){
        echo "<tr>";
    }
    function endChildren(){
        echo "</tr>" . "\n";
    }
}

try{
    $dsn =  new PDO("mysql:host=localhost;dbname=quickrent2","root","");
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dsn->prepare("SELECT comment_username,comment_subject,comment_text,date FROM messages ORDER BY date LIMIT 2");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v){
        echo $v;
    }
}
 catch (PDOException $e){
     echo "Error " . $e->getMessage();
 }

$conn = null;
echo "</table>";
?>

                            <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>