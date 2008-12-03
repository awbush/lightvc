<?php

class ErrorController extends AppController
{
	public function actionView($errorNum = '404')
	{
		if (strpos($errorNum, '../') !== false)
		{
			$errorNum = '404';
		}
		
		include_once('../classes/HttpStatusCode.class.php');
		$statusCode = new HttpStatusCode($errorNum);
		$this->setLayoutVar('pageTitle', $statusCode->getDefinition());
		$this->loadView($this->getControllerName() . '/' . $statusCode->getCode());
	}
	
}

?>