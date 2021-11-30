<?php 

require("AbstractVendingMachine.php");
require("Beverage.php");

class BeverageVendingMachine extends AbstractVendingMachine
{
	/**
     * Number of beverage vending machine row
     *
     * @var int
 	*/
	public $rowCount = 3;

	/**
     * Number of item on each beverage vending machine row
     *
     * @var int
    */
	public $itemCountPerRow = 20;

	/**
     * it controls the beverage vending machine occupancy status.
     *
     * @return boolean
    */
	public function getVendingMachineStatus(){

		if($this->getItemCount() == 0){

			$this->status = AbstractVendingMachine::STATUSES["EMPTY"];

		}else if($this->getItemCount() < ($this->rowCount * $this->itemCountPerRow) ){

			$this->status = AbstractVendingMachine::STATUSES["HALF_FULL"];

		}else{

			$this->status = AbstractVendingMachine::STATUSES["FULL"];

		}

		return $this->status; 		
	}

	/**
     * Is the beverage vending machine full for pull or push item?
     *
     * @return boolean
    */
	public function isVendingMachineFull()
	{
		return $this->getItemCount() == $this->rowCount * $this->itemCountPerRow;
	}

	/**
     * Is the beverage vending machine empty for pull or push item?
     *
     * @return boolean
    */
	public function isVendingMachineEmpty()
	{
		return $this->getItemCount() == 0;
	}

	/**
     * It is used to push products in the beverage vending machine. it controls the machine door and the occupancy status.
     *
     * @return Beverage()
    */
	public function pushDrink()
	{
		// Is the beverage vending machine door open or closed?

		if($this->isOpen){

			// Is the beverage vending machine full?

			if(!$this->isVendingMachineFull()){

				$this->setItemCount($this->getItemCount()+1);

				return Beverage::getBeverage();
				
			}else{

				echo AbstractVendingMachine::MESSAGES["FULL"];
				return false;

			}

		}else{

			echo AbstractVendingMachine::MESSAGES["CLOSE_MESSAGE"];

			return false;
		}
	
	}

	/**
     *  It is used to pull products in the beverage vending machine. it controls the machine door and the occupancy status.
     *
     * @return Beverage()
    */
	public function pullDrink()
	{
		// Is the beverage vending machine door open or closed?

		if($this->isOpen){

			// Is the beverage vending machine empty?

			if(!$this->isVendingMachineEmpty()){

				$this->setItemCount($this->getItemCount()-1);

				return Beverage::getBeverage();
				
			}else{
				echo AbstractVendingMachine::MESSAGES["EMPTY"];
				return false;
			}

		}else{
			echo AbstractVendingMachine::MESSAGES["CLOSE_MESSAGE"];
			return false;
		}
	}

}

?>