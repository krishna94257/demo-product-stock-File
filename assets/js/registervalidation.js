$(function() {
 $("#register-form").validate({
   
    rules: {
      
      name:{
		  required:true
		  },
	user_name:{
		  required:true
		  },
      mobileno:{
		required: true,
		digits: true,
        minlength: 10,
        maxlength:10
	  },
	  contact:{
		required: true,
		digits: true,
        minlength: 10,
        maxlength:10
	  },
	  businesstype:"required",
	  country:"required",
	  state:"required",
	  
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      },
      cpassword:{
	      required:true,
	      equalTo:'#password'
	  },
	  
	  address:
	  {
	    required:true
	  },
	  telephone:
	  {
	    required:true
	  },
	 
	  bankdetail:{
	  required:true
	  },
	  acno:{
		  required:true
		  },
	  ifscno:{
		  required:true
		  },
	  branch:{
		  required:true
	  },
	  terms:{
	    required:true
	  },
	  auth:{
		  required:true
		 },
	  companyname:{
		      required:true
		  }	  
	  
    },
    // Specify validation error messages
    messages: {
      name:
      {
		  required: "Please enter your name",
		  lettersonly:"Please enter characters only"
	  },
	  mobileno:
	  {
	     required:"Please enter the mobile no",
	     digits:"please enter only digits",
	     minlength:"Please enter atleast 10 digit",
	     maxlength:"please enter only 10 digit number"
	  },
     
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      cpassword:{
		           required:"Please enter the same password again"
		        },
      email: "Please enter a valid email address",
       address:
	  {
	    required:"Please enter the address"
	  },
	  telephone:
	  {
	    required:"Please enter the telephone"
	  },
	 auth:{
		  required:"Please enter the auth distributor"
		 },
	  bankdetail:{
	  required:"Please enter the bank name"
	  },
	  acno:{
		  required:"Please enter the account number"
		  },
	  ifscno:{
		  required:"please enter the ifsc no"
		  },
	  branch:{
		  required:"Please enter the branch"
	  },
	  terms:{
	    required:"Please enter the terms and conditions"
	  },
	 companyname:{
		     required:"Please enter your company name"
		  }		 
    }
    
     
  });
});
