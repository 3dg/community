<?php
if (!defined('IN_ESOTALK')) exit;

ET::$pluginInfo['Embed'] = array(
  'name' => 'Embed',
  'description' => 'Embed medias',
  'version' => '0.1.0',
  'author' => '',
  'authorEmail' => '',
  'authorURL' => '',
  'license' => 'MIT',
  'dependencies' => array(
    'BBCode' => '0',
  )
);

class ETPlugin_Embed extends ETPlugin {

public function handler_format_format($sender)
{
  if ($sender->inline) return;

  // https://sketchfab.com
  $sender->content = $sender->content = preg_replace("/\[sketchfab\](\w+)\[\/sketchfab\]/si", '<iframe width="640" height="480" src="https://sketchfab.com/models/$1/embed" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>', $sender->content);
}

}
