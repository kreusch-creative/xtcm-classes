<?php


class xtcm_db{

    public static function get_pov_value($pov_id, $col, $lid = ''){
           
           if($lid == ''){
              $lid = $_SESSION["languages_id"];
           }
           $q = "SELECT $col FROM products_options_values WHERE products_options_values_id = $pov_id AND language_id = $lid";
           $rs = xtc_db_query($q);
           $r = mysql_fetch_object($rs);
           return $r->{$col};
    
    }
    
     public static function get_po_value($po_id, $col, $lid = ''){
           
           if($lid == ''){
              $lid = $_SESSION["languages_id"];
           }
           $q = "SELECT $col FROM products_options WHERE products_options_id = $po_id AND language_id = $lid";
           $rs = xtc_db_query($q);
           $r = mysql_fetch_object($rs);
           return $r->{$col};
    
    }
    
    public static function get_product_value($pid, $col){
           
           if($lid == ''){
              $lid = $_SESSION["languages_id"];
           }
           $q = "SELECT $col FROM products WHERE products_id = $pid";
           $rs = xtc_db_query($q);
           $r = mysql_fetch_object($rs);
           return $r->{$col};
    
    }

}


?>