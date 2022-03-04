<!DOCTYPE html>

<html>
    <head>
        <title>
            regitration form
        </title>
        <style>
            body{
                background-color:indigo;
                display:flex;
                justify-content:center;
                align-items:center;
                height: 100vh;
                color:greenyellow
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
        <form method="POST" action="db5.php">
            <h2>Fill the required detail to register in this site.</h2>
           
            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="*****" required>

            <label>Email</label>
            <input type="text" name="email" placeholder="anyoone@gmail.com" required>

            <label>CellPhone</label>
            <input type="text" name="CellPhone" placeholder="CellPhone" required>
           
            <button type="submit" value="submit" name="submit">Register</button>
        </form>
        
    </body>
</html>