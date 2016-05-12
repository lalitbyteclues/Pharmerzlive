<!DOCTYPE html>
<html lang="en">
<?php 
 include('include/dbconnection.php');
    session_start();
    if($_SESSION['user_id'] == ''){
    header('Location: ../index.php');
 }

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmerz | Panel</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">
 <?php include('sidebar.php');?>
            
        

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Purchase Order Details</h2>
                                    
                                    <div class="clearfix"></div>
                                </div> <div class="col-md-8"> 
                                <div class="x_content">
                                   <!--  <div class="col-md-6"> -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Document No.</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="doc_no"></span>
                                            </div>
                                        </div>
<br>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Issue Date</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="issuedate"></span>
                                            </div>
                                        </div>
<br>
        <!--                                 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Promised</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="datepromised"></span>
                                            </div>
                                        </div>
<br> -->
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Currency</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="currency"></span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Received From</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="bpartner"></span>
                                            </div>
                                        </div>
<br>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery location</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                 <strong id="">Address line 1</strong> : <span id="deliveryloc1"></span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                 <strong id="">Address line 2</strong> : <span id="deliveryloc2"></span>
                                            </div>
                                            <div class="col-md-offset-3 col-md-9 col-sm-9 col-xs-12">
                                                 <strong id="">Postal Code</strong> : <span id="deliveryloc3"></span>
                                            </div>
                                             <div class="col-md-offset-3 col-md-9 col-sm-9 col-xs-12">
                                                 <strong id="">City</strong> : <span id="deliveryloc4"></span>
                                            </div>
                                            <div class="col-md-offset-3 col-md-9 col-sm-9 col-xs-12">
                                                 <strong id="">Region</strong> : <span id="deliveryloc5"></span>
                                            </div>
                                            <div class="col-md-offset-3 col-md-9 col-sm-9 col-xs-12">
                                                 <strong id="">Country</strong> : <span id="deliveryloc6"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product</label>
                                            <div class="col-md-3 col-sm-9 col-xs-12">
                                                <span id="product"></span>
                                            </div>
											  <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                            <div class="col-md-3 col-sm-9 col-xs-12">
                                                <span id="category"></span>
                                            </div>
                                        </div>
                                            <br>
                                            <br>
                                         <br>
                                        <div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Rate</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="rate"></span>
                                            </div>
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="quantity"></span>
                                            </div>
                                        </div> 
										<div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Net Amount</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="netamount"></span>
                                            </div>
                                        </div>
											<div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Tax</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="tax"></span>
                                            </div>
                                        </div>
										<div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Tax Amount</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="taxamount"></span>
                                            </div>
                                        </div>
										<div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Total Amount</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="totalamount"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">UOM</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <span id="uom"></span>
                                            </div>
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Notes</label>
                                            <div class="col-md-3 col-sm-9 col-xs-12">
                                                <span id="notes"></span>
                                            </div>
											    <label style="margin-left: -1%;" class="control-label col-md-3 col-sm-3 col-xs-12">Payment Term</label>
                                            <div class="col-md-3 col-sm-9 col-xs-12">
                                                <span id="term"></span>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="form-group col-md-12">
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <span id="cstmlink"></span>
                                              <!--   <input type="button" class="btn btn-primary" onclick="sendquotatn();" value="Send Quotation"> -->
                                            <input type="button" class="btn btn-primary"  id="acceptpo" value="Accept PO"> 
											</div>
                                        </div> 
                                    <!-- </div> -->
                                </div> </div>
								<div class="col-md-4" > <h2>Messages</h2> 
								<div id="browser-window">
						<div id="viewport">
							<div id="viewport-content" >
							
							</div>
						</div>
								 <form class="row row-chat"  id="chatform">
									<div class="input-group">
										<input type="text" class="form-control" id="m" autocomplete="off" placeholder="Type your message" />
										<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">Send</button>
										</span>
									</div>
								</form> 
    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>  
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="http://momentjs.com/downloads/moment.js"></script>
	 </div> </div> 
                            </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
				<script>
