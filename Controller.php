<?php

function __autoload($className)
{
    include_once('models/'.$className.'.php');
}

$users = new User('localhost', 'root', '111111', 'test');
if (!isset($_POST['action'])) {
    print json_encode(0);
    return;
}

switch ($_POST['action']) {
    case 'get_users':
        print $users->getUsers();
        break;
}

exit();
