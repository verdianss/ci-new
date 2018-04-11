<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_links extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => '5',
                        ),
                        'code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'expired' => array(
                                'type' => 'DATETIME'
                        ),
                        'created' => array(
                                'type' => 'DATETIME'
                        ),
                        'deleted' => array(
                                'type' => 'DATETIME'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('links');
        }

        public function down()
        {
                $this->dbforge->drop_table('links');
        }
}