$(document).ready(function(){   
var org_id = "<?php echo $_GET['id']; ?>";
var username = "<?php echo $_SESSION['user_email']; ?>";
var password = "<?php echo $_COOKIE['password']; ?>";
spiderG.getLoginToken(username, function()
{ 
	 var loginToken = spiderG['loginToken'];
     var loginTokenTS = spiderG['loginTokenTS']; 
     $.ajax({type: "GET",url: "http://vpn.spiderg.com:8000/messagingurl",contentType:'application/json',headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){
    	 var socket = io.connect('http://vpn.spiderg.com:8000/'+data.path); 
		 socket.on('connect', function () { console.log('Client has connected to the server!');}); 
		socket.on('welcome',function() {console.log('Welcome!');});
		socket.on("message", function() { });
		socket.on("user_joined",  function(msg) {
		console.log("hi");
		});
		socket.on("message_status", function(msg) {  console.log(msg);
		});		
		socket.on('history',function(msg) {  
		if(msg.refid=="adv"){ 
				var messageslist="";
				for (var k = 0; k <msg.history.length ; k++) {
				var d = new Date(msg.history[k].timestamp * 1000); 
				messageslist+="<div class='bubble-container'> <div class='avatar avatar-"+(msg.history[k].username==username?'right':'left')+"'><img src=' data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABqCAYAAABK6PQkAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAKLpJREFUeNrsfQmMXdd53nfuvW+f997sHJJDDjdRokTL1m4rsWs3sZXaDpAWcOvURYrEReG0QYOmQNMGKNqmQYC6idtUaOsEsVO7tuUolSWvsSzH2mVLFCVRCylRIilRXIechbO8/Z7Tc/6z3sehq8Uajmk94vK9eeu9/3f+fTlMCPESgCH8FN46nS56KYcQHBFjiOMY+XwOP8W3uUT+Ny6P6lo/0zNn5/Hs/sN4+rkjePHwSZw8PYeFpSba7R5SzgmMQj5GdaCE8dEaJjeMYtfOTdi9awt2bNtIr/8U3HJMcsiMfDC8Fs+u0Wzjb+5/At/46x/h8X2HcWaugZ5IEOcLyMkjzuURRQlYFMl3M+IULsFJuxKkbhtIWyjngS0bB/Hem67ERz50A6555861DMjsmgSk2+3itjvux198+R48f/gUWK6M8kAVuWIRLJYAyH8SBTCm7v1jRvfyiBgBpA4FULuxjOVzMyiIZVx/9Wb8+iduwS/9wg1vA3LhmzAEBH64Zz/+4I9uw559R1Cs1FGuVCUIEQQRnEmOiIno8oEkvBFDLDaAGFDUdxmusc8p0FKeYnFmGu1zJ/C+G7bh3/zLX8XVV2077xzeBsTc/vuf3YU//h93oSPFUrVa1URXxFYgRIbY8rEChQjuOCMmTrGPHecoQAgYGK5SfycQEpizJ15GrnMW/+qf/Qo+9Ru//DaHZERUL8Xv/oc/xxe/+gNUBweljshL8kUOAEgiRgqcWHOHBYSAYpboEd0TOAoAJ8LMqpePBYEC+u5Iir7W8jmcPrQPH/vIdfj07/9TlIoFqYeE/8zPIiBpmuK3/+1ncdv/vQ+1obqkfZ5Ws+aKiMRRFEe0sjV3aGJqQBIHiOaMkGtYILIYiTwFmr/J9yUxhFwMrx7Yg7990xT+9L/9DgYqxYvKIdHF1RvAf/zPX8ZX7rgP9VqZyCVXCOif0Ae9TzAv3c3q1QQXge5g9JLCMFJcRPpG/qH0T+RFGQFqgGVcviwXwNTum3HvY0fxL373VvR6vcz5rfbtIgLC8Jd33o/P/u9vo1YtBzApANSRakCkKSvA9XMQGUKFipwIHEWG4NnH4aHFmAEk0qAqDty0+z34zr3P4w8/8xV3fj9TgLx89DT+06e/LJ25HGInViwphCa7AkNogDRQFg+hjVoGxxnEHRagiBmdsxIojA5EzBsK8l8uzmHTlTfhT7/4fXz/vr0XbZleNEA+fevtOH1mHvlc0ifJhLsXlhuE5Z2AO8w/sIBTIqNPQgAs94SiLWJ9XMMI+MJAHbX1l+P3P/0lLC01f3YA2fvUQXzzu49JBVrKCjEjloQBhVlgJKeAC/e6RykUX1luWYn4KnxC+qMPJKeaeA+jG3fgpRMtfPEvv3dRdMlFAeTz0gNvtTpadPTreSEyzCIQcEeoRhxowkh7r0vijHjSuiKKrWMZPo4CRa9FlwJmbPMV+D+334uFxeVV1yWrDsirx8/g3gefQqVUuKDlFYopZiERGhZOQHD3mP7s8xt0NIUZ0cWM1WVAig1AkQElDrmE0Q/VRiZw7EwH37/38UtfZN330D6cnVmQ4iP68YCEKiWQUtokzjBSRsRZL52BZVa/Iry+jzOcwViWW3SYLEZleCO+9b09lz4gD/7wOWNuXggP/ZpgfcLCKHlm/RNrfQX3ImtVZ4hN3r3kLN7rIMnniVMcl4RKX31Qmty10Qk8/fwxzM0vXLqANFttHHjxKHJJcmFnUSnwLF0z1pamvxVXoQPpv0OLokQfzi9hEogc5k4cwtyxlySHJtIpTIxogz6sUSC/r1gawPwSx8EXj126gJyansO0NHWT5MI/K6SlI9KeJAoPzSenunEeOMgAo96nciGNc2fQXj6HXqdDb49zOeTyRYxu2oGzLz+HY88+jE5zifIqkfFJolDRS8B4VMRLR46vKiDJav7Y2bPn0Gx2LqA/DCcoR00lmjpNjYV02BArESOCeBTz4smAJTKR/Agzrx5Eu7GIXE4SXAJRrg5hYGgM1ZH1mLjsXThz5BmcfP5HGJq8AvV1W1QSRgKgzGvPKXGhglOnZy9dQBaXm+ilqeSQeEU4lNmar1QRSSIq0cW7HbnC23LFN9FtLbnweZTLS3FTkDgVIXIqc6jenydLSq10xQkTO96F6SPPIW0vIWYcC9NHMXvisDSJcyhUBwm0wbERLJ06iE6rgbGpXSrsrLSMBEUHJhP5PeqcL1lA0lSnWFfkDrmyC9U6ipJYuUKJQvCRBI50iPxcKoHpthtEvF5TAttpSA6Yl7hxb/qGgUPJWbzXRdrrYfKKXRgaG5OgttBYOIe56TM41+hhcXYeW3ZdgROHDuHMywJjW66SoHTIqCYxJ8VWLxWXLiBxHK1oYSlPPJFKtFQfRmGghnyxgqRQlCs/cQSOnQ8R6BpJvFSKml63JQFTj+0hVzpXRyrfJ9BpLKNS3Yb6ls3EiQqkxsISpl89ikKpiMuvuwYH9uzF/OkKBpX4kuCTlaeqWCQ3XrKAqFBJTq66TBJIPZZEL9WGUJDiqqgAKVUllxQCQJgzU2OlgOXjxHjhCmR1ULwwCgONcO+3FkAca7NW6apqvYbxjROUb+92urjyhmux75G9Us+sk+/Lm4SuyESiLzlARoZrKBby6MgVDOaduqIEgjijVEFOckq+VJIcovREznGGDYVQPCpWhIYJkTBNaCYoaqw9c7jnI2M9MfM8WVAGIJX7KBZyUgw2Ua4UMXvqJGZOHMH4tqskF+mQ/+hI9dIFZHSkhqGhCk6empXETLSjJ30BpWTzRck9xTLyUlQpx02ZqYnUA5qwhgtMgJAIHcMEC9XrOvSeGPNVgwUDorknsAz3WP9GisqeFHH5fCxBaeOyq6/E6bsflrquK98n/RRpdW3aMHrpAqKK2MrlkpTt3pcoSI4olAeQSEASqrXKkeyOtKfmq0ZcfgMmDGJFluYEJZoSE6OKA5Ds35FxAOMwKqx895wEQxoPSaysswmMjtXQPDePyvA4KoUImycvUUDu/OtHcfvXH8GZmUVv9kqqKFGlrKpEma9SRGmRYr10blKvelVHJmhIZQokgoRLTNnEE3FThACIyHNMbLgERufII030c7FcHYnUWZu2TOLZ/dMakHIOBxbluc62sHV4dXLtq+Kpq5DJrZ+/Bw8++jza3ZSIpXSHAqBQGSATVz1WgT/mgulihaCjCSIynzEkvaHqeh03CRftdeKMxJvhnEhzg4oWxPLIJzElyfJSl6j79VMbJdu00Gt3MDRSQQM5HJ9vrVpeZFU4RIXBS+UiBmplMOkYcmmicpFKnVGiI8nldNyJacUb5p6Yf+ALGXxERdWO0OEKHBxXBFyTuYcJjxiOgy6KUDyiOHJkfBjlYoLm8jlMXbWe4m6Jq4S8RDikmM9hE8ni2BA/JoWurCpV9UGmbWxTferadc6DZTKCYYjdZwVhU7eGUyyokQEoZvqwz8dGD3nFr8VcTuqSnOSQam0A9cEBpK1FTG3fKC0xjnJ+9UJ+q/ZLV+6YpJhTJC86lpaUIqziDu3smfJPFRx0qVovJEiXCB2FZUEUOBKWc+BFVRh2B3zg0OgQFvgn2nrT4kvptUSCUiwVJChlqdB7mJhcLz31HqqF1bN9Vu2X3rFrkno3lCIuSM7oSds/p4CxBXHGYXM1WZnsFMvqE/N+GE6wcTALhhZLCPIdQYYwMnonCrhM/YRaGKqyXoJSq1dQqRTIi+fLTdSK8aUHyK4d6zE0WMXCwpJUoHmk1bpW5GGmDsLrDuGLHMLciPPuBfznrD4IixyAviK6EAzhgHIRfiFFWU6/b8vOKdRqVXSkYi/kIgwU4ktNZAlMjNZx8w2XSSuLI5JA1EbWkalrs3TM5sfVf1x70oyvZGkZYKylFQAViitkKlBEAFJgKgfWmeUixZ3bdm7Duo3r0O50MSi5o0D5G3EpAaJJ9qlPfEB663WkQsrtYlFHc01MS8CWAKVGbKW6YpFzAkYEdVqs3ww+73EfCGBePMHX/Fo0bUVjWKslDAdeNlbqg/0Syhhu2TiC3/utj5LeIAUfB/VRYQmQqf+xqdlM3txyEsRrW7N9dGRBrp4Fb/K1wRruTsqxa10ZE7XVLb5e1dCJouTf+Vu70eqk+OMvPISUS04JOIRRDW+UTckGxQ2KVFE2P+ip3EfmKCQ36wOAWY6KzGuam2xKmAuOKyUYV29Y/dbLVQXEhrT/7gfficH6AP7oCw9LUPRZEF0UHsxYVlwftgLeMIUHiXvu6S9y6AdHiAufkRVNGgzt2V+3cQDbRsq4GLdVFVlhI8wHbtyOa3ZtoFCKF1fcVb9b8xd9lSX9RQ19DOiKIfjK5PeFERkJyenVngR5vJK/aGCsOiA+GKIpsWOy7kSS5QDG+fkiyxz8PHD6S4EsmFkOWPFQ3MitPmJOVA2Vk/OsuktXh3gVqr33bWPQ7eOeE1h/8ZsiGu9X7MarF3p1099g3hITLMtJ0OKIw3j7wjqhTEcGDOMqM3hkIL+yNXDpcoi/7ZwaxfBADmmataZwAQ4JOYMH4Iigvi4r0vprt8JCO0jzm9P3qCOVx0AhwXApuZgkubiAKMW+c7JKekStdBvoBTc+CLJKnNNgALFygZwglyX7d2hFG9A0ECFggiph1PePVHLIJ9HPLiDq9u53TIKrqQv9OoHrkiEntpxlJfosLRFUwgunFywXaCD969wAl8oHKd1rsJRPtLGev9jkWAOAXLMNg0WhV3d/O4IBhsxfbrmgT/Rw81nBM8qfm8+klrvCx0I4bqJ0stQdA8UI66r5i6bM1wwgY6NDuH7XOBrNpjN/z7euNLF5Gj7fxz1hEbaRVdyFxSz3wLyu7xWX6MpThg21AgpJ/DaHqNtH3n8Vol7DMIUPvWdA4cLJe8cVPNAN5jluiM25B8G9LwTFcFsiRZUKHvqcOXsbkHft3o7dW2toNlv6iT5fBFiJc2CUPNccZPwK63uE+iMNxZsRVynXoRMFyIQUVUPltTFna00AogKMH//I9eCtBd92EJi/GeXO7ernfWLNc4Y7iAu4M2tDc1mJv2JBZQsZdo6XsQYGz6wdQNTt5uuvwI27RtFYXnJeu41taBAMN/B+EWVAgregQuVunUSrT9R/0qpGLqdTt5PSshobWDtT6NYMICof8cl/8D4UxbImMgLljX5xxfv8D3mfij6H0ICCQJdYUSath3Iph1IuxlXrB9YMd6wpQNTt8u2T+Pgv7UZzcVaHNawjyIOJDrxPLAUizOuIrNXllLjQAcSqcgBzEeU7VrOA4acOEHX7h7/y87j5yhH0Os0gZhVYWI47VuCS86wyK/p0nEsp8gHJGQqQuhRZO8bKa+3y1x4guVwO//jvvQeF7hmoKAbvj23xvvu+15zvkYl5cQ1GMcH68QpOnJjD03tfomDi24C8lhB0HOPAnrshFo9QkZpT3iGncG9BhXrDVj26EArXnDEoFffk+hpmZxZw5189jIX5xlq89LUJiCL23NwMfnTPl5HOv4jhqi6sVu1l1gTmJiwP0RdS4T56q2b6KrN2gxRNU5ODOHl8Gl/5wj04O30OSW5NXjqStXhS3W4PSb6MxblTuO8bX8CN7/8otl/9bjTTHBodY85yXSbEepTV0mU/KZU3UsduMZ9gpJbH+GgZ5XIRTzx2AN+58wG0u0os5qkb+G1AXuNt/8GjaEnClSp1dNtNPHT313Dy6GHc8P4PYeuGKfQQoyt9CW5qqRKpoHNyxRcKkTRnE9QqedRqRepFmTkzi6/f9l08uecAtT0US2X5+RQnzy7oAcxR9DYgP+72yrHT+Mz//BpKZekf9GLqD0njDg49/yxOvHIUO6++Fruvux4bpjajUisjn8+TIaB6O5KCGg6Qk44fx+ljp7Bvz9PY++gzWF5oy/dWdT8I7xGIp2aW8PiRWdy0ffRtQFa6qZbpb3z3R/jDz9yGE3JVD9TqaC/rGt5ItZcluvPq2b178MIzz2B0fBzrN09ibP161AbrNDajK+XR/Mwsjh89iVPHZ9Dpqv7FGrXLkZ+iWtXSGLEEefHcEu7fdwxdqUavnBjAcCX/NiDEEUdP428e3IevffMh7Nn7PAqVMkbWjUniLkoiq0yitLJYW7c4SxVBMwKkrpg+dQrHXz6MXk9aS7xrTJSC/IxqkRuS4m4QxXJZ1+9Se7Q5UnnEHN1OB4/c/xwq1QqOz3cwXkkwNVLCxsEiCrmLF4Zf9TGxS40mXjx0HI9K4j/wyLN48qmXMH1mDoVSAcPrJlAeHEQqncJ2c5GmN/SkDqHe87Sno7lkSaW6D73Xkq/JIzXzTBLVMFohUJRRoCY8RHFB96AosZYUaDqDmh2fUOV9DiPjI7jupl3YsHGISuaLMaPY1uRQERMSnJEBXRDub2/pBOy3fm7vsgTg4KETeGLfi9jzxEE8s/8Ijh2bxtJyk6bxVAeHUBtbh8rgCCL5d7e5REB0Ww10Og3psbfAO5JDej0fHjEDahQgamgAlxzCqDRVde+WCYwkV5LfV6Cec1Xc7QHRIzkSqeDVCA41xkMdExtGsXlqDMOjA2ASFOrcpsKHCOvrRUyNlrBJHmP1wltpCMz+xEWWGqT/wkvH8diTB6UIegFPWwCWGiQ+iuUKEX9kalTejyI/UCNnSIVK1OgMvQBjGrofRXnpJEp/IlErskecoUxcFYikkggJUKyKI1LbSZU3A8oS+g4zc8kNNPNThXx5tlr9iVwIZ2eXMbfQRXmggsHBEllpBenZzy0KvHRqGT94FtSbqAohtki/ZufGCnZMVCRAxbWnQ+algnz8qRdx7wP78OgTL+DQkeNYWFgmWpRKRZQG6hjcsBXl+hhKtUEk0vQkokolSwNmum2kva5OONmMIdOEVfI+5qYWS34mZlJcuXpgrmt97VD+SLVUF/QOCnHsJpQyPxDLPDagMGZr7qktQXVU9aQ9PTPbkkBwacEl+pBmtRqm3ZVGwuHFDg4cW8B39gKVQiK5pojdUzVcu7WOrRKg6E1yz+sChEp1zLCRtrRoHnlsP74pLaOHH92Po9Jc7UhFqebwlipVrJ+aQGlQATCKXLlKzTl06UrUdPVq56QXeiSOUlK4uhzHJy8YKXWwhJptbOeh7ieBnshAxW76MhQwcZwLxpLHZlC/GUpjHofD+oULswj9+1GqwRSpXCRASy6ETi8JJtAJ5OV3ccmxy9JZevpIC3tfmsft0g/aNFbCjZcN4j27RjE1XnlDOud16xA1hExZRHd882Hsf+EVslbUuIySFD2l+jqplMdRGBgySjMyUdmUxIsuE+X+OQOKmpygJvfoQ/3dpqEyqZnmA9IZXCty1TeivkdZS1wPmaHvMvPi1YQIxSVRrDt7FbeoqT6kR5I8KXo9oEDe54pm6lDO/J0nvUbvU/cKmCScTJeY4QWxG5iZcsnh0qjoyvNsd3rSYRWolmK8c0sdt1w7gRsvH3aL+E0qdV8Zrm5nZxfw+S/djdvuuA+vvnqaYkGVgaoEYRzloQ0o1kbkRRl5agCwa9rPSrSp2JSITMRUoEjCK+Iq4pPoMgApoGjVKq6yIMAAyg0wZiS57o6yuieh8UxEUMs1FhBHfDXYTO/SQ+P+zOCCKDHgEZCxbipyQIQjA7VI1Fsp6RibGtPRUbO95H2zkxIT7t5cw8feuwnvuXKdjdThxzQAvTYr66t33IvP/K+7cOjwCckNEcrVQVRGNqM8MolcsaLBU51OQoTNgTpKqMvYfI0V0mB1p5rYqQVGAdKhv/1rGlxuSkp0VYrNhaQ2L2tEkBFTcWIIpvUQKXoDilr5ZA4nmiP0MLScGVygAYkT9TnDYYnfs0R/txkzyxIt/lyXb6zHl8vT6Unu7rSXJcc00Gh1iRw37xrBJz+yE1vW1X+cGFsZEDs+afrsHP7dH3wBd377h1AlS5VaDQPjOwgIxQ2KcDAloDbuTf3kvpnDpGBNfY5IzQwrDYjXIwaktEvbV2gfIzX+hv6cSLnTY5lSIXDYwZfaEDB6wwwzc6AksSO4AkNxCwFixFNMxDevU998YsSfbunVQzXNIH8zm1EE+5fo1m54HaVKVuW1tZsLaEkzfrnZxtBAHp/65V348M3bMnR+TRyy/4Wj+M3fuRXPHDiMerWM6vhWVCcuozmESqQIaI5gtsjZNPu7+DmJqdQkmKzeMCvegZFqkeNA0TuuaT/DiiRuRNzKPSFutdmJcjSoRg89cwDZFW70AVMgxFZ35HXvfGRfMwAazmJmI5nIWWyJH/YfWSPBzGAJN5Cx+2TJf11p0jeXZ9BYWpIirYtPfPBy/POPXbfSxjH9foi+OOW8/dpv/hccPzEtHaURDG16p9QTE9oSMnW4uv1MA0GSigsn3xnXjZuwBIVV4prYIAC41yGp0QWWU3ifiOJGpyHgdBE2cYJA0B29kXnZ+B5BN5VNYtGQTWMyE+g9+VeSEqhRT16ZtLSE6TWMTIuEbWyP1AqM1HsUSDzYiknt7qC5RLj5v/a3Y2l5jslnJIDz0/jcXXuxsNjA733yvfr8tLJeyexlNAr8n/z2n0gwzmB4fCOGt14nLaYyyXZ9pVzrCdt4aVKsWrTofT+4MGLGcYZwXKHFUGp0g+EC7u8tOL4uy48Z7ztVg0rkfAttzdiVafoHw8Z1+OoiZowLRURFQJEyPQBT6jhrE3EJlFCiym4IoJYhSzX3RcZEthuSxWbbJcZcPzD5WsHU7XyxDlaXJnPvKG779l7UyjF+61d/LqNOMoD0pNz+1//+c3jp0FGMbdiCse3Xyx/KOzD87jc8IJZtR0q9aOJZQOh5q6i55wbNMWkgluz3ZCtNXA2PvTKnE7Pjr7mlv3veoyC8nW8K7uRvM5vcUkdqZL8kqBrjJOzYlZRmeDA72lYRXBkwChDyb7ie5cUjvzOc+/3Ina/dDyXJl1Ad3oxu+yD+7KsP4aptY/jATTtXBuT2ux7A3T/Yg9Hx9RjZei2Ze1za2Cwzyjv1LctB4awQoczvGXPU9pgHylwYUeSUuwaI+wJck6Y1QHLR750aNjd4GMvOOouC9bGREOZ9lj+suOXZyhVFZMUjSgwx5vLbuvBFd//CKGsSSbHuBhYKudjsFMcZiSXXA9+3/4nR9GTl1Ue3orHwJP7r5+7BDe+YwkC5kM2pN5otfPYvvoVSuYThLdeQ9UHK23bCOttfmFWdGtHiTViyjpQPwbUvIXrapCVLqqcDgtbM5WlqCJ+6hhntqfMA7BAEZIsZ3CX6nnbBhLf4RGBkwBdA+IJrOG4mveX2KeFOh+nz0tdG1l9Pi1rtJ+nrUL4TPa+swp5+n5pNnKrHPX2d6vuRpr4tQqWoi1VU62N47vlX8PV7nnSK0QFy/0NP44D0vMc3X4VcqUacIWxnrBU/4G6l8/BEU+MzBEBYwqf25K0jaH0OYcImToHb39AxKlcJL4QnPBN9BBbBHiPZLV7cUJmVQkAsGORv64QdCFacmusKdZsFKE2NE5uSacvtvfGvFDB6cRl9yYNFZ0th5XuLtXVQQZi7vvs4qQsa3mx5/+4f7JVOXhXl0U1EVK+0U1dVbr/NrSRrpZDs96arFlnc+yGpD5+IQM84MzZT9GZ+w3GGCDQEsg6V1SVkaMRBP7recpWcQ/s9NGBReIPEzFJRIioWzFyTnmIjuB9K4/xqBjPq3G8xo3RPLElom0lTVWDh+ur9+A5hvozZjl/onE6uUKVU9f7nj+DFl09h146NumVfxWGe2S/9jYlt5KEqJc4QhDqcY8czhHZOm8h63FY3MJhmmzT14DhQLWGMNy/sb/S1INA1cE8Ia7VYNaKHP2gCO4+dO2msna8weGfaFpg3BXSFZAQzuUASVSNBpi+n8f5UhiRYYHMLPSlPg6H8FeG1NzPWH/SUIb+OuFtQ9FrCUKwM4/jJV/HsgaMWEGBm5hxm5luojF+mvW9w59A5ruBZMERgHTnnLtViyclhG+Lgfts7xb4I9wGB7vNg5w0D4BlG6NPWZg06GZTRN8KMyiCOiP1WfE6KGSeWCz9Y2XEjN9wZ2YiMBpcz385tnWIugbB7LypQrEjVZrgw+/fCDWej3UaFcFaYWtCJVA9pr41DkkOclaX2WuqhgJL0N7gNDDpF7gN4LqYUAMG5j02JtGtCIr7+Vlt73Df2o286g/AhEG6ILEQQ62H2XKIsh9iJJ8yO/xNuccKO52DWEbSizc5NQcaPEjYeZgY+ag6yXcGR5nbLkQxBq4O+RhV2MZsyEJMzY/WZEaiw89H9YtPLKZK0U2aw8plmZuc9IEoxR4UBitHwwOJggnsdImynUug39Aw4Ggwe6A8R7EtkTz4S2TYDr4m5i9j2x9T6J5JGgehynrpxHBnzToowwDD4OVxkhZnogh2WxpyUMYML7FwJRdnIcyB9xsxEsRJEAxtRwsxN1CLpJ3TupW8zTMaCczN0YBQtZuh0ulk/RCHFuQ+ZM6d8hbeyVE7CmLrePNSmrgckdas/Y4IK4YSQCHyOcOWIvh3a+gpMz3PU/e47DOG8LGHfL1gwUDNykyLCDSq1KLPna3iUab0SWVVECjlyvfO2KV7jocK7FB3RPxUzozd8aMlbBcKdoNJTltusCHSAqICcqswQRpaTfIT3O6T94EQVM2ac9bZ5ELUlYEKvOmhP61fiFwKi34C1fkZ0oW5l0W94nT+QRosbLUbcdCG6FjWmVDjFTk4sbepiYlOGU7S15O1rF41wGgU+fGOA4i5io4EM740poR/1+VaJrTZXoWUtX3lg8RifgAsfNLReuLXXUyOubH5DpM5dEH2EcfLcEOc8AtpZJUygf4ejC6Y8LesHphQLgnXsQp8hsRPReyMlki07uHkpIcfZnL5lqjDexghTYeJo3EQMaDat4Tiy0Ez6Wy1ud+2COWPJ5uI1ICr8LL+gx1MXq9LtYF40Wc/c6g/rzGnnz5q8XR2fEiwIsqGP4Fohc5HdqRMXnHn1Om/ivLynGZoZJM7s1zORAUD7LpGzAp0tJwI722REyaoU+v1EYh4hnMipB9xEWgzaIBuYM0aYibUJQ8ey2deRACkUEuSSmPLBAO9rjtE6w4kqK8asxy5CC6trWC8y8jsIsWaigiKTJo5C4rEsGOQT/Bg2EVkWdOOqLZOw8J3mSSu+/EwoZCxAUtrcBoqjgKuQ8adUfkdFiUlj8IgqVwQBk2rOiKxxaBeonkRk9ydVn1Tb+CkrtVhMPCCVchHlYgHLC5yUVOgx20AgD8sxraji3vdwKVkSH4pV/Rx3D4dfZaRILyhUvO5gP+kqwSAO5rkma5IyE0QVVmCJcDNRE8sLiis0wWNzpJo7hPVzLC3NY5aZo05OuJpKNFSvhoAUMDxYwam5ebfZSZh+FYGDCOE5g9sAowEMxjuH8lwZdyzMnPzNxqJYsPJE/6xkgdekRFhAwmxAWKzAkedLRbvq9eRSo2rtCTEfP/M5GRHkcFKvA7m8Zq632RB07WZ+pJQmkVnkPlvAYed7qb21lLsxPjbko70q17xutG5mf5iwiOjzxIMoqNMnPCjFCQKONm5lRiYEO3H6AoWLMeMltN28ORGsWKc3uC/MEGn24KYsyZn7oUOc+uh1arOn2QUt+jbO7LQXaeD/5IYRC4g+me1TwzR4PjLtyD7pZAEyIIVV5NwDBR4ofeF7/2zslgrbyDn0OzxTyCjMdJpUMBOvHS3uclFeZ7FwGMQKbMHCvXUD540LH0Jh5AKk2hQ2UWCEBRqmKIPzjgOGuyhFkPcJBkNnk3r6d5oLsxiU0mn71vUIUlrAL/7cNozUpR5p9rSIsdaVITqMaPJEF+YE9YoJwXKByEyklmfWJ4focwQF3gjbMLxeg0ycl0W0eRZmsnqMh+EdX+QH7ithrP50RyApHHAitUazH+ppnEuVpGoszGH6xFF89JZ3Y50RWZmqk/2HTuPWLz2Kh/YckbKtgVzsRRJsvoNYlWuLKjXFbKo2V64UAkfVRlFlRmKqNDQL2DCHuuc2FM28ORlm9F4bDHoAvwhKQ5ktdDB5cr0hMXNVJzb/HpmSIcFit3uCy83bb2fBhgB2ATLhCjVEquuRyYeQIj/Ol6jyXpVHqU0vmakFoyPSu8qocIoqQVLNqLMnX0Gpdxq/8fdvxif/0S3S0s1duAzoe48cwuf+6jE8+dRB+cMN5BOmZWNgUQnjd1BhGxW3dWhVkKWhSmhYYspkfCWIdd507Cd6E/YT83b8GwDE1nBRmRDtexFldpfu51qfoxFeb/ZUCWlbBxfl9caqBSJfkYCUqE/Fl7HmqE1COnuUqJs7cxo5Po+Pvv9yfOrXPti/6Vg/IN4HUD7Jtx44iC9+7RE88/SLSFsLSKLUSCBjYVE2sE3hYxs2YaZqXTXDRK4lAKYKxAOixGKEMPfMXp/eYDqH4Yfvx25jFwpTREENLrOPI187RZUjzJxXbM4xdFzCYg5bfWkLM/RCpOuWzylAkkLFAGK4RFVKSiDUYlAbJC8uzqOU4/jQ+y7Hr3/sfbhi69gbKyVtSWDuefQV3P6dJ7D3ieewdOY4WG+ZHEXtQHWJO7KA5DwgUeQKxlyPhgHEbUj/ZgGJTJGB4Q5ywtjrASQKDALmBitnnEC6XlMzRtGJFi1GkgoWkMIAgaL6WhSIqqS0LV8fGx/CLe/bjY9/+BrsnBx84x1UIZnU6Tx6YAbfePBF/HDPAZw6egSduRPoLp1Bt72kt9xWYkKVadLuzokpu/SNM1nR5YvY2OsccUGZVkSZ1gJdrKYjBOQLRDAizLzPPGYhIOG2fCzKhvr7wRA+qEqimyRDi0QX9a3kSrqNToIi5OPCQB07dmzGLT9/BT5883ZsHHpNTaVvrKXt8HQLDzwzjYf3HcPBQ6/g3KlX0Jw5itbcKdqjXBWYqZJLUnaqqylJTIwoEDFvAhARWWczyhCUOAVWZL0+QLxzyV3A0mdJU12sQbrDiOlug/5WRdrF6jBy9Qnk6+swPjGBa6+cxC9ctwk37BzBQOF1Xdub6zFUuxzse2UBe16Yw9Mvz+PUmTm0pCnXW55FW9rXLXk0FxbQaTSkA9SmRJiuz2TEOUQcu2WF9er/f2CwMFAXAByWktoAnxNjseukos9EWUD80P4QCO1rqOoYiuUxHYTNFYvIl8rIVWqIy4NIKoOo1yU3bBzEdZeP4ubLh6gX8aI3fS40utTqte/IAg6dXsbZxS45mjFUb3gLaXMZ7eVFNBcXsHxuHo3FRbSWltFsqN7CNm0Q3OulLt0bKthw2yJhNhjWxI39Ri0BICJiXkRaiwr+OfqeyLYVRKYPJKIAqxo8kCvkaV/DgiJ+RW8JGxdKYNJ6SmnL2AS1cg5TYxW8Y2oA12wfxpZ15dfN6W8hIFml3JGEPXqmgYPHF/DydAOnF7podAXlXIqFBIW8vHC12aNSklIEKCtEbRDclpzUIJDk/bLaL11VjTcpvdluttDtprRrWq/T9fOwwDK9g/ZeVa6rLfoKhQK1IhSKBfm7BbrPl/Iolku0F5ba+Cuv2qTzuhVB1fKqeEUvZWhLCdDqcBp6k48Ehqs5bB0r4fKNNamcaz/xhs9VaYumqsh2D6fnWzgpj9Pn2phd6qLZ4zrzKUHKS3RUb2I+r1dpEhvnzehZqnlyhWYpTX1IOb/AxiBB6D7Wq9821eg0rpnZK7+j0+U05rwtz6/V7hEACnTlc6jRsYOlHNYPFTA5UqJjdFCas+wtnY3yVgIizi9sC8KxS+0Ui60ezjV6WGh3sSz/bvUEOnI1doWfKqojsmYL7iBWcmHp4EPmtoLEDSQP5veqZ1SmTw1Jy0vgKnmGajGHoYo68qhJMAoXHOH0lg0PIEAW5IPV39vnAjkQJR7acvV2JTgtyUUddSiQUv1aT5jhZS6aLwL/wS+CKNjkXrW55xQnqh09aXAyo6H7dK9EZxRjjdwWVT5kWjnmFxsKm4rKGaIhf3HP5SLd5v6fAAMADrnEuvaJrDEAAAAASUVORK5CYII='/></div><div class='bubble bubble-"+(msg.history[k].username==username?'right':'left')+"'><b>"+(msg.history[k].username==username?'Me':msg.history[k].username)+"</b><br>"+msg.history[k].message+"<br>"+moment(d).format("lll")+"</div></div>";
		 	 }
			 $('#viewport-content').html(messageslist);  
		}
		}); 		
		socket.emit('get_history',{"channel":''+channel+'',"command":"gethistory","depth":100,"id":"adv","type":"command"});
		$('#chatform').submit(function(){
			var d = new Date();
			var n = d.getTime();  
			console.log(channel);
			socket.emit('message',{"channel":channel,"id":''+n+'',"isinternal":"N","message":''+$('#m').val()+'',"timestamp":n,"type":"message"});
			$('#m').val(''); 
			return false;
      });
	 $('#acceptpo').click(function(){ 
	 if($('#acceptpo').val()=="Accept PO"){
	 $.ajax({type: "POST",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox/accepted/"+mailid
			 ,contentType:'application/json'
			 ,headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
			 'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){ 
			 console.log(data);
			 $('#acceptpo').val("Reject PO");
			 }}); }else{
			 $.ajax({type: "POST",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox/rejected/"+mailid
			 ,contentType:'application/json'
			 ,headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
			 'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){ 
			 console.log(data);
			  $('#acceptpo').val("Accept PO");
			 }});
			 } });
	  setInterval(function(){
		socket.emit('get_history',{"channel":''+channel+'',"command":"gethistory","depth":100,"id":"adv","type":"command"})}
		, 3000);
					},
                    error: function (err) {
                    console.log(err);
                     
           }
        });
    });
}); 
    </script>
                    <!-- footer content -->
             <footer>
                    <div class="">
                        <p class="pull-right">
                             <a href="index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
                    
                </div>
                <!-- /page content -->
            </div>

        </div>

       

        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>
		<script src="js/jquery.formatCurrency-1.4.0.min.js"></script>
        <script src="js/custom.js"></script>
         <!-- Datatables -->
        <script type="text/javascript" src="../js/application/custom.js"></script>
        <script type="text/javascript" src="../js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
        <script>
		var channel="";
          $(document).ready(function(){
            var po_id = "<?php echo $_GET['id']; ?>";
            var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
            spiderG.getLoginToken(username, function()
            {
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({type:"GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/purchaseorder/"+po_id,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){ 
                       people = data; 
                       channel=people.channel; 	 
					    $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox/po/"+people.id,contentType:'application/json',headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success:function (data){
						mailboxlist = data; 
						 
							mailid=mailboxlist.id;
						      if(mailboxlist.accepted=="Y"){
							  $('#acceptpo').val("Reject PO");
							  }else
							  {
							  $('#acceptpo').val("Accept PO");
							  }
							 
				}}) 
                        $("#doc_no").html(people.documentno);
                        var currdate = new Date(people.issuedate * 1000);
                        var finl_date = currdate.getDate() + '/' + (currdate.getMonth() + 1) + '/' + currdate.getFullYear();
                        $("#issuedate").html(finl_date);

                     	$("#notes").html(people.notes);
                     	$("#term").html(people.paymentterms);
                        $("#currency").html(people.currency); 
                        if(people.lineitems[0]){  
						$("#quantity").html(people.lineitems[0].quantity);  
						$("#rate").html(people.lineitems[0].price); 
						$("#netamount").html(people.grandtotal-people.lineitems[0].taxamt);
						$("#totalamount").html(people.grandtotal); 
						$("#taxamount").html(people.lineitems[0].taxamt); 
	 $.ajax({type: "GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/tax/"+people.lineitems[0].tax,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (peopletax){
		    $("#tax").html(peopletax.name+"("+peopletax.rate+"%)");
	 }});
	$('#rate').formatCurrency();
	$('#taxamount').formatCurrency();
	$('#totalamount').formatCurrency();
	$('#netamount').formatCurrency(); }
                        
                       	getorgname(people.bpartner);
                        getdeliveryloc(people.deliverylocation);
                        if(people.lineitems[0]){ getproname(people.lineitems[0].product) }
                        if(people.lineitems[0]){ getuom(people.lineitems[0].uom); }
                        $("#cstmlink").append("<a href='create_invoice.php?id="+po_id+"' class='btn btn-primary'>Send Invoice</a>");
                    },
                    error: function (err) {
                    console.log(err);
                     
                    }
                });
            });

            function getorgname(org)
            {
                var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
           
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({
                    type: "GET",
                    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?extensionid=7D6AACFA15614E1CBE3626B7513191F0&orgid="+org,
                    contentType:'application/json',
                    headers: { 
                            'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                            'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                        },
                    success: function (data)
                    {
                        //console.log(data);
                       people1 = data; 
                       $("#bpartner").html(people1.name);
                    },
                    error: function (err) {
                    console.log(err);
                     
                    }
                });
            }

            function getdeliveryloc(delivryloc)
            {
                var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
           
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({
                    type: "GET",
                    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/"+delivryloc,
                    contentType:'application/json',
                    headers: { 
                            'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                            'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                        },
                    success: function (data)
                    {
                        //console.log(data);
                       people1 = data; 
                       $("#deliveryloc1").html(people1.addressline1);
                       $("#deliveryloc2").html(people1.addressline2);
                       $("#deliveryloc3").html(people1.postalcode);
                       $("#deliveryloc4").html(people1.city);
                       $("#deliveryloc5").html(people1.region);
                       $("#deliveryloc6").html(people1.country);
                    },
                    error: function (err) {
                    console.log(err);
                     
                    }
                });
            }
            
            function getproname(product)
            {
                var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
           
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({
                    type: "GET",
                    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+product,
                    contentType:'application/json',
                    headers: { 
                            'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                            'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                        },
                    success: function (data)
                    {
                       people1 = data; 
                       $("#product").html(people1.name);
					    
							categoryname=$.grep(categorylistparsed,function (category){return category.id == people1.category_id })[0].name; 
						 
                       $("#category").html(categoryname);
                    },
                    error: function (err) {
                    console.log(err);
                     
                    }
                });
            }

            function getuom(uomid)
            {
                var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
           
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({
                    type: "GET",
                    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom/"+uomid,
                    contentType:'application/json',
                    headers: { 
                            'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                            'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                        },
                    success: function (data)
                    {
                        //console.log(data);
                       people1 = data; 
                       $("#uom").html(people1.name);
                    },
                    error: function (err) {
                    console.log(err);
                     
                    }
                });

            }
        });
        </script> 
		<style>
	#browser-window{background: url("../images/background.png") ;height: 538px;width: 335px;padding:65px 11px 10px 17px;margin: auto;position:relative;}
