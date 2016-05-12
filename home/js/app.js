var app = angular.module('pharmerz', []); 
app.controller('testController', function ($scope, $http, $timeout) { 
 $scope.name=""; 
 if($("#Summation").is(':checked')){$scope.namereadonly=true;$scope.singletaxeshide=false;}else{$scope.namereadonly=false; $scope.singletaxeshide=true;}
 $scope.changeValue = function () { 
	   if($("#Summation").is(':checked'))
	   {  	$scope.namereadonly=true; 
			$scope.singletaxeshide=false;
	   }
	   else{ 
	   $scope.namereadonly=false;
	   $scope.singletaxeshide=true;
	   } 
   } 
   $scope.addprices=function () {  
  if($scope.name=="")
  {   $scope.name=$("#singletaxlist option:selected").text(); 
	  $scope.rate=$("#singletaxlist").val(); 
	  
  }else{ 
	 $scope.name+=" + "+$("#singletaxlist option:selected").text(); 
	  $scope.rate =parseFloat($scope.rate)+parseFloat($("#singletaxlist").val()); 	 
  }
 
 $('#singletaxlist').find('option:selected').remove().end(); 
   }
}); 