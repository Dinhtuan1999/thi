<?php

require __DIR__ . '/vendor/autoload.php';
use App\controller\StoreController;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
//var_dump($_REQUEST);die();
$storeController = new StoreController();
//var_dump($bookController);die;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?page=list-store">danh san pham</a>

<?php
switch ($page) {
    case 'list-store' :
        $storeController->index();
        break;

    case 'delete':
        $id = $_REQUEST['id'];
        $storeController->delete($id);
        break;
    case 'add':
        $storeController->add();
        break;
    case 'update':
        $id =$_REQUEST['id'];
        $storeController->update($id);
        break;
    case 'search':
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";
        $storeController->search($search);
        break;
}
?>
</body>
</html>
