<?php
    include('partials/navBar.php');
?>

<section class="contact" id="contact">
    <h1 class="contact-heading heading"><span>Contact </span>Us</h1>
    <div class="contact-row">
        <form action="" id="contact-form" method="POST" enctype="multipart/form-data">
            <input type="text" class="box" id="name" name="name" placeholder="Name" required>
            <input type="text" class="box" id="email" name="email" placeholder="Email id" required>
            <textarea name="message" cols="30" rows="10" class="box message" placeholder="Leave a message" id="message" required></textarea>
            <button type="submit" class="btn submit" name="submit">Send</button>
        </form>
    </div>
</section>

<?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // create sql query
        $sql = "INSERT INTO tbl_contact SET
        name = '$name',
        email = '$email',
        message = '$message'";

        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            ?>
            <script>
                alert("Thanks for your message! We will get back to you as soon as possible.");
                document.getElementById('contact-form').reset();
            </script>
            <?php
            echo("<script>location.href = '".SITEURL."';</script>");
        }else{
            ?>
            <script>
                alert("Something went wrong!");
            </script>
            <?php
        }
    }
?>

<?php
    include('partials/footer.php')
?>

 