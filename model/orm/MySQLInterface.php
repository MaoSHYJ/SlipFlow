<?php

interface MySQLInterface(){

  function connect() : bool{};
  function disconnect() : bool{};
}