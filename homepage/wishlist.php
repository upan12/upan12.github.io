<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="style-home.css">

</head>

<body>

    <section id="header">

    <a href="homepage.php"><img src="../img/logo/logo.png" class="logo" alt=""></a>
        <div id="navbar" class="searchbar">
            <input type="text" name="box" placeholder="Search..">
        </div>

        <div>
            <ul id="navbar">
                <li><a class="active" href="wishlist.php">Wishlist</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href=""><i class="fa-solid fa-ellipsis-vertical"></i></a></li>
            </ul>
        </div>

        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>

    </section>

    <section id="page-header">

        <h2>#COVID2020</h2>
        <p>Save more with coupons & up to 30% off! </p>

    </section>

    <section id="wishlist" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                    <td>Checkout</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#"></a><i class="fa-solid fa-trash"></i></td>
                    <td><img src="../img/produk/1.jpg" alt=""></td>
                    <td>Brodo Hi Struggle Popomangun Black</td>
                    <td>Rp. 475.000</td>
                    <td><input type="number" value="1"></td>
                    <td>Rp. 475.000</td>
                    <td><button class="normal">Checkout</button></td>
                </tr>
                <tr>
                    <td><a href="#"></a><i class="fa-solid fa-trash"></i></td>
                    <td><img src="../img/produk/2.jpg" alt=""></td>
                    <td>Brodo Signature Black</td>
                    <td>Rp. 399.000</td>
                    <td><input type="number" value="1"></td>
                    <td>Rp. 399.000</td>
                    <td><button class="normal">Checkout</button></td>
                </tr>
                <tr>
                    <td><a href="#"></a><i class="fa-solid fa-trash"></i></td>
                    <td><img src="../img/produk/3.jpg" alt=""></td>
                    <td>Brodo Vulcan Classic Low Black</td>
                    <td>Rp. 279.000</td>
                    <td><input type="number" value="1"></td>
                    <td>Rp. 279.000</td>
                    <td><button class="normal">Checkout</button></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="wishlist-add" class="section-p1">
        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>Rp. 1.153.000</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Rp. 1.153.000</strong></td>
                </tr>
            </table>
            <button class="normal">Checkout</button>
        </div>
    </section>

    <script src="scripts.js"></script>
</body>
</html>