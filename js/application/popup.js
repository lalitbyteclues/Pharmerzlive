
/*$(function(){
	$('#register-form-link').click(function (event) {
		event.preventDefault();		
    var popup = window.open($(this).prop('href'), "", "width=600,height=600,scrollbars=yes");
    document.spiderg_register.spiderg_username.value
		document.spiderg_register.spiderg_password.value
    popup.focus();

    $(window).bind("beforeunload", function() { 
    return confirm("Do you really want to close?"); 
		})
    // document.spiderg_register.submit();
    someFunctionToCallWhenPopUpCloses(popup);
	});

	function someFunctionToCallWhenPopUpCloses(popup) {
	    window.setTimeout(function() {
	        if (popup.closed) {
	            alert("Pop-up definitely closed");
	        }
	    }, 1);
	};

	
});*/