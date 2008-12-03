<?php

class AppView extends Lvc_View
{
	public function requireCss($cssFile)
	{
		$this->controller->requireCss($cssFile);
	}
}

?>