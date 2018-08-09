<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      
      <!-- Afficher la liste des randonnées -->
      <caption>Réunion rando</caption>
      <tr>
          <th scope="col">Name</th>
          <th scope="col">Difficulty</th>
          <th scope="col">Distance</th>
          <th scope="col">Duration</th>
          <th scope="col">Height Difference</th>
      </tr>
        <?php
          $pdo = new PDO('mysql:host=localhost;dbname=reunion_island','root','toor',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
          $sql = 'SELECT * FROM hiking';
          $req = $pdo -> query($sql);
          while ($row = $req -> fetch()){
              echo '<tr>
              <td>'.$row['name'].'</td>
              <td>'.$row['difficulty'].'</td>
              <td>'.$row['distance'].'</td>
              <td>'.$row['duration'].'</td>
              <td>'.$row['height_difference'].'</td>
          </tr>';
          };
          $req -> closeCursor();

        ?>
    </table>

  </body>
</html>
