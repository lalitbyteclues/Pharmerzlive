<?php
    include('home/include/dbconnection.php'); 
    $total = $_POST['total'];
    $page_no = $_GET['page_no'];
    $per_set = 1;

    $eu = ($page_no - 0); 

    $back = $eu - $per_set; //0,1,2,3
    $next = $eu + $per_set; //2,3,4



    $from  = ($page_no-1)*$per_set;
    $sql = mysqli_query($conn,"select * from `blog` where `status` = 1 order by id desc limit $from,$per_set ");
    $table = "<table>";

    while($result=mysqli_fetch_array($sql))
    {
    ?>
   <div class="col-lg-8 col-md-offset-2 col-md-8 col-sm-8 col-xs-12 lpo">
           
                  <div class="blo_g-l">
                   
                     <div class="col-lg-2 col-md-2 col-xs-2 bloo">
                      <span><i class="fa fa-calendar-o"></i>&nbsp;<?php if($result['create_at']){ echo date("j F, Y ", strtotime($result['create_at'])); } ?>  </span>
                     </div>

                     <div class="col-lg-10 col-md-10 col-xs-10 blloo">
                        <h3><a href="#"><?php if($result['blog_title']){ echo substr($result['blog_title'], 0, 50).'..';} ?></a></h3>
                     </div>
                  </div>

                  <div class="clearfix"></div>
                  
                  <!--==blog section start==-->
                  <div class="blo_g-s">
                     <p><img src="<?php if($result['blog_image']){ echo 'home/'.$result['blog_image']; } ?>" class="img-responsive" width="100%;">
                     <blockquote><!-- <img src="/images/quote-512.png"  width="3%;"> --><p><?php if($result['descr']){ echo $result['descr']; } ?></p>    
                  </div>
                  <!--==blog section end==-->
                      <div class="blo_g-f col-md-6">
                         <p><i class="fa fa-weixin"></i>&nbsp;<span>POSTED BY ::</span><br/><?php if($result['user_email']){ echo $result['user_email']; } ?></p>
                      </div>
                      <div class="col-md-6">
                        <ul class="list-inline text-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li> 
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>  
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>    
                        </ul>   
                      </div>
                  
               </div>




                <div class="col-md-12 text-cnextenter">
                  <ul class="pagination">
                    <li>

<?php
if($back >0) { ?>
   <a href="javascript:void(0);" aria-label="Previous" onClick='ajax_page("<?php echo $back; ?>");'>
    <span aria-hidden="true">&laquo;</span>
   </a>
<?php } 
?>

                        
                          </li>


<?php }
 $total_pages = ceil($total/$per_set);
for($i=1;$i<=$total_pages;$i++)
{
    ?>
 
       <li class='pagination'><a href="javascript:void(0);" onClick='ajax_page("<?php echo $i; ?>");'>

    <?php 
    if($i==$page_no)
    { ?>
        <strong><?php echo $i;?></strong>
        <?php
    }
    else
    {
    ?>
        <?php echo $i;?>
        <?php
    }
     ?>
   </a></li>
    <?php
}

?>


<li>
                       

                          <?php
if($next <= $total) { ?>
 <a href="javascript:void(0);" aria-label="Next" onClick='ajax_page("<?php echo $next; ?>");'>
   <span aria-hidden="true">&raquo;</span>
 </a>
  <?php } 
?>


                         
                      </li>
                  </ul>
               </div>