<?php

    define('ODBC_NAME', 'skud');
    define('DB_LOGIN', 'bankuser');
    define('DB_PASSWORD', 'asdf');

    class Db
    {
      private $odbc_name   = ODBC_NAME;
      private $db_login    = DB_LOGIN;
      private $db_password = DB_PASSWORD;

      // php version > 5.3 work in mssql only odbc
        public function db_connect(){

            $conn = odbc_connect($this->odbc_name,$this->db_login,$this->db_password); 

            if (!$conn) {
                return false;
            }

            return $conn;
        }

        public function db_close($conn){
          //close the connection 
          odbc_close($conn); 
        }

        public function db_get_exec($conn, $param){

               $query = "
               Declare 
                  @VDate_od Date,
                  @VDate_do Date

               SELECT
               p1.TimeVal VTime, 
               p1.Hozorgan VKod, 
               p2.Name VName, p2.FirstName VFName,p2.MidName VMName,
               CASE WHEN p4.Name is Null THEN 'null' ELSE p4.Name END VDiv, p5.Name VZone,
               CONVERT(VARCHAR(20),p1.TimeVal,104) VD, CONVERT(VARCHAR(20),p1.TimeVal,108) VT,
               CONVERT(VARCHAR(10),HozOrgan) vK

               FROM  plogData as p1

               Left Join  pmark as p3 on p1.Hozorgan=p3.owner
               Left Join  plist as p2 on p1.Hozorgan=p2.id
               Left Join  pdivision as p4 on p4.id=p2.section
               Left Join  DevItems as p5 on p5.ID = p1.ReaderIndex

               WHERE
                 (Event = 32 and (ReaderIndex = 20 or ReaderIndex = 21) or
                (Event = 28 and (ReaderIndex <> 20 and ReaderIndex <> 21)))
                and p1.Hozorgan <> 0
                and (CONVERT(Date,p1.TimeVal) >= '". $param[0] ."' and CONVERT(Date,p1.TimeVal) <= '". $param[1] ."') " . $param[2] . " ORDER bY p1.TimeVal";

            return odbc_exec($conn, $query);

        }
    };
    

    // decrypting url to str
    function P_to_Conv($value=''){

            $array = array("а","б","в","г","д","е","ё","ж","з","и","й","к",
                        "л","м","н","о","п","р","с","т","у","ф","х","ц","ч",
                        "ш","щ","ъ","ы","ь","э","ю","я");
            $str = $value;
            $str2 = "";
            
            while (strpos($str, "$") <> 0){
                $index = (int)substr($str, 0, strpos($str, "$"));
                $str = substr($str,strpos($str, "$") + 1,strlen($str));
                $str2 = $str2 . $array[$index];
            }

            return $str2;
        }


    //==============================================================================


    function db_result_to_array($result){

        $res_array = array();
        $count = 0;
        while ($row = mysql_fetch_array($result)) {
            $res_array[$count] = $row;
            $count++;
        }
        return $res_array;
    };

   function get_products(){

        db_connect();
       
        $query = "SELECT * FROM products ORDER BY id DESC";
        $result =  mysql_query($query);
        $result =  db_result_to_array($result);
        return $result;
   };

   function get_product($id){

        db_connect();

        $query = "SELECT * FROM products WHERE id = " . $id;
        $result =  mysql_query($query);
        $row = mysql_fetch_array($result);
        return $row;

   };

?>

