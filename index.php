<?php
    // Include config file
    require_once "config.php";
                        
    // Attempt select query execution
    $sql = "SELECT id, department, username, email, password FROM users";
    $result = mysqli_query($link, $sql);
?>

<!doctype html>
<html>
<head>
    <title>Credbase: View your credentials here!</title>
    <meta charset="UTF-8"/>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lusitana&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">View credentials</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="add.php">Add Client</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <div class="container">
        <h1>Credbase</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Department</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php 
                    // LOOP TILL END OF DATA
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    <td><?php echo $row['department'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <input style="display:none;" id="myInput<?php echo $row['id']?>" value="<?php echo $row['password'];?>"/>
                    <td><button onclick="myFunction('myInput<?php echo $row['id']?>')">Copy text</button></td>
                    <td><a href="edit.php?id=<?php echo $row['id'];?>" class="mr-3 btn btn-primary" title="Update Record" data-toggle="tooltip">Update User</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id'];?>" class="mr-3 btn btn-danger" title="Delete Record" data-toggle="tooltip">Delete User</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
