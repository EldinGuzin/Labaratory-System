<?php
// Include the TestResultsDao class
require_once __DIR__ . "/rest/dao/TestResultsDao.class.php";

// Create an instance of the TestResultsDao class
$testResultsDao = new TestResultsDao("test_results");

// Fetch test results from the database
$results = $testResultsDao->getAll(1); // Assuming this method fetches all test results

// Prepare an array to hold the results
$data = [];

// Loop through the results and format them
foreach ($results as $result) {
    $formattedResult = [
        "name" => $result["name"],
        "surname" => $result["surname"],
        "username" => $result["username"],
        "hemoglobin" => $result["hemoglobin"],
        "rbc_count" => $result["rbc_count"],
        "pcv" => $result["pcv"],
        "mcv" => $result["mcv"],
        "tlc" => $result["tlc"],
        "neutrophils" => $result["neutrophils"],
        "lymphocytes" => $result["lymphocytes"],
        "monocytes" => $result["monocytes"],
        "eosinophils" => $result["eosinophils"],
        "basophils" => $result["basophils"],
        "additional_note" => $result["additional_note"]
    ];

    // Add the formatted result to the data array
    $data[] = $formattedResult;
}

// Send JSON response
header("Content-Type: application/json");
echo json_encode($data);
?>
