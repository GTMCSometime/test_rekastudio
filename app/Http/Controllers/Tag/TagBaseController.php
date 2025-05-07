<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Service\Tag\TagStoreService;
use App\Service\Tag\TagUpdateService;

abstract class TagBaseController extends Controller
{
    public $tagStoreService;
    public $tagUpdateService;


    public function __construct(
        TagStoreService $tagStoreService, 
        TagUpdateService $tagUpdateService
        ) {

        $this->tagStoreService = $tagStoreService;
        $this->tagUpdateService = $tagUpdateService;
        
    }
}
