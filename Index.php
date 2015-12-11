<?php
  // maak een verbinding met MySQL
  $connection = mysql_connect('localhost', 'root', 'usbw');
	
  // geef aan welke database we willen gebruiken
  mysql_select_db('postit');
?>


<!DOCTYPE html>
<head>
<title> post it </title>
<link href="CSS/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
     <a href="Fomulier.php">
    <img src="Images/vul.png">
    </a>
<div>
    <h1> My redit </h1>
    <table>
    <tr class="lel">
        <td>Title</td> <td> Create</td> <td> author</td> <td> conclusie </td>  <td> url </td> 
    </tr>
 <ul>
<?php
  $query = "select * FROM post order by id DESC";
  $result = mysql_query($query);

  while ($row = mysql_fetch_assoc($result))
 {
  // haal gegevens die we nodig hebben uit de rij
  $post_Title = $row["Title"];
  $post_Create = $row["Create"];
  $post_author = $row["author"];
  $post_id = $row["id"];
  $post_Conclusie = $row["Conclusie"];
  $post_url = $row["url"];

  // maak een lijst item aan op de pagina
  echo"
   <tr>
   <td>$post_Title</td>
   <td>$post_Create</td>
   <td>$post_author</td> 
   <td>$post_Conclusie</td> 
   <td><a href=detail.php?id=$post_id target="."_blank".">Lees meer</a> </td> 
   </tr> 
   \n";
 }
?>
</ul>
    </table>
</div>
</body>
</html>