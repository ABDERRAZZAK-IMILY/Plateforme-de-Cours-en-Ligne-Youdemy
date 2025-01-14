<?php

require_once '../model/USER.php';

class Visteur extends User {

    private $student_id;

    public function __construct($name, $email, $password , $role) {
        parent::__construct($name, $email, $password, $role);
    }


}

?>
