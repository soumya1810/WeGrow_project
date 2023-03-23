<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Job-Seeker Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  
  <form>
    <div class="container" style="margin: auto; margin-top: 900px;">
      <h1 style="text-align: center;font-size: 2.3rem; font-weight: 700;text-shadow: 1px 1px 2px white;, 0 0 1em white, 0 0 0.2em light-grey;"><img  src="icons8-natural-food-96.png" alt="icons8-natural-food-96.png"> We-Grow</h1>
      <br>
      <h2 style="text-align: center;text-shadow: 1px 1px 2px white, 0 0 1em blue, 0 0 0.2em light-grey;">Registration form for job-seekers</h2>

        <p style="text-align: center;color: rgb(39, 22, 55);">Please fill in this form to register as a job-seeker.</p>

          <!-- ----------------- -->
          <label for="name"><b>Name</b></label><br><br>
          <input type="text" name="name" placeholder="Enter your name" required>
          <label for="email"><b>Username</b></label><br><br>
          <input type="text" name="username" placeholder="Enter a valid Username" required><br>
          <label for="email"><b>Email</b></label><br><br>
          <input type="text" placeholder="Enter Email" name="email" required><br>

          <label for="psw"><b>Password</b></label><br><br>
          <input type="password" placeholder="Enter Password" name="psw" required><br>

          <label for="email"><b>Phone Number</b></label><br><br>
          <br>
          <select name="phoneCode" required><br><br>
            <option selected hidden value="" style="width: 20px;">code</option>
            <option value="66">+91</option>

          </select>
          <input type="phone" name="phone" placeholder="812345678" required>
<br>
          <label for="address"><b>Address</b></label><br><br>

          <input type="text" name="address" placeholder="Enter Address" required>
          <label for="city">City</label><br><br>
          <input type="text" name="city" size="30" maxlength="30" placeholder="Enter your city name" />
          <label for="state">State</label><br><br>
          <input type="text" name="state" size="30" maxlength="30" placeholder="Enter your state name" />
          <label for="pincode">Pincode</label><br><br>
          <input type="text" name="pincode" pattern="[0-9]{6}" maxlength="6" placeholder="Enter your pincode" />
          <label for="experience">Past Work Experiences</label><br><br><br>
          <textarea rows="10" cols="126" id="experience" name="experience">
          </textarea>
<br><br>
          <label for="skills">Skills</label><br><br>
          <br>
          <textarea rows="4" cols="126" id="skills" name="skills" placeholder="Enter your skills">
          </textarea><br><br>
          <select class="select-style gender" name="gender">
            <option value="select" style="font-family: 'Montserrat', sans-serif;">Gender</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="others">Other</option>
            </select>
            <br>

            <label for="aadhar">Aadhar Card Number:</label><br><br>
    <input type="text" name="aadhar" placeholder="Enter your Aadhar Card Number" required><br><br>
    <input type="submit" value="Submit">
    <form action="/upload" method="post" enctype="multipart/form-data">
      <input type="file" name="uploadFile" />
      <input type="submit" value="Upload File" />
  </form><br><br>
  <p style="color: rgb(3, 6, 18); font-size: medium; font-weight: 500;">Upload your mandatory govt documents for verification(Passport, PAN Card/ e-PAN, Voter ID/ e-Voter ID, Driving License)*</p><br><br>

          <p>By registering as an job-seeker account you agree to our <a href="#" style="color:rgb(34, 71, 108)">Terms &
              Privacy</a>.</p><br><br>

          <div class="clearfix">

          <a href="C:\xampp\htdocs\ip_front\Dashboard-WeGrow\index (Applicant).html">  <button type="button" class="btn" style="color: black; font-weight: 600;box-shadow: rgba(18, 6, 6, 0.8) 0px 10px 10px, rgba(221, 221, 221, 0.952) 0px 10px 10px;border: 1px black solid;">Register</button></a>
          </div>
    </div>
  </form>



  </div>

</body>

</html>