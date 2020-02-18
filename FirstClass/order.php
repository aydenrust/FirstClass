<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
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
  <a href="index.php">Logout</a>
  <div class="container">
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
            echo $_SESSION['name'];
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
          $sql = "SELECT * FROM Schools where School_name = '$school'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo $row['Address'] . "<br>" . $row['City'] . ", " . $row['Province'] . ", " . $row['Postal Code'] . "<br>" . $_SESSION["email"];
          $_SESSION['Address'] = $row['Address'] . ", " . $row['City'] . ", " . $row['Province'] . ", " . $row['Postal Code'];
          ?>
        </h3>
      </div>
      <div class="col" style="text-align: center;">
        <a id="kindImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/kindWeek.jpg" data-fancybox="kindGal" data-caption="">
          <img class="shadow" src="http://www.firstclassplanners.ca/sg_kindergarten-planners_content/planners/bigbox/1_FIRST_KG_WEEK.jpg" alt="" style="width:100%">
        </a>
        <a id="kindImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/kindMonth.jpg" data-fancybox="kindGal" data-caption=""></a>

        <a id="primaryImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/primWeek.jpg" data-fancybox="primGal" data-caption="" style="display:none">
          <img class="shadow" src="http://www.firstclassplanners.ca/sg_primary-planners_content/planners/bigbox/2_-FIRST_PRI_WEEK.jpg" alt="" style="width:100%">
        </a>
        <a id="primaryImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/primMonth.jpg" data-fancybox="primGal" data-caption="" style="display:none"></a>

        <a id="juniorImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/elemWeek.jpg" data-fancybox="elemGal" data-caption="" style="display:none">
          <img class="shadow" src="http://www.firstclassplanners.ca/sg_elementary-planners_content/planners/bigbox/3_-FIRST_ELEM_WEEK.jpg" alt="" style="width:100%">
        </a>
        <a id="juniorImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/elemMonth.jpg" data-fancybox="elemGal" data-caption="" style="display:none"></a>

        <a id="intImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/intWeek.jpg" data-fancybox="intGal" data-caption="" style="display:none">
          <img class="shadow" src="http://www.firstclassplanners.ca/sg_middle-planners_content/planners/bigbox/4_-FIRST_MID_WEEK.jpg" alt="" style="width:100%">
        </a>
        <a id="intImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/intMonth.jpg" data-fancybox="intGal" data-caption="" style="display:none"></a>

        <a id="highImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/highWeek.jpg" data-fancybox="highGal" data-caption="" style="display:none">
          <img class="shadow" src="http://www.firstclassplanners.ca/sg_high-planners_content/planners/bigbox/5_-FIRST_HIGH_WEEK.jpg" alt="" style="width:100%">
        </a>
        <a id="highImg" class="plannerImg" href="http://www.firstclassplanners.ca/testing/images/examples/highMonth.jpg" data-fancybox="highGal" data-caption="" style="display:none"></a>
        Click to enlarge
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
          <option value="High" id="high" class="opt">High</option>
          <option value="Parent Teacher Handbook" id="hand" class="opt">Parent Teacher Handbook</option>
        </select>
      </div>
      <div class="form-group">
        <label for="size">Select Size</label>
        <select class="form-control field" id="size">
          <option value="8.5x11" id="85x11" class="opt">8.5x11 - includes 16 board pages & 8 school pages</option>
          <option value="7x9" id="7x9" class="opt">7x9 - includes 16 board pages & 8 school pages</option>
          <option value="5x8" id="5x8" class="opt">5x8 - includes 32 pages of board & school specific pages combined</option>
          <option value="7x9" id="7x92" class="opt">7x9 - NO Board Pages - includes 24 school pages</option>
          <option value="5x8" id="5x82" class="opt">5x8 - NO Board Pages - includes 32 school pages</option>
        </select>
      </div>

      <div class="form-group">
        <label for="lang">Select Language</label>
        <select class="form-control field" id="lang">
          <option value="English" id="english" class="opt">English</option>
          <option value="French" id="french" class="opt" style="display:none">French</option>
        </select>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" min="1" class="form-control field check" value="1" id="quantity" />
      </div>
      <div class="form-check">
        <input class="form-check-input check checkBox" type="checkbox" value="0.25" id="ruler" checked/>
        <label class="form-check-label" for="ruler">
          Snap in Ruler - $0.25
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input check checkBox" type="checkbox" value="0.65" id="pocket" checked/>
        <label class="form-check-label" for="pocket">
          Plastic Pocket - $0.65
        </label>
      </div>
      <div class="form-check" id="boardpgs" style="display:none">
        <input class="form-check-input checkBox" type="checkbox" value="0" id="board" />
        <label class="form-check-label" for="board">
          Board Pages
        </label>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input check checkBox" type="checkbox" value="" id="xtrapgs" />
          <label class="form-check-label" for="xtrapgs">
            Additional School Pages
          </label>
        </div>
        <select class="form-control field pgs" id="pgsJ" disabled>
          <option value="0.40" id="8pgsJ" class="opt">8 Additional School Pages - $0.40</option>
          <option value="0.60" id="16pgsJ" class="opt">16 Additional School Pages - $0.60</option>
        </select>
        <select class="form-control field pgs" id="pgsH" style="display:none" disabled>
          <option value="0.20" id="8pgsH" class="opt">8 Additional School Pages - $0.20</option>
          <option value="0.25" id="16pgsH" class="opt">16 Additional School Pages - $0.25</option>
          <option value="0.30" id="24pgsH" class="opt">24 Additional School Pages - $0.30</option>
          <option value="0.35" id="32pgsH" class="opt">32 Additional School Pages - $0.35</option>
        </select>
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
          <div class="row">
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="reach" class="coverSelect bubig" />
                  <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/ReachForTheStars.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Reach</div>
              <div class="descSmall">Available in: 8.5”x 11”</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="journey" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/Journey.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Journey</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9"</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="believe" class="coverSelect bumed busmall" />
                  <img class="cover med small" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/Believe.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Believe</div>
              <div class="descSmall">Available in: 7"x 9" and 5"x 8" Note: 5"x 8" has no window</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="discover" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/ExploreDreamDiscover.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Explore</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9" Available in French 8.5”x 11” and 7"x 9"</div>
            </div>
            <div class="col">
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
          </div>
          <div class="row">
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="achieve" class="coverSelect bumed busmall" />
                  <img class="cover med small" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/DreamPlanAchieve.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Dream</div>
              <div class="descSmall">Available in: 7”x 9” and 5"x 8" note 5"x 8" has no window</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="doIt" class="coverSelect bumed busmall" />
                  <img class="cover med small" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/07_Public-DoIt.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Do It</div>
              <div class="descSmall">Available in: 7”x 9” and 5"x 8" note 5"x 8" has no window</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="geography" class="coverSelect bubig" />
                  <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/CanadianGeography.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Geography</div>
              <div class="descSmall">Available in: 8.5”x 11” Available in French</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="stream" class="coverSelect bubig" />
                  <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/2_Stream.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Stream</div>
              <div class="descSmall">Available in: 8.5”x 11” Available in French</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="reading" class="coverSelect bubig" />
                  <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/1_Reading.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Reading</div>
              <div class="descSmall">Available in: 8.5”x 11” Available in French</div>
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="activities" class="coverSelect bubig" />
                  <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/08_Public-P_Activities.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Activities</div>
              <div class="descSmall">Available in: 8.5”x 11” Available in French</div>
            </div>
            <div class="col-3">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="influence" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/06_Public-P_Influence.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Influence</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9" Available in French 8.5”x 11” and 7"x 9"</div>
            </div>
            <div class="col">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="influenceFrench" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="http://www.firstclassplanners.ca/peelportal/images/Influencer-New.png" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Influence French</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9" Available in French 8.5”x 11” and 7"x 9"</div>
            </div>
            <div class="col-3">
              <div class="image-container">
                <label>
                  <input type="radio" name="cover" value="kind" class="coverSelect bubig bumed" />
                  <img class="cover big med" src="http://www.firstclassplanners.ca/sg_covers_content/covers/thumbnail/05_Public-P_BeKind.jpg" />
                  <div class="bottom-right">This cover is not available in your selected size</div>
                </label>
              </div>
              <div class="descBig">Be Kind</div>
              <div class="descSmall">Available in: 8.5”x 11” and 7"x 9"</div>
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input check" type="radio" value="custom" id="customCover" name="cover" />
            <label class="form-check-label" for="customCover">
              Custom Cover - $275 per order
            </label>
          </div>

          <!-- <div class="row">
            <div class="col-3">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bumed" />
                <img class="cover med" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/WalkByFaith.jpg" />
              </label>
            </div>
            <div class="col-3">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig" />
                <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/TrustInGod.jpg" />
              </label>
            </div>
            <div class="col-3">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig bumed" />
                <img class="cover big med" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/JustBelieve.jpg" />
              </label>
            </div>
            <div class="col-3">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig" />
                <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/FruitOfTheSpirit.jpg" />
              </label>
            </div>
          </div> -->

          <!-- <div class="row">
            <div class="col">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig" />
                <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/04_Faith_United.jpg" />
              </label>
            </div>
            <div class="col">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig bumed busmall" />
                <img class="cover big med small" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/04_Faith-M_Pray-Hope-Trust.jpg" />
              </label>
            </div>
            <div class="col">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bumed busmall" />
                <img class="cover med small" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/03_Faith-M_HaveFaith.jpg" />
              </label>
            </div>
            <div class="col">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig bumed" />
                <img class="cover big med" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/02_Faith-M_Joyful.jpg" />
              </label>
            </div>
            <div class="col">
              <label>
                <input type="radio" name="test" value="big" class="coverSelect bubig" />
                <img class="cover big" src="http://www.firstclassplanners.ca/sg_covers_content/catholiccovers/thumbnail/01_Faith-P_Mountains.jpg" />
              </label>
            </div>
          </div> -->
        </div>
      </div>
      <div class="form-group">Total: $<a id="total">3.94</a></div>
      <!-- <button type="button" class="btn btn-primary" id="addToCart">
          Add to Cart
        </button> -->
      <button type="submit" class="btn btn-primary">View Cart</button>
      <button type="button" class="btn btn-primary" onclick="modalCheck()">
        <!--data-toggle="modal"
          data-target="#confirmModal"-->
        Add to Cart
      </button>
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
            <h5 class="modal-title">Are you sure?</h5>
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
              Yes, just add to cart.
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>