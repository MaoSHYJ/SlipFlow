<?php
class DatabaseAccess{
  private $database_data =[
    'hostname'=> 'localhost',
    'port'=>'666',
    'userName'=>'fool',
    'password'=>'edit',
    'dataBaseName'=>'yourData'
  ];

  function __construct($dataBaseName){
    $temp_data = $this->database_data['dataBaseName'];
    $this->database_data['dataBaseName'] = $dataBaseName;
    try{
      $this->conex();
    }catch(Exception $e){
      $this->database_data['dataBaseName'] = $temp_data;
    }
  }

  private function conex(){
    try{
      $user = $this->database_data['userName'];
      $password = $this->database_data['password'];
      $base = 'mysql:host=localhost;dbname='.$this->database_data['dataBaseName'];
      $dataBase = new PDO($base,$user,$password);
      $dataBase ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dataBase;
    } catch (PDOException $e){
      throw new Exception($e);//
    }
  }


  
}
