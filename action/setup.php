<?php 

	//connect to localhost
mysql_connect("localhost","root","");

//create database
mysql_query("create database if not exists pets_service");

//select database
mysql_select_db("pets_service");

 ?>