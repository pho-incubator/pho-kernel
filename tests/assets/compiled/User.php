<?php

namespace PhoNetworksAutogenerated;

use Pho\Framework;
use Pho\Kernel\Kernel;
use Pho\Kernel\Traits;
use Pho\Kernel\Foundation;




/*****************************************************
 * This file was auto-generated by pho-compiler
 * For more information, visit http://phonetworks.org
 ******************************************************/

class User extends Foundation\AbstractActor {

    const T_EDITABLE = false;
    const T_PERSISTENT = true;
    const T_EXPIRATION =  0;
    const T_VERSIONABLE = false;
    
    const DEFAULT_MOD = 0x0e554;
    const DEFAULT_MASK = 0xeeeee;

    protected function onIncomingEdgeRegistration(): void
    {
        $this->registerIncomingEdges(UserOut\Follow::class);
        $this->registerIncomingEdges(StatusOut\Mention::class);
    }

}

/*****************************************************
 * Timestamp: 1499250346
 * Size (in bytes): 1014
 * Compilation Time: 26891
 * bbadc1a06350a4e257ba4878c292c14d
 ******************************************************/