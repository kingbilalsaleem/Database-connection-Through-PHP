<?php
include 'connect.php';

if(isset($_POST['submit'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];

  $sql = "INSERT INTO user (fname, lname, dob, email, phoneno)
          VALUES ('$fname', '$lname', '$dob', '$email', '$phoneno')";

  if(mysqli_query($con, $sql)){
      echo "";
  } else {
      echo "Error: " . mysqli_error($con);
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Project</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="p-4">
    <div class="container">
      <div class="row">
        <!-- Form -->
        <div class="outer col-md-6">
          <div class="glass-card">
            <h2 class="text-primary">Registration Form</h2>
            <form method="Post">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name=fname autocorrect="off" required />
                </div>
                <div class="col-md-6">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control" placeholder="Enter Last Name" name=lname autocorrect="off" required />
                </div>
                <div class="col-md-12">
                  <label class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" autocorrect="off" name=dob required />
                </div>
                <div class="col-md-12">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" placeholder="Enter Email" name=email autocorrect="off" required />
                </div>
                <div class="col-md-12">
                  <label class="form-label">Phone Number</label>
                  <input type="number" class="form-control" placeholder="Enter Phone Number" name=phoneno autocorrect="off" required />
                </div>
                <div class="col-12 mt-3 d-flex gap-2">
                  <button class="btn btn-primary w-50" type="submit" name=submit>Register</button>
                  <button class="btn btn-light w-50" type="reset" style="border-radius:12px; font-weight:600;">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>

       <!-- Table -->
        <div class="col-md-6">
          <div class="d-flex justify-content-center align-items-center mb-3">
            <h3 class="fw-bold text-danger">Registered Users</h3>
          </div>
          <div class=" table-responsive table-scroll ">
            <table class="table table-bordered table-striped align-middle">
              <thead class="table-primary">
                <tr>
                  <th>Id</th>
                  <th>FName</th>
                  <th>LName</th>
                  <th>DOB</th>
                  <th>Email</th>
                  <th>PhoneNo</th>
                </tr>
              </thead>
              <?php
              $sql = "SELECT * FROM user ORDER BY id asc";
              $res=mysqli_query($con, $sql);
              
              while($row = mysqli_fetch_assoc($res)){
                echo
                '
                <style>
                  td{
                   word-wrap: break-word;
                   white-space: normal;
                  }
                </style>
                <tr class="fw-bold">
                  <td >'.$row['id'].'</td>
                  <td >'.$row['fname'].'</td>
                  <td >'.$row['lname'].'</td>
                  <td >'.$row['dob'].'</td>
                  <td >'.$row['email'].'</td>
                  <td >'.$row['phoneno'].'</td>
                </tr>';
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js" integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      gsap.from(".glass-card div",{
        opacity: 0,
        duration: 1,
        delay: 1,
        backgroundColor: "red",
        scale: 0.5,
        stagger: 0.5,
        rotate:180,
      })

      gsap.from(".table",{
        opacity: 0,
        duration: 3,
        delay: 5,
        backgroundColor: "red",
        scale: 0.5,
        rotate:180,
        backgroundColor:"black"
      })
    </script>
  </body>
</html>