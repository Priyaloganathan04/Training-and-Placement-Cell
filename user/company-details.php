<?php
session_start();
require_once("../db.php");

// Check if the company ID is provided in the URL
if (isset($_GET['id'])) {
  $companyId = $_GET['id'];

  // Fetch the company details from the database
  $sql = "SELECT * FROM company WHERE id_company='$companyId'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $companyName = isset($row['companyname']) ? $row['companyname'] : '';
    $city = isset($row['city']) ? $row['city'] : '';

    // Fetch additional details from the job_post table
    $jobPostSql = "SELECT * FROM job_post WHERE id_company='$companyId'";
    $jobPostResult = $conn->query($jobPostSql);

    // Display the company details
    echo "<h2>company Details</h2>";
    echo "<p><strong>company Name:</strong> $companyName</p>";
    echo "<p><strong>City:</strong> $city</p>";

    // Display job details if available
    if ($jobPostResult->num_rows > 0) {
      echo "<h3>Job Details</h3>";
      while ($jobPostRow = $jobPostResult->fetch_assoc()) {
        $jobTitle = isset($jobPostRow['jobtitle']) ? $jobPostRow['jobtitle'] : '';
        $role = isset($jobPostRow['role']) ? $jobPostRow['role'] : '';
        $ctc = isset($jobPostRow['ctc']) ? $jobPostRow['ctc'] : '';
        $minimumSalary = isset($jobPostRow['minimumsalary']) ? $jobPostRow['minimumsalary'] : '';
        $maximumSalary = isset($jobPostRow['maximumsalary']) ? $jobPostRow['maximumsalary'] : '';

        echo "<h4>Job Title: $jobTitle</h4>";
        echo "<p><strong>role:</strong> $role</p>";
        echo "<p><strong>CTC:</strong> $ctc</p>";
        echo "<p><strong>Minimum Salary:</strong> $minimumSalary</p>";
        echo "<p><strong>Maximum Salary:</strong> $maximumSalary</p>";
      }
    } else {
      echo "No job details available.";
    }

  } else {
    echo "company not found.";
  }

  $conn->close();
} else {
  echo "Invalid company ID.";
}
?>
