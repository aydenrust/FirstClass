<?php

include "planner.php";
session_start();
?>
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
    <?php
    //echo print_r($_SESSION['cart']);
    ?>

    <div class="column-labels">
      <label class="product-image">Image</label>
      <label class="product-details">Product</label>
      <label class="product-price">Price</label>
      <label class="product-quantity">Quantity</label>
      <label class="product-removal">Remove</label>
      <label class="product-line-price">Total</label>
    </div>

    <?php

    foreach ($_SESSION['cart'] as $key => $planner) {
      switch ($planner['cover']) {
        case reach:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/ReachForTheStars.jpg";
          break;
        case journey:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/Journey.jpg";
          break;
        case believe:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/Believe.jpg";
          break;
        case discover:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/ExploreDreamDiscover.jpg";
          break;
        case achieve:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/DreamPlanAchieve.jpg";
          break;
        case geography:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/CanadianGeography.jpg";
          break;
        case stream:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/2_Stream.jpg";
          break;
        case reading:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/1_Reading.jpg";
          break;
        case activities:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/08_Public-P_Activities.jpg";
          break;
        case doIt:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/07_Public-DoIt.jpg";
          break;
        case influence:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/06_Public-P_Influence.jpg";
          break;
        case kind:
          $cover = "http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/05_Public-P_BeKind.jpg";
          break;
        case influenceFrench:
          $cover = "http://www.firstclassplanners.ca/testing/images/06_Public-P_Influence-French-Revised-01.png";
          break;
        case discoverFrench;
          $cover = "http://www.firstclassplanners.ca/testing/images/02_Explore_Dream_Discover-01.png";
          break;
        case custom:
          $cover = "http://www.firstclassplanners.ca/testing/images/customCover.png";
          break;
      }


      echo '  <div class="product">
  <input type="hidden" id="cartKey" name="cartKey" value="' . $key . '">
  <div class="product-image">
    <img src="' . $cover . '">
  </div>
  <div class="product-details">
    <div class="product-title">' . $planner['lang'] . ' ' . $planner['size'] . ' ' . $planner['age'] . '</div>
    <p class="product-description">';
      if ($planner['ruler'] == "yes") {
        echo "- Snap in Ruler - $0.25 <br>";
      }
      if ($planner['pocket'] == "yes") {
        echo "- Plastic Pocket - $0.65 <br>";
      }
      if ($planner['pgs'] == 1) {
        echo "- 8 Additional School Pages";
      } else if ($planner['pgs'] == 2) {
        echo "- 16 Additional School Pages";
      } else if ($planner['pgs'] == 3) {
        echo "- 8 Additional School Pages";
      } else if ($planner['pgs'] == 4) {
        echo "- 16 Additional School Pages";
      } else if ($planner['pgs'] == 5) {
        echo "- 24 Additional School Pages";
      } else if ($planner['pgs'] == 6) {
        echo "- 32 Additional School Pages";
      }
      echo '</p>
  </div>
  <div class="product-price">' . $planner['total'] / $planner['quantity'] . '</div>
  <div class="product-quantity">
    <input type="number" value="' . $planner['quantity'] . '" min="1">
  </div>
  <div class="product-removal">
    <button class="remove-product">
      Remove
    </button>
  </div>
  <div class="product-line-price">' . $planner['total'] . '</div>
</div>';
    }
    ?>

    <!-- <div class="product">
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
  </div> -->

    <div class="totals">
      <div class="totals-item">
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal">0.00</div>
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
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Are you sure?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              Are you sure you want to place your order?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Go Back!
            </button>
            <a href="confirmation.php"><button type="submit" class="btn btn-primary" aria-label="Close">
                Yes.
              </button></a>
          </div>
        </div>
      </div>
    </div>
      <!--<a href="confirmation.php"> -->
      <button type="button" onclick="showModal()" class="checkout">Checkout</button>
      <!--</a> -->
      <a href="order.php"><button type="button" class="btn btn-primary">Add Another Planner</button></a>
      <div>Please note: Orders over $5000 require a PO from your school.</div>
    </div>


</body>

</html>