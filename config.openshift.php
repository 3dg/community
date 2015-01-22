<?php
$config = array();
if ( getenv('OPENSHIFT_APP_NAME') ) {
  $config["esoTalk.database.host"] = getenv('OPENSHIFT_MYSQL_DB_HOST');
  $config["esoTalk.database.port"] = getenv('OPENSHIFT_MYSQL_DB_PORT');
  $config["esoTalk.database.user"] = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
  $config["esoTalk.database.password"] = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
  $config["esoTalk.database.dbName"] = getenv('OPENSHIFT_APP_NAME');
  // $config["esoTalk.baseURL"] = 'http://3dgundam.com/';
}
