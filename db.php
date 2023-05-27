<?php 
require 'libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=mhitroce_db','mhitroce_db', '9JkF*HOT' ); 

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();