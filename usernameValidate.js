//$(document).ready(function(){
           // $("#usernamesignup").change(function(){
               
           function checkUser(){  
        
            var username=$("#usernamesignup").val();
 
              $.ajax({
				     
                    type:"post",
                    url:"checkUsername.php",
					
                    data:"username="+username,
					
                        success:function(data){
							
							
                        if(data>0){
							
							
							
							$("#message").html("<img src='images/cross.jpg' height=30 width=30/> Username already taken");
                            
                        }
                        else{
							
                            $("#message").html("<img src='images/tick.jpg' height=30 width=30 /> Username available");
                        }
						}
                    
                });
 
            }
			//});
			
			
			
			
			function checkPasswordStrength(){
			    
				var password1=$("#passwordsignup").val();
			    var regexstring=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
				
				if(regexstring.test(password1)){
					$("#message1").html("Password met requirements");
				}else
					$("#message1").html("Password did not meet requirements");
				
			}
			
			function checkPassword(){
				    var password1=$("#passwordsignup").val();
					var passwordconfrim=$("#passwordsignup_confirm").val();
					if(password1==passwordconfrim){
						$("#message2").html("Passwords match");
					}
					else
						$("#message2").html("Passwords don't match");
			}
//}