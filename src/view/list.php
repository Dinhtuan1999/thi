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
<div>
    <a class="nav-link" href="index.php?page=add">Thêm sanpham</a>
</div>
<form  action="index.php?page=search" class="form-inline my-2 my-lg-0" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="search" aria-label="search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Loai</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($stores as $key => $store): ?>
    <tr>
        <td> <?php echo ++$key ?></td>
        <td> <?php echo $store['Tenhang'] ?></td>
        <td> <?php echo $store['LoaiHang'] ?></td>
        <td><a href="index.php?page=delete&id=<?php echo $store['Mahang'] ?>">
            <button type="submit" >Delete</button></a>
        </td>
        <td><div>
                <a href="index.php?page=update&id=<?php echo $store['Mahang'] ?>">
                    <button type="button" class="btn btn-outline-light">Update</button>
                </a>
            </div></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
