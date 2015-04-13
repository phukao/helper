<?php

class DB {

    public $db;

    function __construct( $username, $password, $host, $dbname ) {

        $uri = "mysql:host=" . $host . ";dbname=" . $dbname . ";";
        
        $this->db = new PDO( $uri, $username, $password );

    }

    public function getAll( $table_name ) {

        $query_string = "SELECT * FROM " . $table_name . " WHERE 1;";

        $statement = $this->db->prepare( $query_string );
        $statement->execute();

        return $statement->fetchAll( PDO::FETCH_ASSOC );

    }

}
