<?php
namespace Intern\Hospital\Setup;
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

        if(version_compare($context->getVersion(), '1.0.1', '<')) {
            if (!$installer->tableExists('intern_hospital_post')) {
                $connection = $installer->getConnection();
                $table = $connection->newTable(
                    $installer->getTable('intern_hospital_post')
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
                        'address',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Posts Address'
                    )
                    ->addColumn(
                        'telephone',
                        Table::TYPE_TEXT,
                        20,
                        [],
                        'Posts Telephone '
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
                    $installer->getTable('intern_hospital_post'),
                    $setup->getIdxName(
                        $installer->getTable('intern_hospital_post'),
                        ['name', 'address', 'telephone'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name', 'address', 'telephone'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
    }
}
