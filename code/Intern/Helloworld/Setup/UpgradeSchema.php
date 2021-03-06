<?php
namespace Intern\Helloworld\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;

        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.3.3', '<')) {
            if (!$installer->tableExists('intern_helloworld_post')) {
                $connection = $installer->getConnection();
                $table = $connection->newTable(
                    $installer->getTable('intern_helloworld_post')
                )
                    ->addColumn(
                        'post_id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'Posts ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'Posts Name'
                    )
                    ->addColumn(
                        'url_key',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Posts URL Key'
                    )
                    ->addColumn(
                        'post_content',
                        Table::TYPE_TEXT,
                        '64k',
                        [],
                        'Posts Posts Content'
                    )
                    ->addColumn(
                        'tags',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Posts Tags'
                    )
                    ->addColumn(
                        'status',
                        Table::TYPE_INTEGER,
                        1,
                        [],
                        'Posts Status'
                    )
                    ->addColumn(
                        'featured_image',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Posts Featured Image'
                    )
                    ->addColumn(
                        'created_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Posts Table');
                $connection->createTable($table);

                $connection->addIndex(
                    $installer->getTable('intern_helloworld_post'),
                    $setup->getIdxName(
                        $installer->getTable('intern    _helloworld_post'),
                        ['name','url_key','post_content','tags','featured_image'],
                        AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name','url_key','post_content','tags','featured_image'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
    }
}
