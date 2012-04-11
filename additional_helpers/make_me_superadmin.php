<?php


include('includes/application_top.php');

$cid = $_SESSION["customer_id"];
    
if($cid != 0){
    $q = "UPDATE customers SET customers_status = 0 WHERE customers_id = $cid";
    $rs = mysql_query($q);

    $q = "SELECT * FROM admin_access WHERE customers_id = ".$cid;
 
    $rs = mysql_query($q);
    
    if(mysql_num_rows($rs)==0){
        $q = "INSERT INTO admin_access (customers_id) VALUES ($cid)";
        mysql_query($q);
    }
    
    $q = "SHOW COLUMNS FROM admin_access";
    $rs = mysql_query($q);
    
    while($r = mysql_fetch_object($rs)){
        
        if($r->Field != 'customers_id'){
            $q = "UPDATE admin_access SET $r->Field = 1 WHERE customers_id = $cid";
            mysql_query($q);
        }
    }
    
    echo "I'm done :-)";
    
    
}



?>