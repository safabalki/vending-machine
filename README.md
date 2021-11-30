# About

This app is designed to take or put items from the beverage vending machine. Some items to consider when putting and taking.

* When taking or putting products from the beverage vending machine, the open status of the beverage vending machine door should be checked.

* The occupancy of the beverage vending machine should be checked while putting the product in the beverage vending machine.

# Installation

Clone project.

```bash
git clone https://github.com/safabalki/vending-machine.git
```

Open the project directory.
```bash
cd vending-machine
```
Install dependencies:

```bash
composer install
```

# Usage

To use the bindings, use Composer's autoload:

```bash
require_once('./vendor/autoload.php');
```

```php
$beverageVendingMachine = new beverageVendingMachine();
$beverageVendingMachine->openDoor();
$beverageVendingMachine->pushItem();
$beverageVendingMachine->closeDoor();

$beverageVendingMachine->openDoor();
$beverageVendingMachine->pullItem();
$beverageVendingMachine->closeDoor();
```
# Testing

Install dependencies as mentioned above (which will resolve [PHPUnit](https://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:
```bash
./vendor/bin/phpunit tests
```
