<!-- /**
     * 
     *      Definire classe User:
     *          ATTRIBUTI (private):
     *          - username 
     *          - password
     *          - age
     *          
     *          METODI:
     *          - costruttore che accetta username, e password
     *          - proprieta' getter/setter
     *          - printMe: che stampa se stesso
     *          - toString: "username: age [password]"
     * 
     *          ECCEZIONI:
     *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
     *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
     *          - scatenare eccezione se age non e' un numero
     * 
     *          NOTE:
     *          - per testare il singolo carattere di una stringa
     * 
     *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
     *      try-catch e eventualmente informare l'utente del problema
     * 
     */ -->
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
        return $this -> username . ": " . $this -> age . " [" . $this -> password . "] " . "<br>";
    }
}
 echo "primo esercizio," . "<br>" . "classe User :" . "<br>" . "<br>";
try {
    $u1 = new User("Utente007", "123/stella");
    $u1 -> setAge(16); 
    echo $u1;
} catch (Exception $e){   
    echo $e -> getMessage(); 
}

echo "<br>" . "<br>" ."<br>"
 ?>

<!-- /**
     *      
     *      Definire classe Computer:
     *          ATTRIBUTI:
     *          - codice univoco
     *          - modello
     *          - prezzo
     *          - marca
     * 
     *          METODI:
     *          - costruttore che accetta codice univoco e prezzo
     *          - proprieta' getter/setter per tutte le variabili d'istanza
     *          - printMe: che stampa se stesso (come quella vista a lezione)
     *          - toString: "marca modello: prezzo [codice univoco]"
     * 
     *          ECCEZIONI:
     *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
     * 
 -->

 <?php

class Computer {
    private $codiceUnivoco;
    private $modello;
    private $prezzo;
    private $marca;

    public function __construct($codiceUnivoco, $prezzo) {
        $this -> setCodiceUnivoco($codiceUnivoco);
        $this -> setPrezzo($prezzo);
    }

    public function setCodiceUnivoco($codiceUnivoco) {

        if(!ctype_digit($codiceUnivoco) || strlen($codiceUnivoco)!== 6)
        throw new Exception("Codice Univoco non valido");

        $this -> codiceUnivoco = $codiceUnivoco;
    }

    public function getCodiceUnivoco() {
        return $this -> codiceUnivoco;
    }

    public function setPrezzo($prezzo) {
        
        if(!is_int($prezzo)) 
            throw new Exception("Il prezzo deve essere un valore intero");

        if($prezzo < 0 || $prezzo > 2000) 
        throw new Exception("Il prezzo deve essere un valore compreso tra 0 e 2000");
        
        $this -> prezzo = $prezzo;
    }

    public function getPrezzo() {
        return $this -> prezzo;
    }

    public function setModello($modello) {
        if(!is_string($modello))
        throw new Exception("Modello non valido");
        if(strlen($modello)< 3 || strlen($modello)> 20)
        throw new Exception("Modello non valido");
        $this -> modello = $modello;
    }

    public function getModello() {
        return $this -> modello;
    }

    public function setMarca($marca) {
        if(!is_string($marca))
        throw new Exception("Modello non valido");
        if(strlen($marca)< 3 || strlen($marca)> 20)
        throw new Exception("Marca non valida");
        $this -> marca = $marca;
    }

    public function getMarca() {
        return $this -> marca;
    }
    
    public function __toString() {
        return $this -> marca . " " . $this -> modello . ": " . $this -> prezzo . "$" . " [" . $this -> codiceUnivoco . "]";
    }

    public function printMe() {
        echo $this . "<br>";
    }
}

echo "secondo esercizio," . "<br>" . "classe Computer:" . "<br>" . "<br>";
try {
    $c1 = new Computer("123456", 1800);
    $c1 -> setModello("modello");
    $c1 -> setMarca("marca");
    echo $c1;
} catch(Exception $e) {
    echo $e -> getMessage();
}
?>