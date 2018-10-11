<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('Customers')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('Order_Items')
            ->addColumn('customer_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('product_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('quantity', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('price', 'float', [
                'default' => null,
                'null' => false,
                'precision' => 9,
                'scale' => 2,
            ])
            ->addColumn('date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'customer_id',
                ]
            )
            ->addIndex(
                [
                    'product_id',
                ]
            )
            ->create();

        $this->table('Product_Types')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('Products')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('price', 'float', [
                'default' => null,
                'null' => false,
                'precision' => 9,
                'scale' => 2,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('productType_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('store_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('deleted', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'productType_id',
                ]
            )
            ->addIndex(
                [
                    'store_id',
                ]
            )
            ->create();

        $this->table('Stores')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('Users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('type', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('files')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('path', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status', 'boolean', [
                'comment' => '1 = Active, 0 = Inactive',
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('i18n')
            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('field', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'locale',
                    'model',
                    'foreign_key',
                    'field',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'model',
                    'foreign_key',
                    'field',
                ]
            )
            ->create();

        $this->table('products_files', ['id' => false, 'primary_key' => ['product_id', 'file_id']])
            ->addColumn('product_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'file_id',
                ]
            )
            ->addIndex(
                [
                    'product_id',
                ]
            )
            ->create();

        $this->table('Customers')
            ->addForeignKey(
                'user_id',
                'Users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('Order_Items')
            ->addForeignKey(
                'customer_id',
                'Customers',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'product_id',
                'Products',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('Products')
            ->addForeignKey(
                'productType_id',
                'Product_Types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'store_id',
                'Stores',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('Stores')
            ->addForeignKey(
                'user_id',
                'Users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('products_files')
            ->addForeignKey(
                'file_id',
                'files',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'product_id',
                'Products',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('Customers')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('Order_Items')
            ->dropForeignKey(
                'customer_id'
            )
            ->dropForeignKey(
                'product_id'
            )->save();

        $this->table('Products')
            ->dropForeignKey(
                'productType_id'
            )
            ->dropForeignKey(
                'store_id'
            )->save();

        $this->table('Stores')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('products_files')
            ->dropForeignKey(
                'file_id'
            )
            ->dropForeignKey(
                'product_id'
            )->save();

        $this->table('Customers')->drop()->save();
        $this->table('Order_Items')->drop()->save();
        $this->table('Product_Types')->drop()->save();
        $this->table('Products')->drop()->save();
        $this->table('Stores')->drop()->save();
        $this->table('Users')->drop()->save();
        $this->table('files')->drop()->save();
        $this->table('i18n')->drop()->save();
        $this->table('products_files')->drop()->save();
    }
}
