<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductTypes Controller
 *
 * @property \App\Model\Table\ProductTypesTable $ProductTypes
 *
 * @method \App\Model\Entity\ProductType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductTypesController extends AppController
{

    public $paginate = [
        'page' => 1,
        'fields' => [
            'id', 'name'
        ],
        'sortWhitelist' => [
            'id','name'
        ]
        ];

}
