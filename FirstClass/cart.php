<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="home.css" rel="stylesheet">
	<script src="cart.js"></script>
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</head>
<body>
		<h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/ReachForTheStars.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">English 8.5x11 Intermediate</div>
      <p class="product-description">W/ Snap in Ruler and 8 additional school Pages</p>
    </div>
    <div class="product-price">4.59</div>
    <div class="product-quantity">
      <input type="number" value="50" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">229.50</div>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/Believe.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">English 5x8 High</div>
      <p class="product-description">W/ Plastic Pocket</p>
    </div>
    <div class="product-price">4.54</div>
    <div class="product-quantity">
      <input type="number" value="10" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">45.40</div>
  </div>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">274.90</div>
    </div>
    <!--<div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div> -->
      
      <button class="checkout">Checkout</button>
              <a href="order.html"><button type="button" class="btn btn-primary">Add Another Planner</button></a>

</div>
</body>
</html>