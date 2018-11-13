<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
class ProductTypesController extends AppController
{
    public $paginate = [
        'page' => 1,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
}