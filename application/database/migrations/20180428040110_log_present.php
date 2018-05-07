<?php

class Migration_log_present extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('log_present');
    }

    public function down() {
        $this->dbforge->drop_table('log_present');
    }

}