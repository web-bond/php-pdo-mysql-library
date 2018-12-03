PHP PDO MySQL Library
============
PHP PDO MySQL Library is a db library from CMS Opencart

Initialize
------------
```php
<?php
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pdo_test');
require_once(dirname(__FILE__).'/src/pdo.php');
$db = new mPDO(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>
```

Methods of library
-----------
```php
$db->query($sql) // Execute the specified sql statement. Returns row data and rowcount.
$db->escape($value) // Escape/clean data before entering it into database
$db->countAffected($sql) // Returns count of affected rows from most recent query execution
$db->getLastId($sql) // Returns last auto-increment id from more recent query execution 
```

Usage
------------

#### table "customer"

| id | name | email
|:-----------:|:------------:|:------------:|
| 1       |      Peter  |   peter@gmail.com  
| 2       |      John |     john@gmail.com
| 3       |   Jennifer|     jennifer@gmail.com 

Code:
```php
<?php
$customer = $db->query("SELECT * FROM customer");
var_dump($customer);
?>
```

Result:
```php
object(stdClass)#4 (3) {
  ["row"]=>
  array(3) {
    ["id"]=>
    string(1) "1"
    ["name"]=>
    string(5) "Peter"
    ["email"]=>
    string(15) "peter@gmail.com"
  }
  ["rows"]=>
  array(3) {
    [0]=>
    array(3) {
      ["id"]=>
      string(1) "1"
      ["name"]=>
      string(5) "Peter"
      ["email"]=>
      string(15) "peter@gmail.com"
    }
    [1]=>
    array(3) {
      ["id"]=>
      string(1) "2"
      ["name"]=>
      string(4) "John"
      ["email"]=>
      string(14) "john@gmail.com"
    }
    [2]=>
    array(3) {
      ["id"]=>
      string(1) "3"
      ["name"]=>
      string(8) "Jennifer"
      ["email"]=>
      string(18) "jennifer@gmail.com"
    }
  }
  ["num_rows"]=>
  int(3)
}
```

#### For example
```php
$query = $db->query("SELECT * FROM `customer` WHERE `name` LIKE 'John'");
if ($query->rows) {
    var_dump($query->row['email']); // string(14) "john@gmail.com"
}
```
```php
$db->query("UPDATE `customer` SET `email` = 'john-new-email@gmail.com' WHERE `id` = '2'");
```

