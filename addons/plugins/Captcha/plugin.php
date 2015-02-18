<?php

if (!defined('IN_ESOTALK')) exit;

ET::$pluginInfo['Captcha'] = array(
  'name' => 'Captcha',
  'description' => '',
  'version' => '0.1.0',
  'author' => '',
  'authorEmail' => '',
  'authorURL' => '',
  'license' => 'MIT',
  'priority' => 0,
);

class ETPlugin_Captcha extends ETPlugin {

  public function __construct($rootDirectory)
  {
    parent::__construct($rootDirectory);
    ETFactory::registerController('captcha', 'CaptchaController', dirname(__FILE__).'/CaptchaController.class.php');
  }

  public function handler_renderBefore($sender)
  {
    $sender->addCSSFile($this->resource('captcha.css'));
    $sender->addJSFile($this->resource('captcha.js'));
  }

  public function handler_userController_initJoin($sender, $form)
  {
    $form->addSection('captcha', '验证码');
    $form->addField('captcha', 'captcha', function($form) use ($sender)
    {
      return $sender->getViewContents($this->view('captcha/captcha'), array('form' => $form));
    },
    function($form, $key, &$data) use ($sender)
    {
      if ( !self::verifyCode($form->getValue($key)) ) {
        $form->error($key, '验证码错误');
      }
    });
  }

  // public function handler_userController_renderJoinButtonsAfter($sender)
  // {
  //   echo $sender->getViewContents($this->view('captcha/captcha'));
  // }

  // public function handler_conversationController_renderEditBox($sender, &$formatted, $post)
  // {
  //   addToArray($formatted['footer'], 'hehehehe', 0);
  // }

  // public function handler_conversationController_renderReplyBox($sender, &$formatted, $post)
  // {
  //   addToArray($formatted['footer'], 'hehehehe', 0);
  // }


  public static function verifyCode($code = '') {
    $code = strtoupper($code);
    return ET::$session->get('plugin_captcha') === $code;
  }
  public static function generateCode() {
    static $codes = 'ABCDEFGHIJKLMNPQRSTUVWXYZ01245678';
    $count = strlen($codes);

    $code = '';
    for ($i=0; $i < 4; $i++) {
      $code .= substr($codes, rand() % $count, 1);
    }

    // case insensitive
    $code = strtoupper($code);
    ET::$session->store('plugin_captcha', $code);
    return $code;
  }
}
