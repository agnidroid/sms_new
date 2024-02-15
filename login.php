<?php
session_start();
 if(isset($_SESSION['uid'])) {
    header("location:admin\admindashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        *{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        body{
            font-size: 29px;
        }
        input{
            font-size: 26px !important;
            color: #898b8c !important;
        }
        input[type='submit']{
            margin-top: 30px;
            color: white !important;
        }
        #main{
            width: calc(100% - 35%);
            height: 90vh;
            background: ;
            flex-direction: column;
            align-items: center;
        }
        form{
            width: 100%;
            height: 90%;
            background: ;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            flex: 3;
        }
        h1{
            font-size: 75px !important;
        }
        @media screen and (max-width: 900px){
            #main{
                width: calc(100% - 20%);
                height: 90vh;
                background: ;
                flex-direction: column;
                align-items: center;
            }
        }
        @media screen and (max-width: 700px){
            h1{
                font-size: 60px !important;
                margin-top: 50px !important;
            }
            #main{
                width: calc(100% - 5%);
            }
        }
        @media screen and (max-width: 600px){
            h1{
                font-size: 50px !important;
                margin-top: 50px !important;
            }
            #main{
                width: calc(100% - 5%);
            }
        }
        @media screen and (max-width: 400px){
            h1{
                font-size: 40px !important;
            }
            #main{
                width: 100%;
                height: 95vh;
            }
            body{
                font-size: 25px !important;
            }
            input{
                font-size: 22px !important;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 m-0" align='center'>
        <div class='pb-2 position-absolute' style='text-align: left; width: fit-content; top: 17px;left: 10px;'>
            <a href="index.php" class='btn btn-secondary fa fa-arrow-left'></a>
        </div>
    </div>
    <div id='main' class='d-flex m-auto'>
        <div class='text-center'>
            <h1 class='pt-3 display-4'>ADMIN LOGIN</h1>
        </div>
    
        <form action="login.php" class='border p-4' method="post" onsubmit='return formSubmited()'>
            <div id="output"></div>

            <div class='mt-3 form-group'>
                <label class='d-block' for="username" >Username : </label>
                <input class='w-100 form-control' type="text" name="username" id='username' autocomplete="false">
            </div>
            <div class='mt-3 form-group'>
                <label class='d-block' for="password">Password : </label>
                <input class='w-100 form-control' type="password" name="password" id='password'>
            </div>

            <div class='mt-3 form-group'>
                <input class='w-100 form-control btn btn-primary' type="submit" value="submit" name='submit'>
            </div>
        </form>
    </div>

                <script>   
                const output = document.querySelector('#output')
                const password = document.querySelector('#password')
                const username = document.querySelector('#username')

                function formSubmited(el){
                    if(password.value.trim() == '' || username.value.trim() == ''){
                        output.innerHTML = `<div class='text-center bg-danger p-2 text-light w-100'>Invalid Input !</div>`
                        return false
                    }
                    else{
                        return true
                    }
                }

              </script>

    <?php
     include('dbcon.php');
       
     if(isset($_POST['submit'])){

        $username=$_POST["username"];
        $password=$_POST["password"];
           
        $sql="select * from admin where username='$username' and password='$password'";
        $res=mysqli_query($conn,$sql);
          if(mysqli_num_rows($res)<1){
              
            
            ?>

            <script>
                alert("Invalid Username Or Password!");
            </script>
            <?php
         /*   $x=mysqli_fetch_assoc($res);
             if($password===$x["password"]){
                   
                header("Location:admin\admindashboard.php");
             }
*/
          }

          else{
              $x=mysqli_fetch_assoc($res);

             
              $_SESSION['uid']=$x['id'];
              header("Location:admin\admindashboard.php");
          //  $y=$x['id'];
           // echo "id=". $x['id'];
          /*  if($password===$x["password"]){
                  
               header("Location:admin\admindashboard.php");
            }*/
          }
     }
     ?>
</body>
</html>
     
     

