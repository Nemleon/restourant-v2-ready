<?php

namespace applications\lib\phpMailer;

class Exception extends \Exception
{
    public function errorMessage()
	
    {
        return '<strong>' . htmlspecialchars($this->getMessage()) . "</strong><br />\n";
		
    }
}
