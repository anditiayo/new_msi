<?php

class Migration_allowances extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'allowances_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'employee_id' => array(
                'type' => 'INT',
                'constraint' => 6
            ),
            'allowance_type_id' => array(
                'type' => 'INT',
                'constraint' => 6
            ),
            'effectivedate' => array(
                'type' => 'DATETIME'
            ),
            'allamount' => array(
                'type' => 'float',
                'constraint' => 15
            ),
            'enddate' => array(
                'type' => 'DATETIME'
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
        $this->dbforge->add_key('allowances_id', TRUE);
        $this->dbforge->create_table('allowances');
    }

    public function down() {
        $this->dbforge->drop_table('allowances');
    }

}