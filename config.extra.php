<?php
$config = array();

// openshift env
if ( getenv('OPENSHIFT_APP_NAME') ) {
  $config["esoTalk.database.host"] = getenv('OPENSHIFT_MYSQL_DB_HOST');
  $config["esoTalk.database.port"] = getenv('OPENSHIFT_MYSQL_DB_PORT');
  $config["esoTalk.database.user"] = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
  $config["esoTalk.database.password"] = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
  $config["esoTalk.database.dbName"] = getenv('OPENSHIFT_APP_NAME');
  // $config["esoTalk.baseURL"] = 'http://3dgundam.com/';
}

// default off mention email
// $config["esoTalk.preferences.email.privateAdd"] = false;
$config["esoTalk.preferences.email.post"] = false;
// $config["esoTalk.preferences.email.mention"] = false;
