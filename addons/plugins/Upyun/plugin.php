<?php

if (!defined('IN_ESOTALK')) exit;

ET::$pluginInfo['Upyun'] = array(
  'name' => 'Upyun',
  'description' => '',
  'version' => '0.1.0',
  'author' => '',
  'authorEmail' => '',
  'authorURL' => '',
  'license' => 'MIT',
  'dependencies' => array(
    'BBCode' => '0',
  )
);

class ETPlugin_Upyun extends ETPlugin {

  public function __construct($rootDirectory)
  {
    parent::__construct($rootDirectory);
    ETFactory::registerController('upyun', 'UpyunController', dirname(__FILE__).'/UpyunController.class.php');
  }

  public function handler_conversationController_renderBefore($sender)
  {
    $sender->addJSFile($this->resource('upyun.js'));
    $sender->addCssFile($this->resource('upyun.css'));
  }


  public function settings($sender)
  {
    $form = ETFactory::make('form');
    $form->action = URL('admin/plugins/settings/Upyun');

    $form->setValue('bucket', C('plugin.upyun.bucket'));
    $form->setValue('secret', C('plugin.upyun.secret'));
    $form->setValue('endpoint', C('plugin.upyun.endpoint'));
    // $form->setValue('expiration', C('plugin.upyun.expiration'));

    if ($form->validPostBack('submit')) {
      $config = array();
      $config['plugin.upyun.bucket'] = $form->getValue('bucket');
      $config['plugin.upyun.secret'] = $form->getValue('secret');
      $config['plugin.upyun.endpoint'] = $form->getValue('endpoint');

      if (!$form->errorCount()) {
        ET::writeConfig($config);
        $sender->message(T('message.changesSaved'), 'success autoDismiss');
        $sender->redirect(URL('admin/plugins'));
      }
    }
    $sender->data('form', $form);
    return $this->view('settings');
  }
}
