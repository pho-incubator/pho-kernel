<?php

namespace Pho\Kernel\Services\Logger;

use Pho\Kernel\Services\ServiceInterface;
use Monolog\Logger;

abstract class LoggerBase implements LoggerInterface, ServiceInterface {
    
    /**
     * @var Monolog\Logger
     */
    protected $channel;

    protected function processParams(array $message): string
    {
        //eval(\Psy\sh());
        $msg_type = count($message);
        if($msg_type==1)
            return (string) $message[0];
        else if($msg_type<1)
            return "";
        else {
            $params = $message;
            $message = array_shift($params);
            return sprintf($message, ...$params);
        }
    }
    
    public function bare(): ?\Psr\Log\LoggerInterface
    {
        if($this->channel instanceof Logger)
            return $this->channel;   
        return null;
    }

}
