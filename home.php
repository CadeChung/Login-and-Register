<?php
    session_start();
    include "./db_conn.php";
    if (isset($_SESSION['username']) && isset($_SESSION['id'])) 
        { ?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" 
          crossorigin="anonymous">
    
</head>

<body>
    <div class="containet d-flex justify-content-center 
        align-items-center"
        style="min-height: 100vh">
        <?php if ($_SESSION['role'] == 'admin') {?>
                <!-- For Admin -->
                <div class="card" 
                     style="width: 18rem;">
                    <img src="img/admin-default.png" 
                         class="card-img-top" 
                         alt="admin image">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <?=$_SESSION['name']?>
                        </h5>
                        <a href= "logout.php" class="btn btn-dark">
                        Logout</a>
                    </div>
                </div>
            <div class = "p-3">
                <?php include 'php/members.php'; 
                    if (mysqli_num_rows($res) > 0) {?>
                    
                <h1 class = "display-4 fs-1">Members</h1>
                <table class="table"
                       style = "width: 32rem;">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User name</th>
                    <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i =1;
                        while($rows = mysqli_fetch_assoc($res)) {?>                  
                    <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$rows['name']?></td>
                    <td><?=$rows['username']?></td>
                    <td><?=$rows['role']?></td>
                    </tr>
                    <?php $i++; }?>
                </tbody>
                </table>
                <?php }?>
            </div>
        <?php } else {?>
            <!-- FORM USER -->
            <div class="card" 
                     style="width: 18rem;">
                    <img src="img/user-default.png" 
                         class="card-img-top" 
                         alt="user image">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <?=$_SESSION['name']?>
                        </h5>
                        <a href= "logout.php" class="btn btn-dark">
                        Logout</a>
                    </div>
                </div>
        <?php } ?>
    </div>
</body>

</html>
<?php } else {
    header("Location: index.php");
}?>