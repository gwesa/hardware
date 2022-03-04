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
        <form method="POST" action="Adminpro.php">
            <h2>Add Your Products Here</h2>
           
            <label>Product Cart</label>
            <input type="text" name="product_cart" placeholder="Product Cart" required>

            <label>Product Brand</label>
            <input type="text" name="product_brand" placeholder="Product Brand" required>

            <label>Product Title</label>
            <input type="text" name="product_title" placeholder="Product Title" required>

            <label>Product Price</label>
            Tshs.<input type="text" name="product_price" placeholder="Product Price" required>

            <label>Product Description</label>
            <input type="text" name="product_desc" placeholder="Product Description" required>

            <label>Product Image</label>
            <label for="myfile">Select an image:</label>
            <input type="file" id="myfile" name="myfile" required>

            <label>Product Keywords</label>
            <input type="text" name="product_keywords" placeholder="Product Keywords" required>

           
            <button type="submit" value="submit" name="submit">ADD SUBMISSION</button>
        </form>
        
    </body>
</html>