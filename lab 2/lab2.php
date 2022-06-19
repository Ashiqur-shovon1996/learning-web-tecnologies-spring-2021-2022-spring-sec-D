<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dateofbirthErr = $genderErr= $degreeErr = "";
$name = $email = $dateofbirth = $gender = $degree = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Cannot be Empty";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Enter a valid Email";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["dateofbirth"])) {

  } else {
    $dateofbirth = $_POST["dateofbirth"];

    if(!preg_match("/_^[1-30]/",$dateofbirth)) {
      $dateofbirthErr = "";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }

  if (empty($_POST["degree"])) {
    $degree = "";
  } else {
    $degree = $_POST["degree"];
  }
}


?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <fieldset>
    <legend>Name:</legend>
     Name: <input type="text" name="name" value="<?php echo $name;?>">
     <span class="error">* <?php echo $nameErr;?></span>
     <br><br>
  </fieldset>

  <fieldset>
    <legend> Email:</legend>
     E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
</fieldset>

<fieldset>
    <legend> Date of Birth:</legend>
    Date of Birth: <input type="date"  id ="birthday" name="dateofbirth" value="<?php echo $dateofbirth;?>">
    <span class="error"><?php echo $dateofbirthErr;?></span>
    <br><br>
</fieldset> 

<fieldset>
    <legend> Gender:</legend>
  Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
</fieldset>
<fieldset>
    <legend>Degree:</legend>
     Degree: <input type="checkbox" id="degree" name="degree" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
             <input type="checkbox" id="degree" name="degree" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
             <input type="checkbox" id="degree" name="degree" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
             <input type="checkbox" id="degree" name="degree" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">MSc
             <br><br>
</fieldset>
<fieldset>
<legend>Blood Group:</legend>
  <select name="Blood" id="Blood">
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="A+">A+</option>
    <option value="AB+">AB+</option>
    <option value="B+">B+</option>
  </select>
 </fieldset>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>MY Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bloodgroup;
?>

</body>
</html>