<style type="text/css">
    .footer {background-color: #00090b;}
    .foot_1 h2 {color: #fff;font-family: 'Raleway', sans-serif;/*padding: 26px 36px;*/}
    .foot_1 p {text-align: justify;}
    .foot_1 ul li {list-style-type: none;text-align: left;line-height: 2;}
    .foot_1 ul li a {text-decoration: none;color: #fff;font-family: 'Raleway', sans-serif;}
    .foot_1 ul li a:hover {-webkit-transform: scale(1.1);-moz-transform: scale(1.1);-o-transform: scale(1.1);transform: scale(1.1);color: #1F94BF;transition:all 350ms linear 0s;}
    .foo_p {padding-top: 20px;padding-bottom: 20px;}
    .foo_p_1 {padding-top: 20px;padding-bottom: 20px;}
    .foo_p_2 {padding-top: 20px;padding-bottom: 20px;}
    .foo_p p {color: #fff;font-family: 'Raleway', sans-serif;font-size: 13px;}
    .foo_p_2 p {color: #888;font-family: 'Raleway', sans-serif;}
    .foo_p_1 ul li {padding-left: 0px;padding-right: 0px;}
    .foo_p_1 ul li a img:hover {transform:scale(1.1);transition:all 350ms linear 0s;} 
    .social {position: fixed;z-index: 10;right: 0px;bottom: 0;}
    .social ul {float: left;margin: 0px;list-style: none;padding: 0px;}
    .social ul li {margin: -10px 0px 0px 0px;display: block;}
    .social ul li a  {    /* background: #131110; */width: 47px;height: 47px;text-align: center;}
    .social ul li a img{margin-top :10px;}
    .social_1 {position: fixed;z-index: 10;right: 0px;bottom: 0;}
    .social_1 ul {float: left;margin: -5px 21px;list-style: none;padding: 0px;}
    .social_1 ul li {margin: -10px 0px 0px 0px;display: inline-block;}
    .social_1 ul li a  {/* background: #131110; */width: 47px;height: 47px;text-align: center;}
    .social_1 ul li a img{margin-top :10px;}
</style>
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
	
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>App</h2>
                        <p>Download App from google play store</p>
                         <div class="footer-logo"><a href="/" title="Logo"><img src="/images/Google_play.png" width="50%" alt="logo"></a></div>                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>About us</h2>
                        <ul>
                           <!-- <li><a href="#">Company</a></li><li><a href="#">Core Values</a></li><li><a href="#">Careers</a></li>-->
                            <li><a href="/contact_us.php">Contact us</a></li>
                            <li><a href="blog.php">Blog</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>Useful Links</h2>
                        <ul>
                           <?PHP	$footerpages= mysqli_query($conn,"SELECT * FROM `pages`");
						if(mysqli_num_rows($footerpages)>0){ 
								while($queRow = mysqli_fetch_array($footerpages)){
							echo '<li><a href="/pages/'.$queRow['Slug'].'">'.$queRow['ShortDescription'].'</a></li>'; 
							}} 
							?>   
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <!-- <h2>About</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper urna a tellus rutrum, nec congue metus accumsan. Fusce euismod enim vitae scelerisque malesuada. Mauris facilisis dui vel libero accumsan placerat.</p> -->
                       
                    </div>
                    <!--======social button start========-->

                </div>
            </div>
            
            <div class="m-t-20">
          
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="float:right;">
                  <div class="foo_p_2 text-right m-t-20">
                      <p>Copyright &copy; Pharmaz 2015 All Rights Reserved.</p>
                  </div>
              </div>
            </div>
        </div>
    </div>  
</footer> 
<div class="se-pre-con"></div>