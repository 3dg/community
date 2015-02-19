<?php

if (!defined("IN_ESOTALK")) exit;

ET::$pluginInfo["Photoswipe"] = array(
	"name" => "Photoswipe",
	"description" => "",
	"version" => "0.1.0",
	"author" => "",
	"authorEmail" => "",
	"authorURL" => "",
	"license" => "MIT",
	"priority" => "0"
);

class ETPlugin_Photoswipe extends ETPlugin {
	public function handler_conversationController_renderBefore($sender)
	{

		$sender->addCSSFile($this->resource("photoswipe/photoswipe.css"));
		$sender->addCSSFile($this->resource("photoswipe/default-skin/default-skin.css"));
		$sender->addJSFile($this->resource("photoswipe/photoswipe.js"));
		$sender->addJSFile($this->resource("photoswipe/photoswipe-ui-default.js"));

		$sender->addCSSFile($this->resource("photoswipe.css"));
		$sender->addJSFile($this->resource("photoswipe.js"));
	}
}
