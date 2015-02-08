<?php

  $hostName = getenv('OPENSHIFT_MYSQL_DB_HOST');
  $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
  $dbName = 'midvale';
  $userName = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
  $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');


echo "host:$hostName:$dbPort dbName:$dbName user:$userName password:$password<br />\n";
  ?>