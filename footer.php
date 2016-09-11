 <footer class="bg-lightblue">
		<div class="container soft-top-45 soft-bottom-45 bg-lightblue">
			<div class="row">
				<div class="col-sm-3">
					<h3>App</h3>
					<ul class="nav">
						<li><a href="#">Download app from</a></li>
						<li><a href="https://play.google.com/store/apps/details?id=com.pharmerz.pharmerz&hl=en" target="_blank"><img class="img-responsive" src="images/app_store.png"></a>
						<a href="https://itunes.apple.com/in/app/pharmerz/id1064115252" target="_blank"><img class="img-responsive" src="images/apple-store.png"></a>
						</li>
					 </ul>
				</div>
				<div class="col-sm-3">
					<h3>About us</h3>
					<ul class="nav">
						<li><a href="/contact_us.php">Contact us</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Useful links</h3>
					<ul class="nav">
						 <?PHP	$footerpages= mysqli_query($conn,"SELECT * FROM `pages`");
						if(mysqli_num_rows($footerpages)>0){ 
								while($queRow = mysqli_fetch_array($footerpages)){
							echo '<li><a href="/pages/'.$queRow['Slug'].'">'.$queRow['ShortDescription'].'</a></li>'; 
							}} 
							?> 
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Stay connected</h3>
					<ul class="nav nav-pills social-links">
						<li><a target="_blank" href="https://www.facebook.com/pharmerzz"><img class="img-responsive" src="images/fb.png"></a></li>
						<li><a target="_blank" href="https://twitter.com/PharmerzT"><img class="img-responsive" src="images/twitter.png"></a></li>
						<li><a target="_blank" href="https://www.linkedin.com/company/pharmerz"><img class="img-responsive" src="images/linked.png"></a></li>
						<li><a target="_blank" href="https://www.youtube.com/channel/UC6C1uwIbZEziq8rfN-qW0-A"><img class="img-responsive" src="images/g+.png"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="copyright bg-semilight">
			<div class="container bg-semilight">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>Copyright © Srijan Digital Platforms Pvt. Ltd., All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer> 