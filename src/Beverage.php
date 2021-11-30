<?php 

class Beverage
{
	/**
	 * The product name etc. 33cl kutu kola
	 *
	 * @var string
	 */
	private $name = "33cl Kutu Kola";

	/**
	 * Liter of Beverage
	 *
	 * @var float
	 */
	private $liter = 0.33;

	/**
	 * Brand of Beverage
	 *
	 * @var string
	 */
	private $brand = "Coca Cola";

	/**
	 * The Beverage instance 
	 *
	 * @var Beverage
	 */
	private static $beverage;

	public static function getBeverage() {
        if (!isset(self::$beverage)) {
            self::$beverage = new Beverage();
        }
         
        return self::$beverage;
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getLiter()
    {
    	return $this->liter;
    }

    public function getBrand()
    {
    	return $this->brand;
    }
}


?>