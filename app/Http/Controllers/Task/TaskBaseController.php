<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Service\Task\TaskStoreService;
use App\Service\Task\TaskUpdateService;
use App\Service\Task\TaskDestroyService;

abstract class TaskBaseController extends Controller
{
    public $taskStoreService;
    public $taskUpdateService;
    public $taskDestroyService;


    public function __construct(
        TaskStoreService $taskStoreService, 
        TaskUpdateService $taskUpdateService,
        TaskDestroyService $taskDestroyService,
        ) {

        $this->taskStoreService = $taskStoreService;
        $this->taskUpdateService = $taskUpdateService;
        $this->taskDestroyService = $taskDestroyService;
        
    }
}
