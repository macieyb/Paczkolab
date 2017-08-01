<?php


interface DBInterface{

  function __construct($dsn, $db_pass, $db_user);
  function query($sql, $params_arr);
  function getData($sql, $params_arr);


}

