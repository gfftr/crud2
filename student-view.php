<?php
session_start();
require 'dbcon.php';
?>

<?php include('includes/header.php'); ?>


<div class="container mt-5">

 <div class="row">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     <h4>Student View Details
      <a href="index.php" class="btn btn-danger float-end">BACK</a>
     </h4>
    </div>
    <div class="card-body">

     <?php
          if (isset($_GET['id'])) {
            // echo $student_id = $_GET['id'];
            $student_id = mysqli_real_escape_string($con, $_GET['id']); // protect from sql injection
            $query = "SELECT * FROM students WHERE id='$student_id'";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
              $student = mysqli_fetch_array($query_run);

          ?>
     <!------------------------->
     <div class="mb-3">
      <label><strong> Name</strong></label>
      <p> <?= $student['name']; ?></p>
     </div>
     <div class="mb-3">
      <label><strong>Student Email</strong></label>
      <p> <?= $student['email']; ?></p>
     </div>
     <div class="mb-3">
      <label><strong>Student Phone</strong></label>
      <p> <?= $student['phone']; ?></p>
     </div>
     <div class="mb-3">
      <label><strong>Student Course</strong></label>
      <p> <?= $student['course']; ?></p>
     </div>

     <!------------------------->
     <?php


            } else {
              echo "<h4>No ID found </h4>";
            }
          }
          ?>

    </div>
   </div>
  </div>
 </div>
</div>

<?php include('includes/footer.php'); ?>