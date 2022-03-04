<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            heading
        </title>
        <style>
            body{
                background-color:indigo;
                height: 30vh;
              
            }
           
          
            h2{
            
                margin-bottom: 40px;
            }
            body{
                background-color:indigo;
                display:flex;
                justify-content:center;
                align-items:center;
                height: 100vh;
            }
            *{
                font-family:sans-serif;
                box-sizing:border-box;
            }
            form{
                width:500px;
                border: 2px solid #ccc;
                padding: 30px;
                background: #fff;
                border-radius: 15px;
            }
            h2{
                text-align:center;
                margin-bottom: 40px;
            }
            input{
                display: block;
                border:2px solid #ccc;
                width: 95%;
                padding: 10px;
                margin: 10px auto;
                border-radius: 5px;
            }
            label{
                color: #888;
                font-size: 18px;
                padding: 10px;
            }
            button{
                float: right;
                background: #555;
                padding: 10px 15px;
                color: #fff;
                border-radius: 5px;
                margin-right: 10px;
                border: none;
            }
            button:hover{
                opacity: .7;

            }
            .error{
                background: #F2DEDE;
                color: #A94442;
                padding: 10px;
                width: 95%;
                border-radius: 5px;
                margin: 20px auto;

            }

        </style>
    </head>
    <body>
        <div align="left">
        <h1>HARDWARE SHOPING SYSTEM</h1>
        <h2>Welcome.....!!!!!!</h2>
        <u><p>ABOUT</p></u>
        <p>Hardware shoping system,<br>involve the online purchase of <br>computer hardware products/devices
        .<br>These products are such as computers,scanners,<br>printers,mouses,RAMs,CD-ROMs e.t.c</p>
        <u><p>WHAT DONE</p></u>
        <ol>Customer
        <li>Customer can register and login into the system</li>
        <li>Customer can view product and<br>Can make purchase by placing his/ her order</li></ol>
        <ol>Saler
        <li>Checking orders placed by customer daily</li>
        <li>Record all purchase made through the system</li>
        <li>Making communication with customer to provide <br>feedback on the purchase made and how to get the product</li></ol>
         
               <center><p>          
             For More Information:
             +255 763 901 262,
             +255 621 698 480</p>
                 <p>
                    copyright@2020,  
                 family.company.tz</p>
                </center>

        </div>
        
        <div align="right">
        <form method="post" action="db5.php">
            <h2>Login credential</h2>
            <?php if (isset($_GET['error'])){?>
              <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="*****" required>

            <button type="submit" value="login" name="login">Login</button><br><br><br><br>
            <p>You don't have registered?<button type="signup"> <a href="register.php">Sign Up</a></button></p>
        </form>
    </div>
       
    </body>
    
</html>