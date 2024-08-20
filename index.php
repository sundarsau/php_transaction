<?php
$succ_msg = $error_msg = "";
//
// connect to MySQL database
//
$conn = new mysqli("localhost","root","","test");
if ($conn->connect_error)
    die ("Database connection failed ".$conn->connect_error);

if (isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $basic = $_POST['basic'];
    $allowance = $_POST['allowance'];

    $conn->begin_transaction();
    try{
        // insert into employees table
        $sql = "insert into employees(name, email, phone)  values (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$name, $email, $phone);
        $stmt->execute();

         // Now insert into emp_salaries table
        $emp_id = $conn->insert_id;
        $sql = "insert into emp_salaries(emp_id,basic,allowance)  values (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii",$emp_id,$basic,$allowance);
        $stmt->execute();
        $conn->commit();
        $succ_msg = "Employee Added";
    }
    catch(Exception $error){
        $conn->rollback();
        $err_msg = $error->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL Commit and Rollback in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cotainer">
        <h1>Commit and Rollback in PHP</h1>
        <?php if (!empty($succ_msg)){ ?>
           <div class="alert alert-success"><?= $succ_msg?></div>
            <?php } 
          if (!empty($err_msg)){ ?>
           <div class="alert alert-danger"><?= $err_msg?></div>
           <?php } ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label  fw-bold">Employee Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required />
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label fw-bold">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" required />
            </div>
            <div class="mb-3">
                <label for="basic" class="form-label fw-bold">Basic</label>
                <input type="number" class="form-control" name="basic" id="basic" placeholder="Enter Basic Salary" required />
            </div>
            <div class="mb-3">
                <label for="allowance" class="form-label fw-bold">Allowance</label>
                <input type="number" class="form-control" name="allowance" id="allowance" placeholder="Enter Allownace" required />
            </div>
            
            <button
                type="submit"
                class="btn btn-primary" name="submit">
                Submit
            </button>
        </form>
    </div>
</body>
</html>
