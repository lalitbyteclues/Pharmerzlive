<!DOCTYPE html>
<html lang="en">
  <?php 
  include('home/include/dbconnection.php'); 
   session_start();
   include('head.php'); 
  ?>
   <body class="cms-index-index" bgcolor="#E6E6FA">
      
      <div class="page">
         <!-- Header -->
          <?php include('inner_menu.php'); ?>
         <!-- Navbar -->
         <!-- end nav -->
         <!--==section start==-->
         <div class="container aaa">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="col-lg-8 col-md-offset-2 col-md-8 col-sm-8 col-xs-12">
                  <div class="bollg text-center">
                     <h3>BLOG</h3>
                  </div>
               </div>
               <?php /*$sql = mysqli_query($conn,"SELECT * FROM `blog` where `status` = 1 ");      
                    if(mysqli_num_rows($sql)>0)
                    {   $i = 1;
                        while($result = mysqli_fetch_array($sql))
                        {*/?>
               
               <?php  /*}
             }*/?>
             <span id="ajaxData"></span>


            </div>
         </div>
         <!--==section end==-->
       </div>
        
      </div>
       <!-- start Footer -->
         <?php include('footer.php');?>
         <!-- End Footer -->
      
      <?php 
      $sqlcount = mysqli_query($conn,"select count(*) AS total from `blog` where `status` = 1");
      $total = mysqli_fetch_object($sqlcount)->total; ?>
      <!-- JavaScript -->
      <script type="text/javascript" src="/js/jquery.min.js"></script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
      <!-- <script type="text/javascript" src="/js/application/spidergcon.js"></script> -->
      <script type="text/javascript" src="/js/common.js"></script>
      <script type="text/javascript" src="/js/revslider.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/wow.min.js"></script>
      <script type="text/javascript" src="/js/application/search_proank.js"></script>
      <script>
         new WOW().init();
      </script>
      <script type="text/javascript">
          $(document).ready(function(){
            $('#nomo').click(function(){
               $('#sido1').slideToggle(1000);
             });
             $('#nomo1').click(function(){
               $('#sido1').slideToggle(1000);
             });
          });  
      </script>
      <script>
      function ajax_page(page_no)
      { 
        $.ajax({
          type:"POST",
          url:"ajax_pagination.php?page_no="+page_no,
          data:'total=<?php echo $total; ?>',
          success:function(data){ //alert(data);
           $('#ajaxData').html(data);
          }
        });
      }
      ajax_page(1);
      </script>
   </body>
</html>