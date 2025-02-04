
<?php




// La classe astratta non può essere istanziata
abstract class Continent {
    public $nameContinent;

   
    public function __construct($continent) {
        $this->nameContinent = $continent;
    }



    //  Nei metodi la keyord abstract mi permette di indirizzare il  mio codice implementando necessariamente questo metodo nelle classi figlie
    abstract public function getMyCurrentLocation();  // La particolarità della funzione astratta è che non deve avere del codice all'interno
}





// Country
abstract class Country extends Continent {

    public $nameCountry;

    public function __construct($continent, $country) {  //   // Devo riutilizzare di nuovo il construct per passare i parametri reali per poi ripassarli di nuovo sotto

        parent::__construct($continent); //  parent è una keyword che fa riferimento a tutto quello che è disponibile nella CLASSE GENITORE, io pero devo usare il costruttore di quella classe e non di quello oggetto e quindi uso lo SCOPE RESOLUTION OPERATOR

        $this->nameCountry = $country;  // attributo specifico della classe Country  
    }
}







// Region
abstract class Region extends Country {
    public $nameRegion;

    public function __construct($continent, $country, $region) {

        parent::__construct($continent, $country); 

        $this->nameRegion = $region;
    }
}







// Province
abstract class Province extends Region {
    public $nameProvince;

  
    public function __construct($continent, $country, $region, $province) {

        parent::__construct($continent, $country, $region); 

        $this->nameProvince = $province;
    }
}








// City
abstract class City extends Province {
    public $nameCity;


    public function __construct($continent, $country, $region, $province, $city) {

        parent::__construct($continent, $country, $region, $province); 

        $this->nameCity = $city;
    }
}








// Street
abstract class Street extends City {
    public $nameStreet;

    public function __construct($continent, $country, $region, $province, $city, $street) {

        parent::__construct($continent, $country, $region, $province, $city);

        $this->nameStreet = $street;
    }

}





// Classe non astratta estende Street
class MyLocation extends Street {

    // Implementazione del metodo getMyCurrentLocation
    public function getMyCurrentLocation() {
        echo "Mi trovo in {$this->nameContinent}, {$this->nameCountry}, {$this->nameRegion}, {$this->nameProvince}, {$this->nameCity}, Strada {$this->nameStreet}\n";
    }
}





// Istanza della classe MyLocation 
$myLocation = new MyLocation("Europa", "Italia", "Puglia", "Ba", "Bari", "San Giorgio Martire 2D");





// Chiamata del metodo dove all'interno di getMyCurrentLocation vi è riportato l'echo 
$myLocation->getMyCurrentLocation();

?>