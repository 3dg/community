<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

if (!defined("IN_ESOTALK")) exit;

class ETUploadsController extends ETController {


public function action_avatars($filename)
{
	$result = preg_replace('/@2x\./', '.', $filename, 1, $count);
	if ( $count ) {
		$this->redirect("/uploads/avatars/$result");
	} else {
		ET::notFound();
	}
}

}
