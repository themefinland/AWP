<div id="accordion">
<?php
    $host = 'mysql.metropolia.fi';
    $dbname = ''; // your username
    $user = ''; // your username
    $pass = ''; // your database password
    
    try {
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $DBH->query("SET NAMES 'UTF8';");
        
        } catch(PDOException $e) {
            echo "Something went wrong.";
            file_put_contents('log.txt', $e->getMessage(), FILE_APPEND);
        }


    $eventList = array();
    $sql = "SELECT * FROM kalenteri";
    $STH = @$DBH->query($sql);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $STH->fetch()){
    	echo '<h3>'.$row->pvm.'<br><strong>'.$row->nimi.'</strong></h3><div><i>'.$row->kuvaus.'</i><br><br>With:<br>'.$row->email.'<br>'.$row->puh.'</div>';
    }
       

?>
</div>
<script>
// use jQuery UI to make an accordion from <div id="accordion">. 
// Set 'collapsible' property to 'true' and 'active' property to 'none'
</script>