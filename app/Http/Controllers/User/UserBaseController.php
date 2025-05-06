<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service\User\UserRegisterService;

abstract class UserBaseController extends Controller
{
    public $registerService;


    public function __construct(
        UserRegisterService $registerService, 
        ) {

        $this->registerService = $registerService;
        
    }
}
