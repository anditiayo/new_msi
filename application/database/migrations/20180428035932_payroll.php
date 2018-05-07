<?php

class Migration_payroll extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id'                    => array(
                'type'              => 'INT',
                'constraint'        => 11,
                'auto_increment'    => TRUE
            ),
            'payno'                    => array(
                'type'              => 'INT',
                'constraint'        => 10,
            ),
            'employee_id'           => array(
                'type'              => 'INT',
                'constraint'        => 6
            ),
            'allowances_id'          => array(
                'type'              => 'INT',
                'constraint'        => 6 
            ),
            'pay_date'              => array(
                'type'              => 'DATETIME'
            ),
            'pay_mode'             => array(
                'type'              => 'INT',
                'constraint'        => 1
            ),
            'deduction_id'           => array(
                'type'              => 'INT',
                'constraint'        => 6
            ),
            'basic_pay'             => array(
                'type'              => 'float',
                'constraint'         => 15 
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
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('payroll');
    }

    public function down() {
        $this->dbforge->drop_table('payroll');
    }

}