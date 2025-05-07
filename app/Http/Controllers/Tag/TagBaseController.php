<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Service\Tag\TagStoreService;

abstract class TagBaseController extends Controller
{
    public $tagStoreService;


    public function __construct(
        TagStoreService $tagStoreService, 
        ) {

        $this->tagStoreService = $tagStoreService;
        
    }
}
