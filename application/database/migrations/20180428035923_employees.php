<?php

class Migration_employees extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id'                    => array(
                'type'              => 'INT',
                'constraint'        => 11,
                'auto_increment'    => TRUE
            ),
            'employee_id'           => array(
                'type'              => 'INT',
                'constraint'        => 6,
            ),
            'front_name'            => array(
                'type'              => 'VARCHAR',
                'constraint'        => 50
            ),
            'mid_name'              => array(
                'type'              => 'VARCHAR',
                'constraint'        => 50
            ),
            'last_name'             => array(
                'type'              => 'VARCHAR',
                'constraint'        => 50
            ),
            'cost_center_id'        => array(
                'type'              => 'smallint',
                'constraint'        => 1
            ),
            'place_of_birth'        => array(
                'type'              => 'smallint',
                'constraint'        => 2
            ),
            'birthday'              => array(
                'type'              => 'DATE' 
            ),
            'address1'              => array(
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ),
            'address2'              => array(
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ),
            'province_id_1'         => array(
                'type'              => 'smallint',
                'constraint'        => 3
            ),
            'province_id_2'        => array(
                'type'              => 'smallint',
                'constraint'        => 3
            ),
            'city_id_1'             => array(
                'type'              => 'smallint',
                'constraint'        => 3
            ),
            'city_id_2'             => array(
                'type'              => 'smallint',
                'constraint'        => 3
            ),
            'district_id_1'         => array(
                'type'              => 'smallint',
                'constraint'        => 3
            ),
            'district_id_2'         => array(
                'type'              => 'smallint',
                'constraint'        => 3
            ),
            'pos_code1'             => array(
                'type'              => 'int',
                'constraint'        => 6
            ),
            'pos_code2'             => array(
                'type'              => 'int',
                'constraint'        => 6
            ),
            'created_from_ip'       => array(
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ),
            'updated_from_ip'       => array(
                'type'              => 'VARCHAR',
                'constraint'        => 100
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
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => 1
            ),
            'salary_id' => array(
                'type' => 'float',
                'constraint' => 15
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('employees');
    }

    public function down() {
        $this->dbforge->drop_table('msi_employees');
    }

}