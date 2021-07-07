<?php
    include('partials/navBar.php');
?>
<?php
    //check whether id is set or not
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        //create sql query to get alll other details
        $sql="SELECT * FROM tbl_users WHERE id=$id";
        
        //execute the query
        $res=mysqli_query($conn,$sql);
        
        $count = mysqli_num_rows($res);
        if($count==1){
            //get the data
            $rows=mysqli_fetch_assoc($res);
            $name = $rows['name'];
            $email = $rows['email'];
            $balance = $rows['balance'];
            $password = $rows['password'];
        }
    }
?>

<section class="check_password" id="check_password">
    <h1 class="heading">Enter <span>password</span></h1>
    <p class = "session_msg">
            <?php
            if (isset($_SESSION['check_password'])){   //add session message
                echo $_SESSION['check_password'];      //display session message
                unset($_SESSION['check_password']);    //removing the session
            }
            ?>   
        </p>
    <div class="check_password-row">
        <form action="" id="passwordForm" method="POST" enctype="multipart/form-data">
            <input type="text" class="box" name="password" placeholder="Password" id="password" required>
            <button type="submit" class="btn submit" name="submit">Login <i class="fas fa-lock-open"></i></button>
        </form>
    </div>
</section>

<!-- Check if password is correct -->
<?php
    if(isset($_POST['submit'])){
        $entered_password = $_POST['password'];
        if($entered_password == $password){
            echo("<script>location.href = '".SITEURL."user_details.php?id=$id&pwd=true';</script>");
        }else{
            ?>
            <script>
            alert("Wrong password! Please enter correct password and try again.");
            </script>
            <?php
        }
    }
?>

<?php
    include('partials/footer.php')
?>
