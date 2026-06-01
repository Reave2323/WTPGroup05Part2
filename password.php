<?php
$passwords = ['ChildLabour', 'TreesDie', 'KillLife'];
foreach ($passwords as $p) {
    echo $p . ': ' . password_hash($p, PASSWORD_BCRYPT, ['cost' => 12]) . PHP_EOL;
}