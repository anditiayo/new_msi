<?php

class Migration_user extends CI_Migration {

   public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'employee_id' => array(
                'type' => 'INT',
                'constraint' => 5
            ),
            'username' => array(
                'type' => 'varchar',
                'constraint' => 50
            ),
            'password' => array(
                'type' => 'varchar',
                'constraint' => 80
            ),
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');
    }

    public function down() {
        $this->dbforge->drop_table('user');
    }

}