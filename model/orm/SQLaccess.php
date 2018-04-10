<?php
class DatabaseAccess{
 
  function conex()
  {
    try{
      $user = "root";
      $password = "root";//QUE NO SE TE OLVIDE CAMBIARLO A LA HORA DE DESPLEGAR
      $base= 'mysql:host=localhost;dbname=PERIODICO';
      $baseDatos = new PDO($base,$user,$password);
      $baseDatos ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $baseDatos;
    } catch (PDOException $e){
      print "ERROR".$e->getMessage()."<br>";
    }
  }
  
  static function getUltimosComentarios(){
    $baseDatos = DatabaseAccess::conex();
    $comentarios = $baseDatos->prepare("SELECT ID_comentario, LEFT(com_contenido,300) as com_contenido, com_autor, art_referencia FROM comentario ORDER BY com_fecha DESC LIMIT 0, 20;");
    $comentarios -> execute();
    $i= 0;
    while($resultado=$comentarios -> fetch(PDO::FETCH_ASSOC)) {
      $contenido[$i]['ID_comentario'] = $resultado['ID_comentario'];
      $contenido[$i]['comentario'] = $resultado['com_contenido'];
      $contenido[$i]['autor'] = $resultado['com_autor'];
      $contenido[$i]['referencia'] = $resultado['art_referencia'];
      $i++;
    }
    return $contenido;
  }
}

