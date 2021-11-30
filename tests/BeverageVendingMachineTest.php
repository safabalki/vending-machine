<?php 

require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class BeverageVendingMachineTest extends TestCase{

    public function testPushItemReturnFalseWhenDoorClose()
    {
    	$beverageVendingMachine = new BeverageVendingMachine();

		$this->assertFalse($beverageVendingMachine->pushDrink());
    }

    public function testPullItemReturnFalseWhenDoorClose()
    {
    	$beverageVendingMachine = new BeverageVendingMachine();

		$this->assertFalse($beverageVendingMachine->pullDrink());
    }

    public function testPushItemReturnFalseWhenFull()
    {
    	$beverageVendingMachine = new BeverageVendingMachine();

    	$maxBeverageCount = $beverageVendingMachine->rowCount * $beverageVendingMachine->itemCountPerRow;

		for ($i=0; $i < $maxBeverageCount; $i++) { 
    		$beverageVendingMachine->opendoor();
	    	$beverageVendingMachine->pushDrink();
	    	$beverageVendingMachine->closedoor();
    	}
    	
		$beverageVendingMachine->opendoor();
		$this->assertFalse($beverageVendingMachine->pushDrink());
    	$beverageVendingMachine->closedoor();
    }

    public function testPullItemReturnFalseWhenEmpty()
    {
    	$beverageVendingMachine = new BeverageVendingMachine();

		$beverageVendingMachine->opendoor();
		$this->assertFalse($beverageVendingMachine->pullDrink());
    	$beverageVendingMachine->closedoor();
    }

    public function testPushItemReturnBeverageWhenOpenDoorAndEmpty()
    {
    	$beverageVendingMachine = new BeverageVendingMachine();

    	$beverageVendingMachine->opendoor();
		$this->assertInstanceOf(Beverage::class, $beverageVendingMachine->pushDrink());
    	$beverageVendingMachine->closedoor();
    }

    public function testPullItemReturnBeverageWhenOpenDoorAndNotEmpty()
    {
    	$beverageVendingMachine = new BeverageVendingMachine();

    	$beverageVendingMachine->opendoor();
    	$beverageVendingMachine->pushDrink();
    	$beverageVendingMachine->closedoor();

    	$beverageVendingMachine->opendoor();
		$this->assertInstanceOf(Beverage::class, $beverageVendingMachine->pullDrink());
    	$beverageVendingMachine->closedoor();
    }
	
}

?>