<?php
    include('partials/navBar.php');
?>

<section class="transfer-money" id="transfer-money">
        <h1 class="transfer-money-heading heading">Create new <span>User</span></h1>
        <p>
            <span>
            <?php
            if (isset($_SESSION['add_user'])){   //add session message
                echo $_SESSION['add_user'];      //display session message
                unset($_SESSION['add_user']);    //removing the session
            }
            ?>
            </span>
        </p>
        <div class="transfer-money-row">
            <form action="" id="transfer-money-form" method="POST" enctype="multipart/form-data">
                <input type="text" class="box" id="full_name" name="full_name" placeholder="Enter your full name" required>
                <input type="text" class="box" id="email" name="email" placeholder="Enter your email id" required>
                <input type="password" class="box" id="password" name="password" placeholder="Create a password" required>
                <input type="number" class="box" name="amount" placeholder="Enter amount" id="amt" required>
                <button type="submit" class="btn submit" name="submit">Create new user <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </section>
<?php
    if(isset($_POST['submit'])){

        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO tbl_users SET
        name = '$full_name',
        email = '$email',
        password = '$password',
        balance = '$amount'";

        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            $_SESSION['add_user'] = "User added successfully!!";
            echo("<script>location.href = '".SITEURL."users.php';</script>");
        }else{
            $_SESSION['add_user'] = "Something went wrong!";
            echo("<script>location.href = '".SITEURL."new_user.php';</script>");
        }
    }
?>

<?php
    include('partials/footer.php')
?>

 