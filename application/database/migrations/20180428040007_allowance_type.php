<?php

class Migration_allowance_type extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'allowance_type_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'allowance_name' => array(
                'type'  => 'varchar',
                'constraint' => 50
            ),
            'description' => array(
                'type' => 'text'
           ),
            'date_created'          => array(
                'type'              => 'DATETIME'
            ),
            'date_updated'          => array(
                'type'              => 'DATETIME'
            ),
            'user_updated'          => array(
                'type'              => 'smallint',
                'constraint'        => 3
            )
        ));
        $this->dbforge->add_key('allowance_type_id', TRUE);
        $this->dbforge->create_table('allowance_type');
    }

    public function down() {
        $this->dbforge->drop_table('allowance_type');
    }

}