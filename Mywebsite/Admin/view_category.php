<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body style='background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
'>
<a href="../index.php" class="btn btn-primary">Home</a>
    <div class="container" >
        <div class="row">
        <a href="add_category.php" class="btn btn-success">Add category</a href="add.php"> 
            <table class="table">
                <tr>
                    <th>STT</th>
                    <th>Name of category</th>
                   
                    
                    <th colspan="3" class="text-center">Action</th>
                  </tr>
                  <?php
                    // Create connection
                    $conn = new mysqli("localhost", "root", "", "mydatabase");
                    $result = $conn->query("SELECT * FROM category");
                    $num=0;
                    while ($row = $result->fetch_array()) {
                        $num++;
                        echo "<tr>";
                        $catID = $row["CategoryID"];
                        $catName = $row["CategoryName"];
                        echo "<td>$num</td>
                        <td>$catName</td>
                         <td><a href='editcat.php?id={$catID}' class='btn btn-primary'>Edit</td>
                         <td><a href='deletecat.php?id={$catID}'
                          class='btn btn-danger'>Delete</td>
                          </td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>