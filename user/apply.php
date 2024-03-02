<?php
session_start();

if (empty($_SESSION['id_user'])||($_SESSION['id_jobpost'])) {
  
}

require_once("db.php");

if (isset($_GET['id'])) {
  $jobPostId = $_SESSION['id_jobpost'];
  $userId = $_SESSION['id_user'];

  // Fetch the data from job_post table
  $jobPostSql = "SELECT * FROM job_post WHERE id_jobpost = '$jobPostId'";
  $jobPostResult = $conn->query($jobPostSql);
  $jobPostRow = $jobPostResult->fetch_assoc();

  // Fetch the data from company table
  $companyId = $jobPostRow['id_company'];
  $companySql = "SELECT * FROM company WHERE id_company = '$companyId'";
  $companyResult = $conn->query($companySql);
  $companyRow = $companyResult->fetch_assoc();

  // Fetch the data from users table
  $userSql = "SELECT * FROM users WHERE id_user = '$userId'";
  $userResult = $conn->query($userSql);
  $userRow = $userResult->fetch_assoc();

  // Store the data in apply_job_post table
  $applySql = "INSERT INTO apply_job_post (id_jobpost, id_company, id_user) VALUES ('$jobPostId', '$companyId', '$userId')";
  if($conn->query($applySql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error";
}
}

$conn->close();
?>
