<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Service\Task\TaskStoreService;

abstract class TaskBaseController extends Controller
{
    public $taskStoreService;


    public function __construct(
        TaskStoreService $taskStoreService, 
        ) {

        $this->taskStoreService = $taskStoreService;
        
    }
}
