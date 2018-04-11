<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_link_stats extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'link_id' => array(
                                'type' => 'INT',
                                'constraint' => '5',
                        ),
                        'ip' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '15',
                        ),
                        'browser' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'time' => array(
                                'type' => 'DATETIME'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('link_stats');
        }

        public function down()
        {
                $this->dbforge->drop_table('link_stats');
        }
}
