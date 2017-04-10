<?php

if (!defined('IN_ESOTALK')) exit;

ET::$pluginInfo['CaptchaQuestion'] = array(
  'name' => 'CaptchaQuestion',
  'description' => '',
  'version' => '0.1.0',
  'author' => '',
  'authorEmail' => '',
  'authorURL' => '',
  'license' => 'MIT',
  'priority' => 0,
);

class ETPlugin_CaptchaQuestion extends ETPlugin {

  public function __construct($rootDirectory)
  {
    parent::__construct($rootDirectory);
    ETFactory::registerController('captcha', 'CaptchaQuestionController', dirname(__FILE__).'/CaptchaQuestionController.class.php');
  }

  public function handler_renderBefore($sender)
  {
    $sender->addCSSFile($this->resource('captcha.css'));
  }

  public function handler_userController_initJoin($sender, $form)
  {
    $form->addSection('captcha', '验证码');
    $form->addField('captcha', 'captcha', function($form) use ($sender)
    {
      return $sender->getViewContents($this->view('captcha/captcha'), array('form' => $form, 'tips' => true));
    },
    function($form, $key, &$data) use ($sender)
    {
      if ( !self::verifyCode($form->getValue($key)) ) {
        $form->error($key, '验证码错误');
      }
    });
  }

  public static function verifyCode($code = '') {
    return $code === '78';
  }
}
