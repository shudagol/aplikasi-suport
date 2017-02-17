<!DOCTYPE html>
<html lang="en">
<head>
 <title>Kang-cahya.com</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
 <?php 
  
  
  foreach($issue as $val){ 
   echo "<div style='border:1px solid #000000;'>";
   echo "<p>NIM : ".$val->issue_id."</p>";
   echo "<p>NAMA : ".$val->judul."</p>";
   echo "<p>JK : ".$val->tgl."</p>";
   echo "<p>ALAMAT : ".$val->user_id."</p>";
   echo "</div>";
  }
  
  echo "<p>".$this->pagination->create_links()."</p>";
 ?>
</body>
</html>