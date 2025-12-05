<?php
include('connection.php'); 
include('include/header.php');
// include('add_to_cart.php');

?> 
 <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01" />
          </div>
      <!-- Product Row -->
      <div class="row my-5 g-3 align-items-start fade-up">
        <!-- Left Side: Main Image + Thumbnails -->
        <div
          class="col-12  col-md-6 d-flex flex-column align-items-center justify-content-center MainProduct DesktopProductImg"
          style="height: none"
        >
          <img
            src="Front-WhitePink.jpeg"
            class="ImgSize img-fluid ProductImg"
            alt="Product Image"
          />

          <!-- Thumbnails (hidden   on small screens) -->
        <div
            class="d-md-flex flex-wrap flex-row align-items-center justify-content-center mt-3 MoreProductImages"
            style="max-width: 100%"
          >
            <img
              src="Front-WhitePink.jpeg"
              onclick="showImg(this.src)"
              class="p-2 img-fluid"
              alt=""
            />
            <img
              src="Back-WhitePink.jpeg"
              onclick="showImg(this.src)"
              class="p-2 img-fluid"
              alt=""
            />
            <img
              src="IMG_2169.jpg"
              onclick="showImg(this.src)"
              class="p-2 img-fluid"
              alt=""
            />
            <img
              src=" IMG_2164 - Copy.jpg"
              onclick="showImg(this.src)"
              class="p-2 img-fluid"
              alt=""
            />
             <img
              src="My Dawg model.jpg"
              onclick="showImg(this.src)"
              class="p-2 img-fluid"
              alt=""
            />
            <img
              src="My Dawg model back.jpg"
              onclick="showImg(this.src)"
              class="p-2 img-fluid"
              alt=""
            />
          </div>
        </div>
        <!-- Mobile/Tablet Carousel -->
<div class="d-block d-lg-none w-100" style="margin-top: -40px;">
  <div class="swiper-container  ">
    <div class="swiper-wrapper  ">
      <div class="swiper-slide" >
        <img src="Front-WhitePink.jpeg" width="350px" class="d-block img-fluid mx-auto zoom-img" alt="Front">
      </div>
      <div class="swiper-slide">
        <img src="Back-WhitePink.jpeg" width="350px" class="d-block img-fluid mx-auto zoom-img" alt="Side 1">
      </div>
      <div class="swiper-slide">
        <img src="IMG_2169.jpg" width="350px" class="d-block img-fluid mx-auto zoom-img" alt="Side 2">
      </div>
      <div class="swiper-slide">
        <img src="IMG_2164 - Copy.jpg" width="350px" class="d-block img-fluid mx-auto zoom-img" alt="Back">
      </div>
      <div class="swiper-slide">
        <img src="My Dawg model.jpg" width="350px" class="d-block img-fluid mx-auto zoom-img" alt="Back">
      </div>
      <div class="swiper-slide">
        <img src="My Dawg model back.jpg" width="350px" class="d-block img-fluid mx-auto zoom-img" alt="Back">
      </div>
    </div>

    <!-- Pagination -->
     
       
       <div class="swiper-pagination mt-4" ></div>
       <!-- Navigation -->
    

  </div>
</div>

<!-- Zoom Popup -->
  <div id="zoomPopup" class="zoom-popup ">
    <span class="closeZoom">&times;</span>
    <img class="zoom-content" id="popupImg">
  </div>
        <!-- Right Side: Product Info -->
        <div class="col-12 col-md-5 text-start mx-lg-0 tablet-center fade-up">
        <!-- <div class="col-12 col-md-12 text-md-center text-start mx-lg-0 "> -->

          <h1 class="">My Dawg</h1>
          <p class="fs-5 ">Rs. 1499</p>
          <a href="#" class="" id="openModal" style="color: #ec3eb0;text-decoration: underline;">Size Chart</a>

          <!-- Modal -->
        

          <div class="row my-3">
            <div class="col size-button">
              <p>Size</p>
              <?php
              $productId = 1; // Example product ID for 'My Dawg'

// Fetch size and stock
$query = "SELECT Variant_ID, Size, Stock FROM product_variant WHERE Product_ID = $productId";

// $query = "SELECT Size, Stock FROM product_variant WHERE Product_ID = $productId";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<form id="sizeForm">';
    while ($row = mysqli_fetch_assoc($result)) {
      $variant_id = $row['Variant_ID'];
        $size = $row['Size'];
        $stock = $row['Stock'];
        $disabled = ($stock <= 0) ? 'disabled' : '';
        $style = $disabled ? "opacity:0.5; pointer-events:none; border:1px solid gray;" : "";

        echo "
            <input type='radio'  id='size-$size' name='size' value='$size' data-stock='$stock' data-variant-id='$variant_id' $disabled>
            <label class='size-option' for='size-$size' style='$style'>$size</label>
        ";
    }
    echo '</form>';
    echo '<p id="stockMessage" class="mt-3" style="color:#EC3EB0; font-size:14px;"></p>';
} 
?>

<!-- 1494 -->

              <p class="my-3  my-md-4">Quantity</p>
              <div class="quantity d-flex align-items-center">
                <button
                  onclick="decrease()"
                  style="font-size: 20px; width: 30px"
                >
                  -
                </button>
                <input
                  type="text"
                  value="1"
                  id="QuantityOfItems"
                  class="mx-2 text-center"
                  style="width: 50px"
                />
                <button
                  onclick="increase()"
                  style="font-size: 20px; width: 30px"
                >
                  +
                </button>
              </div>

              <button
                class="btn btn-dark my-4 w-sm-100 AddToCart"
                id="AddToCart"
                data-id="1"
                data-name="My Dawg"
                data-price="1499"
                data-image="Front-WhitePink.jpeg"
                
              >
                ADD TO CART
              </button>
              <button class="btn btn-dark mt-1 w-sm-100 BuyNow d-block">
                Buy Now
              </button>
              <!-- add razor UI when clicking here -->
            </div>
          </div>
          <div class="row my-5 my-md-2 ">
            <p class="">
             Introducing the Lobster [MY DAWG] tee. Made from premium medium-weight cotton and finished with high-density screen prints on the front and back. Built for the streets and the spotlight. This ain’t your regular tee  it's a statement.
            </p>
            <p class="text-center my-2">HIGHLIGHTS</p>
            <ul class="ps-4">
              <li>OVERSIZED FIT.</li>
              <li>260 GSM TERRY 100% COTTON.</li>
              <li>SCREEN PRINT FRONT & BACK.</li>
              <li>MADE IN INDIA.</li>
            </ul>
            <p class="text-center my-2">CARE</p>
            <ul class="ps-4">
              <li>WASH 30<sup>o</sup> OR BELOW.</li>
              <li>MACHINE WASH INSIDE OUT.</li>
              <li>DRY AND IRON INSIDE OUT.</li>
              <li>DO NOT SCRUBBING.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<?php
include('include/footer.php');
?>  