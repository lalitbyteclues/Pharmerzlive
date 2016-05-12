<!DOCTYPE html>
<html lang="en">
<?php session_start();
  include('head.php'); 
  ?>

<body>
<div class="page"> 
  <!-- Header -->
  <?php include('menu.php'); ?>
  <!-- end nav -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
          <div class="table-responsive">

            <form method="post" >
              <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                  <colgroup>
                  <col width="1">
                  <col>
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  </colgroup>
                  <thead>
                    <tr class="first last">
                      <!-- <th rowspan="1">&nbsp;</th> -->
                      <th rowspan="1">Supplier</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                      
                      <th colspan="1" class="a-center"><span class="nobr">Notes</span></th>
                      <th colspan="1" class="a-center">Location</th>
                      <th class="a-center" rowspan="1">Qty</th>
                      
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      <td class="a-right last" colspan="50"><a href="api.php" class="button btn-continue" title="Continue Shopping" ><span><span>Continue Shopping</span></span></a>
                       <!--  <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Update Cart</span></span></button> -->
                        <a href="javascript:void(0)" class="button btn-empty" onclick="clearcart(<?php echo $_COOKIE['cookie_count'];?>);" title="Clear Cart"><span><span>Clear Cart</span></span></a></td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                        if(isset($_COOKIE['cookie_count']))
                        {
                          $j=1;
                          for($i=1;$i<=$_COOKIE['cookie_count'];$i++)
                          {
                    ?>
                    <tr class="first odd">
                      <!-- <td class="image"><a class="product-image" title="Sample Product" href="#/women-s-crepe-printed-black/"><img width="75" alt="Sample Product" src="products-images/product1.jpg"></a></td> -->
                      <?php //echo  $j; ?>
                      <td class="product-name"> <?php echo  $_COOKIE['textname_'.$j]; ?> </td>
                      <td class="a-center"><?php echo $_COOKIE['titlename_'.$j]; ?></td>
                      <td class="a-right"><?php echo $_COOKIE['centertext_'.$j]; ?></td>
                      <td class="a-center movewishlist"><?php echo $_COOKIE['endtext_'.$j]; ?></td>
                      <td class="a-right movewishlist"><span class="cart-price"> <span class="price"><?php echo $_COOKIE['starttext_'.$j]; ?></span> </span></td>
                      <td class="a-center last"><a class="button remove-item" title="Remove item" onclick="removecart('<?php echo $i; ?>','<?php echo $_COOKIE['cookie_count'];?>')" href="javascript:void(0)"><span><span>Remove item</span></span></a></td>
                    </tr>
                    <?php 
                          $j++;
                          }
                        }
                        elseif($_COOKIE['cookie_count'] == '')
                        {
                          echo "Your cart is empty.";
                        }
                    ?>
                  </tbody>
                </table>
              </fieldset>
            </form>
          </div>
          <!-- BEGIN CART COLLATERALS -->
          
          
          <!--cart-collaterals--> 
         
      </div>
    </div>
  </section>
  <!-- Footer -->
   <footer class="footer">
    <div class="brand-logo ">
      <div class="container">
        <div class="slider-items-products">
         
        </div>
      </div>
    </div>

    

    <div class="footer-middle container">
      <div class="col-md-4 col-sm-4">
        <div class="footer-logo"><a href="index.html" title="Logo"><img src="/images/logo_pharmerz.jpg" alt="logo"></a></div>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu. </p> -->
        <!-- <div class="payment-accept">
          <div><img src="/images/payment-1.png" alt="payment"> <img src="/images/payment-2.png" alt="payment"> <img src="/images/payment-3.png" alt="payment"> <img src="/images/payment-4.png" alt="payment"></div>
        </div> -->
      </div>
      <div class="col-md-4 col-sm-4" style="padding-top: 43px; padding-left: 26px;">
        <!-- <h4>Shopping Guide</h4> -->
        <!-- <ul class="links"> -->
          <!--<li class="first"> --> <a href="#" title="How to buy" style="padding-right: 40px; font-size: 18px;">How to buy</a>  <!--</li>-->
          <!-- <li><a href="faq.html" title="FAQs">FAQs</a></li> -->
          <!--<li>--><a href="#" title="Payment" style="font-size: 18px;">Payment</a>  <!--</li> -->
          <!-- <li><a href="#" title="Shipment&lt;/a&gt;">Shipment</a></li> -->
          <!-- <li><a href="delivery.html" title="delivery">Delivery</a></li> -->
          <!-- <li class="last"><a href="#" title="Return policy">Return policy</a></li> -->
        <!-- </ul> -->
      </div>
      
      <div class="col-md-4 col-sm-4">
        <h4>Contact us</h4>
        <div class="contacts-info">
          <address>
          <i class="add-icon">&nbsp;</i>1C – 609, 6th Floor, Raga Building, Shell Colony Road<br>
        &nbsp;Chembur Mumbai – 400071
          </address>
          <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +91 7666601980</div>
          <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="#">support@pharmerz.com</a> </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom container">
      <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2015 Pharmerz. All Rights Reserved.</div>
      <div class="col-sm-7 col-xs-12 company-links">
      
      </div>
    </div>
  </footer>
  <!-- End Footer --> 
</div>
<div class="social">
         <ul>
            <li class="fb"><a href="https://www.facebook.com/pharmerzz" target="_blank" ></a></li>
            <li class="tw"><a href="https://twitter.com/PharmerzT" target="_blank" ></a></li>
            <li class="googleplus"><a href="#" target="_blank" ></a></li>
            <li class="rss"><a href="#" target="_blank" ></a></li>
            <li class="pintrest"><a href="#" target="_blank" ></a></li>
            <li class="linkedin"><a href="https://www.linkedin.com/company/pharmerz" target="_blank" ></a></li>
            <li class="youtube"><a href="https://www.youtube.com/channel/UC6C1uwIbZEziq8rfN-qW0-A" target="_blank" ></a></li>
         </ul>
      </div>

<!-- JavaScript --> 
<script type="text/javascript" src="/js/jquery.min.js"></script> 
<script type="text/javascript" src="/js/bootstrap.min.js"></script> 
 
<script type="text/javascript" src="/js/common.js"></script> 
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript">
function clearcart(val)
{
  for(var i=1; i<= val; i++)
  {
    document.cookie = 'textname_'+i+'='+'';
    document.cookie = 'titlename_'+i+'='+'';
    document.cookie = 'centertext_'+i+'='+'';
    document.cookie = 'endtext_'+i+'='+'';
    document.cookie = 'starttext_'+i+'='+'';
  }
  /*document.cookie = 'cart_total='+'0';*/
  document.cookie = 'cookie_count='+'0';
   location.reload();
}
function removecart(val,count)
{
    var a = count-1 ;
    
    document.cookie = 'textname_'+val+'='+'';
    document.cookie = 'titlename_'+val+'='+'';
    document.cookie = 'centertext_'+val+'='+'';
    document.cookie = 'endtext_'+val+'='+'';
    document.cookie = 'starttext_'+val+'='+'';
   /* document.cookie = 'cart_total='+a;*/
    document.cookie = 'cookie_count='+a;
    window.location.reload(true);
}
</script>
</body>
</html>