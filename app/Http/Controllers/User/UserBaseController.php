<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service\User\UserLoginService;
use App\Service\User\UserRegisterService;

abstract class UserBaseController extends Controller
{
    public $registerService;
    public $loginService;


    public function __construct(
        UserRegisterService $registerService, 
        UserLoginService $loginService,
        ) {

        $this->registerService = $registerService;
        $this->loginService = $loginService;
        
    }
}
