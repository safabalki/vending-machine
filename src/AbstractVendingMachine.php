<?php 
	
abstract class AbstractVendingMachine
{
	/**
	* About vending machine messages
	*
	* @var array
	*/
	const MESSAGES = ["OPEN_MESSAGE"   => "The Vending machine door is open.", 
			  "CLOSE_MESSAGE"  => "The Vending machine door is close.",
			  "EMPTY"     	   => "The Vending machine is empty.", 
			  "FULL"  	   => "The Vending machine is full.", 
			  "HALF_FULL" 	   => "The Vending machine is half full."];

	/**
	* About vending machine statutes
	*
	* @var array
	*/
	const STATUSES = ["EMPTY"	=> 0, 
			  "FULL"	=> 1, 
			  "HALF_FULL" 	=> 2];

	/**
	* The status codes
	*
	* @var int
	*/
	protected $status = self::STATUSES["EMPTY"];

	/**
	* The vending machine door status.
	*
	* @var boolean
	*/
	protected $isOpen = false;

	/**
	* Number of item on each vending machine row
	*
	* @var int
	*/
	protected $itemCountPerRow;

	/**
	* The row count.
	*
	* @var int
	*/
	protected $rowCount;

	/**
	* Number of item on the row.
	*
	* @var int
	*/
	private $itemCount;

	public function getItemCount()
	{
		return $this->itemCount;
	}

	protected function setItemCount($itemCount)
	{
		$this->itemCount = $itemCount;
	}

	/**
	* Open the door vending machine
	*
	* @return boolean
	*/
	public function openDoor()
	{
		$this->isOpen = true;
		return $this->isOpen;
	}

	/**
	* Close the door vending machine
	*
	* @return boolean
	*/
	public function closeDoor()
	{
		$this->isOpen = false;
		return $this->isOpen;
	}
}
?>
