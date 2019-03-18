(function(){
	
	jQuery.validator.addMethod("onlyLetter", function(value, element) {
		if(/^[a-zA-Z\s]*$/.test(value)){
			return true;
		}else{
			return false;
		}
	}, "Please enter letters and space");


	jQuery.validator.addMethod("phoneNumber", function(value, element) {
		if(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(value)){
			return true;
		}else{
			return false;
		}
	}, "Please enter valid number");

	jQuery.validator.addMethod("mobileNumber", function(value, element) {
		if(/^(\+\d{1,3}[- ]?)?\d{10}$/.test(value)){
			return true;
		}else{
			return false;
		}
	}, "Please enter valid mobile number");


	jQuery.validator.addMethod("ime", function(value, element) {
		if(/^\d{15}(,\d{15})*$/.test(value)){
			return true;
		}else{
			return false;
		}
	}, "Please enter valid imie number");



	$( "#receipt-form" ).validate({
	rules: {
		date : {
		    required:true
		},
			time : {
		    required :true
		},
			network : {
		    required : true
		},
			version : {
		    required : true
		},
			lock_code : {
		    required :true
		},
			aces : {
		    required : true
		},
			phone_condition : {
		    required : true
		},
			sales_person: {
		    required :true,
		  	onlyLetter:true
		},
			name : {
		     required :true,
		    onlyLetter : true
		},
			home_ph:{
		     required :true,
		    number : true
		},
			mob : {
		     required :true,
		    number : true
		},
			ime:{
		    required :true,
		    ime:true
		},
			other : {
		     required : true
		},
			'repair_required[]':{
		    required : true
		},
			brand_id : {
			required : true
		}

		}
	});

}());