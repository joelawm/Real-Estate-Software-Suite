<?php
// Include config file
require_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");

//Intialize these variables to be empty
$username = $password = $confirm_password = $email = $firstname = $lastname = "";
$username_err = $password_err = $confirm_password_err = $email_err = $firstname_err = $lastname_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
     /*
     Username Section
     */
     // Validate username
     if(empty(trim($_POST["username"])))
     {
          $username_err = "Please enter a username.";
     }

     //Username has been entered correctly
     else
     {
          // Prepare a select statement
          $sql = "SELECT UserId FROM User WHERE Username = ?";

          if($stmt = mysqli_prepare($link, $sql))
          {
               // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt, "s", $param_username);

               // Set parameters
               $param_username = trim($_POST["username"]);

               // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt))
               {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                         $username_err = "This username is already taken.";
                    }
                    else
                    {
                         $username = trim($_POST["username"]);
                    }
               }
               else
               {
                    echo "Oops! Something went wrong. Please try again later.";
               }
          }
          // Close statement
          mysqli_stmt_close($stmt);
     }
     /*
     email Section
     */
     // Validate email
     if(empty(trim($_POST["email"])))
     {
          $email_err = "Please enter a email address.";
     }

     //email has been entered correctly
     else
     {
          // Prepare a select statement
          $sql = "SELECT UserId FROM User WHERE Email = ?";

          if($stmt = mysqli_prepare($link, $sql))
          {
               // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt, "s", $param_email);

               // Set parameters
               $param_email = trim($_POST["email"]);

               // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt))
               {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                         $email_err = "This email address is already taken.";
                    }
                    else
                    {
                         $email = trim($_POST["email"]);
                    }
               }
               else
               {
                    echo "Oops! Something went wrong. Please try again later.";
               }
          }
          // Close statement
          mysqli_stmt_close($stmt);
     }
     /*
     First name Section
     */
     // Validate firstname
     if(empty(trim($_POST["firstname"])))
     {
          $firstname_err = "Please enter a first name.";
     }

     //firstname has been entered correctly
     else
     {
          // Prepare a select statement
          $sql = "SELECT UserId FROM User WHERE Firstname = ?";

          if($stmt = mysqli_prepare($link, $sql))
          {
               // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt, "s", $param_firstname);

               // Set parameters
               $param_firstname = trim($_POST["firstname"]);

               // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt))
               {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    $firstname = trim($_POST["firstname"]);
               }
               else
               {
                    echo "Oops! Something went wrong. Please try again later.";
               }
          }
          // Close statement
          mysqli_stmt_close($stmt);
     }
     /*
     Last Name Section
     */
     // Validate lastname
     if(empty(trim($_POST["lastname"])))
     {
          $lastname_err = "Please enter a first name.";
     }

     //firstname has been entered correctly
     else
     {
          // Prepare a select statement
          $sql = "SELECT UserId FROM User WHERE Lastname = ?";

          if($stmt = mysqli_prepare($link, $sql))
          {
               // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt, "s", $param_lastname);

               // Set parameters
               $param_lastname = trim($_POST["lastname"]);

               // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt))
               {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    $lastname = trim($_POST["lastname"]);
               }
               else
               {
                    echo "Oops! Something went wrong. Please try again later.";
               }
          }
          // Close statement
          mysqli_stmt_close($stmt);
     }
     /*
     Password Section
     */
     // Validate password
     if(empty(trim($_POST["password"])))
     {
          $password_err = "Please enter a password.";
     }
     elseif(strlen(trim($_POST["password"])) < 6)
     {
          $password_err = "Password must have atleast 6 characters.";
     }
     else
     {
          $password = trim($_POST["password"]);
     }
     // Validate confirm password
     if(empty(trim($_POST["confirm_password"])))
     {
          $confirm_password_err = "Please confirm password.";
     }
     else
     {
          $confirm_password = trim($_POST["confirm_password"]);
          if(empty($password_err) && ($password != $confirm_password))
          {
               $confirm_password_err = "Password did not match.";
          }
     }

     /*
     Database section
     */
     // Check input errors before inserting in database
     if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($firstname_err) && empty($lastname_err))
     {
          // Prepare an insert statement
          $sql = "INSERT INTO User (Username, Password, Email, Firstname, Lastname) VALUES (?, ?, ?, ?, ?)";
          if($stmt = mysqli_prepare($link, $sql))
          {
               // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_email, $param_firstname, $param_lastname);
               // Set parameters
               $param_username = $username;
               $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
               $param_email = $email;
               $param_lastname = $lastname;
               $param_firstname = $firstname;
               // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: /login.php");
               }
               else
               {
                    echo "Something went wrong. Please try again later.";
               }
          }
          // Close statement
          mysqli_stmt_close($stmt);
     }

     /*
     close the connection
     */
     mysqli_close($link);
}
?>

