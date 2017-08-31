<?php

/**
 * ./yii migrate/create section
 *

 * cascade方式
 * 在父表上update/delete记录时，同步update/delete掉子表的匹配记录
 * set null方式
 * 在父表上update/delete记录时，将子表上匹配记录的列设为null
 * 要注意子表的外键列不能为not null

 * No action方式
 * 如果子表中有匹配的记录,则不允许对父表对应候选键进行update/delete操作

 * Restrict方式
 * 同no action, 都是立即检查外键约束

 * Set default方式
 * 父表有变更时,子表将外键列设置成一个默认的值 但Innodb不能识别



 * addForeignKey()方法的参数注释：
 * 参数1：设置本表的外键名（可自定义）。
 * 参数2：本表表名。
 * 参数3：本表中与外表关联的字段名称。如果有多个字段，以逗号分隔或使用一个数组。
 * 参数4：外表表名。
 * 参数5：外表中与本表关联的字段名称。如果有多个字段，以逗号分隔或使用一个数组。
 * 参数6：删除选项，可选，默认为空。可选的类型有 RESTRICT, CASCADE, NO ACTION, SET DEFAULT, SET NULL。
 * 参数7：更新选项，可选，默认为空。可选的类型有 RESTRICT, CASCADE, NO ACTION, SET DEFAULT, SET NULL。
 * 注意：参数3和参数5的字段类型必须一致，否则执行失败。
 *
 * Restrict 删除当前id  确保没有被引用为parent
 *
 * Cascade  更新当前id  引用为parent 对应项也更新
 *
 *
 */
use yii\db\Migration;

class m170528_024656_section extends Migration
{
    const TB_NAME = '{{%section}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TB_NAME, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170528_024656_section cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
