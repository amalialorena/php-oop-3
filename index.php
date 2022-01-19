<?php

class User {

    private $username;
    private $password;
    private $age;

    public function __construct($username, $pasword) {
        $this -> setUsername($username);
        $this -> setpassword($pasword);
    }

    public function getUsername() {
        return $this -> username;
    }

    public function setUsername($username) {
        $usernameArr = str_split($username);
        // oppure strlen($username)
        if (count($usernameArr)< 3)
        throw new Exception("Il username deve avere almeno 3 caratteri");
        if (count($usernameArr) > 16)
        throw new Exception("Il username deve avere massimo 16 caratteri");
        $this -> username = $username;
    }

    public function getPassword() {
        return $this -> password;
    }

    public function setPassword($password) {
        
        if(ctype_alnum($password)) {
            throw new Exception ("La password deve contenere almeno un carattere speciale");
        }

        $this -> password = $password;
    }

    public function getAge() {
        return $this -> age;
    }

    public function setAge($age) {

        if(!is_numeric($age))
        throw new Exception("L'età deve essere un numero");
        $this -> age = $age;
    }

    public function printMe() {
        echo $this . "<br>";
    }

    public function __toString() {
        return $this -> username . ": " . $this -> age . " [ " . $this -> password . " ] " . "<br>";
    }
}




try {
    $u1 = new User("wfwrgw", "123/stella");
    $u1 -> setAge(16); 
    echo $u1;
    echo $u1 -> getAge();
    
} catch (Exception $e){   
    echo $e -> getMessage(); 
}



 ?>