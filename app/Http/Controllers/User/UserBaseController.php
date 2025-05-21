<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service\User\UserLoginService;
use App\Service\User\UserRegisterService;

abstract class UserBaseController extends Controller
{
    public $userRegisterService;


    public function __construct(
        UserRegisterService $userRegisterService,
        ) {
        $this->userRegisterService = $userRegisterService;
    }
}
