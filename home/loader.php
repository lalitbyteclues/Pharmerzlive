<script> 
  document.onreadystatechange = function(e)
{ 
    if (document.readyState === 'complete')
    {
      $(".se-pre-con").fadeOut("slow");
    }
};
window.onload = function(e)
{
   
};  
  </script> 
    <style type="text/css">
    .hu {background-color:#000 !important; }
	.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(../images/Preloader_2.gif) center no-repeat #fff;
}  </style>
<div class="se-pre-con"></div>