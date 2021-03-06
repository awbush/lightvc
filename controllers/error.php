<?php

class ErrorController extends AppController
{
	public function actionView($errorNum = '404')
	{
		if (is_array($errorNum))
		{
			$errorNum = $errorNum['error'];
		}
		else
		{
			if (strpos($errorNum, '../') !== false)
			{
				$errorNum = '404';
			}
		}
		$statusCode = $this->sendHttpStatusHeader($errorNum);
		$this->setLayoutVar('pageTitle', $statusCode->getDefinition());
		$this->loadView($this->getControllerName() . '/' . $statusCode->getCode());
	}
	
}

?>