#viewport{overflow:scroll;height: 420px;}
#viewport-content{position: relative;bottom: -8px;padding-right:5px;}
.row-chat{position:absolute;bottom: 20px;margin: 0;width: 313px;}
.bubble-container{display:block;clear: both;position:relative;margin-bottom:10px;min-height: 53px;}
.avatar{border: 2px solid #ffffff;box-sizing: initial;box-shadow: 0 1px 3px rgba(0,0,0,0.15);}
.avatar,.avatar img{width: 50px;height: 50px;-webkit-border-radius: 30px;border-radius: 30px;}
.bubble{padding: 13px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;background: rgba(255, 255, 255, 0.9);color: #575858;box-shadow: 0 1px 3px rgba(0,0,0,0.15);}
.avatar-left:before {content: '';position: absolute;border-style: solid;border-width: 10px 14px 10px 0;border-color: transparent #ffffff;display: block;width: 0;z-index: 1;left: 61px;top: 13px;}
.avatar-right:before {content: '';position: absolute;border-style: solid;border-width: 10px 0 10px 14px;border-color: transparent #ffffff;display: block;width: 0;z-index: 1;right: 61px;top: 13px;}
/* Positionning of the avatar and the bubble */
.avatar-left{float: left;width: 50px;}
.bubble-left{overflow: hidden;margin-left: 75px;}
.avatar-right{float: right;width: 50px;}
.bubble-right{overflow: hidden;margin-right: 75px;}
		</style>   
<?php  include('loader.php');?>
</body>

</html>