<html>
<head>
     <title>Management Panel</title>
     <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/head.txt"); ?>
</head>
<body>
	<!--Header-->
     <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/managementheader.php"); ?>
	<div class="container-fluid">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h1 class="text-center">Add a Lease</h1>
			<h2>Address</h2>
			<div class="form-group row" <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
				<div class="col-lg-3">
					<!--Address-->
					<input type="text" name="email" class="form-control" placeholder="Address" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err; ?></span>
				</div>
				<div class="col-lg-2">
					<!--City-->
					<input type="text" name="email" class="form-control" placeholder="City" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err; ?></span>
				</div>
				<div class="col-lg-3">
					<!--Country-->
					<input type="text" name="email" class="form-control" placeholder="Country" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err; ?></span>
				</div>
				<div class="col-lg-2">
					<!--State-->
					<input type="text" name="email" class="form-control" placeholder="State" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err; ?></span>
				</div>
				<div class="col-lg-2">
					<!--Zip Code-->
					<input type="text" name="email" class="form-control" placeholder="Zip code" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err; ?></span>
				</div>
			</div>
			<div class="form-group row"<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
				<div class="col-lg-2">
					<!--Type-->
					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option value="1">Fixed</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
					</select>
				</div>
				<div class="col-lg-1">
					<label class="control-label" for="date">Start Date</label>
				</div>
				<div class="col-lg-2">
					<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
				</div>
				<div class="col-lg-1">
					<label class="control-label" for="date">End Date</label>
				</div>
				<div class="col-lg-2">
					<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
				</div>
			</div>
			<hr/>
			<h2>Tenants</h2>
			<div class="col-lg-12">
				<div id="field">
					<div id="field0">
						<!-- Select-->
						<div class="form-group row">
							<label class="col-lg-1 control-label" for="action_id">Select Name</label>
							<div class="col-lg-4">
								<input id="action_id" name="action_id" type="text" placeholder="" class="form-control input-lg">
							</div>
						</div>
					</div>
				</div>
				<!-- Button -->
				<div class="form-group">
					<div class="col-lg-4">
						<button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
					</div>
				</div>
			</div>
			<hr/>
			<h2>Charges</h2>
			<div class="form-group row"<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
				<div class="col-lg-1">
					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<option value="1">Monthly</option>
						<option value="2">Yearly</option>
					</select>
				</div>
				<div class="col-lg-2">
					<!--State-->
					<input type="text" name="email" class="form-control" placeholder="$0.00" value="<?php echo $email; ?>">
					<span class="help-block"><?php echo $email_err; ?></span>
				</div>
			</div>
			<hr/>
			<div class="form-group row justify-content-center">
				<div class="col-lg-2">
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			</div>
		</form>
	</div>




	<script>
	    $(document).ready(function(){
	      var date_input=$('input[name="date"]'); //our date input has the name "date"
	      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	      var options={
	        format: 'mm/dd/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
	      };
	      date_input.datepicker(options);
	    })
	    $(document).ready(function () {
		    //@naresh action dynamic childs
		    var next = 0;
		    $("#add-more").click(function(e){
		        e.preventDefault();
		        var addto = "#field" + next;
		        var addRemove = "#field" + (next);
		        next = next + 1;
		        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"<!-- Select--><div class="form-group row"><label class="col-md-1 control-label" for="action_id">Select Name</label><div class="col-md-4"><input id="action_id" name="action_id" type="text" placeholder="" class="form-control input-md"></div></div></div></div></div></div>';
		        var newInput = $(newIn);
		        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
		        var removeButton = $(removeBtn);
		        $(addto).after(newInput);
		        $(addRemove).after(removeButton);
		        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
		        $("#count").val(next);

		            $('.remove-me').click(function(e){
		                e.preventDefault();
		                var fieldNum = this.id.charAt(this.id.length-1);
		                var fieldID = "#field" + fieldNum;
		                $(this).remove();
		                $(fieldID).remove();
		            });
		    });

		});
	</script>
</body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
