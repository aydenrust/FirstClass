<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Thames Valley Ordering</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="home.css" rel="stylesheet" />
  <script src="order.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <a href="index.php">Logout</a>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col align-self-end">
        <img class="float-right" src="http://firstclassplanners.ca/thamesvalley/images/thameslogo.png">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1 style="color: cornflowerblue;">
          Welcome
          <?php
          if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
          }
          if ($_POST['email'] != '') {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["school"] = $_POST["school"];
          }
          //if (!isset($_SESSION['email'])) {
          //echo $_SESSION['name'];
          // }
          ?>
        </h1>
        <h2><?php echo $_SESSION["school"] ?></h2>
        <h3>
          <?php
          $servername = "localhost";
          $username = "firstcn1_admin";
          $password = "P@ssw0rd";
          $dbname = "firstcn1_SchoolList";
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          $school = $_SESSION['school'];
          $sql = "SELECT * FROM thamesvalley where School_name = '$school'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo $row['Address'] . "<br>" . $row['City'] . ", " . $row['Postal Code'] . "<br>" . $_SESSION["email"] . "<br>" . $row['Phone'];
          $_SESSION['Address'] = $row['Address'] . ", " . $row['City'] . ", " . $row['Postal Code'];
          $_SESSION['phone'] = $row['Phone'];
          ?>
        </h3>
      </div>
      <div class="col" style="text-align: center;">
        <a id="kindImg" class="plannerImg" href="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_KG_WEEK.png" data-fancybox="kindGal" data-caption="">
          <img class="shadow" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_KG_WEEK.png" alt="" style="width:100%">
        </a>
        <!-- <a id="kindImg" class="plannerImg" href="https://www.firstclassplanners.ca/peelportal/images/examples/kindMonth.jpg" data-fancybox="kindGal" data-caption=""></a> -->

        <a id="primaryImg" class="plannerImg" href="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_PRI_WEEK.png" data-fancybox="primGal" data-caption="" style="display:none">
          <img class="shadow" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_PRI_WEEK.png" alt="" style="width:100%">
        </a>
        <!-- <a id="primaryImg" class="plannerImg" href="https://www.firstclassplanners.ca/peelportal/images/examples/primMonth.jpg" data-fancybox="primGal" data-caption="" style="display:none"></a> -->

        <a id="juniorImg" class="plannerImg" href="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_ELEM_WEEK.png" data-fancybox="elemGal" data-caption="" style="display:none">
          <img class="shadow" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_ELEM_WEEK.png" alt="" style="width:100%">
        </a>
        <!-- <a id="juniorImg" class="plannerImg" href="https://www.firstclassplanners.ca/peelportal/images/examples/elemMonth.jpg" data-fancybox="elemGal" data-caption="" style="display:none"></a> -->

        <a id="intImg" class="plannerImg" href="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_MIDDLE_WEEK.png" data-fancybox="intGal" data-caption="" style="display:none">
          <img class="shadow" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_MIDDLE_WEEK.png" alt="" style="width:100%">
        </a>
        <!-- <a id="intImg" class="plannerImg" href="https://www.firstclassplanners.ca/peelportal/images/examples/intMonth.jpg" data-fancybox="intGal" data-caption="" style="display:none"></a> -->

        <a id="highImg" class="plannerImg" href="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_HIGH_WEEK.png" data-fancybox="highGal" data-caption="" style="display:none">
          <img class="shadow" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/FC_PLANNER_HIGH_WEEK.png" alt="" style="width:100%">
        </a>
        <!-- <a id="highImg" class="plannerImg" href="https://www.firstclassplanners.ca/peelportal/images/examples/highMonth.jpg" data-fancybox="highGal" data-caption="" style="display:none"></a> -->
        <div id="enlarge">Click to enlarge</div>
      </div>

    </div>
  </div>
  <div class="container">
    <form action="cart.php" method="post">
      <!-- <div class="form-group">
                    <label for="size">Select School</label>
                    <select class="form-control field" id="school">
                      <option value="S1">School1</option>
                      <option value="S2">School2</option>
                      <option value="S3">School3</option>
                    </select>
                  </div> -->
      <div class="form-group">
        <label for="age">Planner Type</label>
        <select class="form-control field" id="age">
          <option value="Kindergarten" id="kind">Kindergarten</option>
          <option value="Primary" id="primary">Primary</option>
          <option value="Junior" id="junior">Junior</option>
          <option value="Intermediate" id="intermediate" class="opt">Intermediate</option>
          <option value="High" id="high" class="opt">Secondary</option>
          <!-- <option value="Teacher Planner" id="teach" class="opt">Teacher Planner</option> -->
        </select>
      </div>
      <div class="form-group">
        <label for="size">Select Size</label>
        <select class="form-control field" id="size">
          <option value="8.5x11" id="85x11" class="opt">8.5x11 - includes 8 board pages & 8 school pages</option>
          <option value="7x9" id="7x9" class="opt">7x9 - includes 8 board pages & 8 school pages</option>
          <option value="5x8" id="5x8" class="opt">5x8 - includes 16 board pages & 16 school pages</option>
          <option value="7x9" id="7x92" class="opt">7x9 - NO Board or School Pages</option>
          <option value="5x8" id="5x82" class="opt">5x8 - NO Board Pages - 32 school pages only</option>
        </select>
        <input type="hidden" value="Includes 8 board pages & 8 school pages" id="schoolboardpgs">
      </div>

      <div class="form-group">
        <label for="lang">Select Language</label>
        <select class="form-control field" id="lang">
          <option value="English" id="english" class="opt">English</option>
          <option value="French" id="french" class="opt" style="display:none">French</option>
          <option value="note" id="note" class="" disabled style="display:none">For French please Select Intermediate 7x9</option>
        </select>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" min="1" class="form-control field check" value="1" id="quantity" />
      </div>
      <div class="form-check xtra">
        <input class="form-check-input check checkBox" type="checkbox" value="0.25" id="ruler" checked />
        <label class="form-check-label" for="ruler">
          Snap in Ruler - $0.25
        </label>
      </div>
      <div class="form-check xtra">
        <input class="form-check-input check checkBox" type="checkbox" value="0.65" id="pocket" checked />
        <label class="form-check-label" for="pocket">
          Plastic Pocket - $0.65
        </label>
      </div>
      <div class="form-check xtra sec">
        <input class="form-check-input check checkBox" type="checkbox" value="0.65" id="bully" />
        <label class="form-check-label" for="bully">
          Anti-Bully - $0.65
        </label>
      </div>
      <div class="form-check xtra sec">
        <input class="form-check-input check checkBox" type="checkbox" value="0.65" id="green" />
        <label class="form-check-label" for="green">
          Going Green - $0.65
        </label>
      </div>
      <div class="form-check xtra sec">
        <input class="form-check-input check checkBox" type="checkbox" value="0.65" id="nutrition" />
        <label class="form-check-label" for="nutrition">
          Nutrition - $0.65
        </label>
      </div>
      <!-- <div class="form-check" id="boardpgs" style="display:none">
        <input class="form-check-input checkBox" type="checkbox" value="0" id="board" />
        <label class="form-check-label" for="board">
          Board Pages
        </label>
      </div> -->
      <div class="form-group">
        <div class="form-check xtra">
          <input class="form-check-input check checkBox" type="checkbox" value="" id="xtrapgs" />
          <label class="form-check-label" for="xtrapgs">
            Additional School Pages - $0.10 for every 2 school pages added
          </label>
          <input class="form-control field pgs" type="number" id="pgsJ" step="2" min="2" value="2" onKeyDown="return false" disabled>
        </div>
        <!--<select class="form-control field pgs" id="pgsJ" disabled>
          <option value="0.40" id="8pgsJ" class="opt">8 Additional School Pages - $0.40</option>
          <option value="0.60" id="16pgsJ" class="opt">16 Additional School Pages - $0.60</option>
        </select>
        <select class="form-control field pgs" id="pgsH" style="display:none" disabled>
          <option value="0.20" id="8pgsH" class="opt">8 Additional School Pages - $0.20</option>
          <option value="0.25" id="16pgsH" class="opt">16 Additional School Pages - $0.25</option>
          <option value="0.30" id="24pgsH" class="opt">24 Additional School Pages - $0.30</option>
          <option value="0.35" id="32pgsH" class="opt">32 Additional School Pages - $0.35</option>
        </select>-->
      </div>
      <div class="form-group">
        <!-- <label for="size">Select Cover</label>
          <select class="form-control field" id="cover">
            <option value="Reach">Reach</option>
            <option value="Believe">Believe</option>
          </select> -->
        <div class="container">
          <h2>Select Cover</h2>
          Standard cover choices included in cost
          <div class="row" id="standard">
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" id="bigrad" name="cover" value="reach" class="coverSelect bubig" />
                  <img class="cover big" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Reach.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Reach</div>
              <div class="descSmall">Available in: 8.5”x 11”</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="inspire" class="coverSelect bubig" />
                  <img class="cover big" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Inspire.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Inspire</div>
              <div class="descSmall">Available in: 8.5”x 11”</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" id="medrad" name="cover" id="bigmedrad" value="courage" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Courage.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Courage</div>
              <div class="descSmall">Available in: 8.5"x 11" and 7"x 9"</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="change" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Change.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Change</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9"</div>
            </div>
            <!-- <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="discoverFrench" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="http://www.firstclassplanners.ca/peelportal/images/Explorer-New.png" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Explore French</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9" Available in French 8.5”x 11” and 7"x 9"</div>
            </div>
          </div> -->
            <div class="row">
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" id="smallrad" value="achieve" class="coverSelect bumed busmall" />
                    <img class="cover med small" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/12/Achieve_English.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Achieve</div>
                <div class="descSmall">Available in: 7”x 9” and 5"x 8" note 5"x 8" has no window</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="achievefrench" class="coverSelect bumed busmall" />
                    <img class="cover med small" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/French-Achieve.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Atteindre</div>
                <div class="descSmall">Available in: 7”x 9” and 5"x 8" note 5"x 8" has no window</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="doIt" class="coverSelect bumed busmall" />
                    <img class="cover med small" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/DoIt.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Do It</div>
                <div class="descSmall">Available in: 7”x 9” and 5"x 8" note 5"x 8" has no window</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="landscapes" class="coverSelect bubig bumed" />
                    <img class="cover big med" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Landscapes.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Landscapes</div>
                <div class="descSmall">Available in: 8.5”x 11” and 7"x 9" Available in French</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="stream" class="coverSelect bubig" />
                    <img class="cover big" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Stream.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Stream</div>
                <div class="descSmall">Available in: 8.5”x 11” Available in French</div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="activities" class="coverSelect bubig" />
                    <img class="cover big" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/08_Public-P_Activities-1.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Activities</div>
                <div class="descSmall">Available in: 8.5”x 11” Available in French</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="influence" class="coverSelect bubig bumed" />
                    <img class="cover big med" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Influence.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Influence</div>
                <div class="descSmall">Available in: 8.5”x 11” and 7"x 9"</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="influenceFrench" class="coverSelect bubig bumed" />
                    <img class="cover big med" src="http://www.firstclassplanners.ca/peelportal/images/Influencer-New.png" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Influencer</div>
                <div class="descSmall">Available in: 8.5”x 11” and 7"x 9"</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="kind" class="coverSelect bubig bumed" />
                    <img class="cover big med" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/jo3qN5eA.jpeg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Be Kind</div>
                <div class="descSmall">Available in: 8.5”x 11” and 7"x 9"</div>
              </div>
              <div class="col">
                <div class="image-container">
                  <label>
                    <input type="radio" name="cover" value="adventure" class="coverSelect bubig" />
                    <img class="cover big" src="https://www.firstclassplanners.ca/wp-content/uploads/2020/11/Adventure.jpg" />
                    <div class="bottom-right">This cover is not available in your selected size</div>
                  </label>
                </div>
                <div class="descBig">Adventure</div>
                <div class="descSmall">Available in: 8.5”x 11”</div>
              </div>
            </div>
            <div class="form-check">
              <input class="form-check-input check" type="radio" value="custom" id="customCover" name="cover" />
              <label class="form-check-label" for="customCover">
                Custom Cover - $275 per order
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">Total: $<a id="total">5.05</a></div>
        <!-- <button type="button" class="btn btn-primary" id="addToCart">
          Add to Cart
        </button> -->
        <button type="button" class="btn btn-primary" onclick="modalCheck()">
          <!--data-toggle="modal"
          data-target="#confirmModal"-->
          Add to Cart
        </button>
        <button type="submit" class="btn btn-primary">View Cart</button>
    </form>

    <div class="toast success" style="position: absolute; top:0; right: 0;">
      <div class="toast-header">
        <strong class="mr-auto">Success</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <!--Toast-->
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        Successfully Added to Cart
      </div>
    </div>

    <!-- The actual snackbar -->
    <div id="snackbar">Added to Cart!</div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              Would you like to go back and add a plastic pocket to this
              planner?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Go Back!
            </button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" onclick="showSnack()">
              Proceed to cart.
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>