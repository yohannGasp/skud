<?php

class View
{
    public function view_header(){
        header("Content-Type: text/html; charset=windows-1251");
?>

<!-- Twitter bootstrap 3 -->
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="">Home</a>
    <ul class="nav">
      <li class="active"><a href="">Home</a></li>
    </ul>
  </div>
</div>

<form class="form-inline">
 <div class="input-append">
  <span class="label label-default">ФИО</span>
  <input id="id_fio" type="text" class="form-control" placeholder="ФИО">
</div>
 <div class="input-append">
  <span class="label label-default">Код</span>  
  <input id="id_vk" type="text" placeholder="Код">
</div>
 <div class="input-append">
  <span class="label label-default">Отдел</span>    
  <input id="id_vdiv" type="text" placeholder="Отдел">
</div>
 <div class="input-append">
  <input class="span2" id="appendedInputButton1" type="text" readonly="readonly">
  <button class="btn" type="button" onclick="showcalendar(appendedInputButton1)">от:</button>
</div>
<div class="input-append">
  <input class="span2" id="appendedInputButton2" type="text" readonly="readonly">
  <button class="btn" type="button" onclick="showcalendar(appendedInputButton2)">по:</button>
  <button class="btn" type="button" onclick="OnShowData()">Показать</button>
</div>
</form>

<?php
}

public function view_content($param){

$db = new Db();
$conn = $db -> db_connect();

   if ($conn){

   $result = $db -> db_get_exec($conn, $param);
   
   echo "<table class=\"table table-striped table-bordered\"> <caption>SKUD</caption>"; 
   echo "<thead><tr>";

   //print field name 
   for ($j=1; $j<= odbc_num_fields($result); $j++){
      echo "<th>" . trim(odbc_field_name($result, $j)) . "</th>";}
   echo "</tr></thead><tbody>";

   //fetch tha data from the database 
   while(odbc_fetch_row($result)){ 
      echo "<tr>"; 
      for($i=1;$i<=odbc_num_fields($result);$i++) {
            echo "<td>" . trim(odbc_result($result,$i)) . "</td>";} 
      echo "</tr>"; 
   } 
      
   echo "</tbody></table>"; 

   //close the connection 
   $db -> db_close($conn);

   }  else {echo "odbc not connected";}

}  


public function view_footer(){
?>
<!-- footer -->
<pre class="prettyprint linenums">
  SKUD RosselhozBank
  PHP Version 5.6.7
  (c) Copyrigth, 2015
</pre>
<div class="container"><div class="bar"></div></div>

<?php
}
};
?>