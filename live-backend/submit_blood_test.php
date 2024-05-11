<?php
// Include the TestResultsDao class
require_once __DIR__ . "/rest/dao/TestResultsDao.class.php";


function submit_blood_test(){
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Retrieve form data
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $username = $_POST["username"];
        $hemoglobin = $_POST["hemoglobin"];
        $rbcCount = $_POST["rbcCount"];
        $pcv = $_POST["pcv"];
        $mcv = $_POST["mcv"];
        $tlc = $_POST["tlc"];
        $neutrophils = $_POST["neutrophils"];
        $lymphocytes = $_POST["lymphocytes"];
        $monocytes = $_POST["monocytes"];
        $eosinophils = $_POST["eosinophils"];
        $basophils = $_POST["basophils"];
        $additionalNote = $_POST["additionalNote"];

        // Create an instance of the TestResultsDao class
        $testResultsDao = new TestResultsDao("test_results");

        // Prepare data array
        $data = [
            "name" => $name,
            "surname" => $surname,
            "username" => $username,
            "hemoglobin" => $hemoglobin,
            "rbc_count" => $rbcCount,
            "pcv" => $pcv,
            "mcv" => $mcv,
            "tlc" => $tlc,
            "neutrophils" => $neutrophils,
            "lymphocytes" => $lymphocytes,
            "monocytes" => $monocytes,
            "eosinophils" => $eosinophils,
            "basophils" => $basophils,
            "additional_note" => $additionalNote
        ];

        // Insert data into the database
        $inserted = $testResultsDao->insert($data);

        // Prepare response
        $response = [];

        if ($inserted) {
            $response["success"] = true;
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to insert data into the database.";
        }

        // Send JSON response
        header("Content-Type: application/json");
        echo json_encode($response);
    } catch (Exception $e) {
        // Log and handle any exceptions
        $errorResponse = [
            "success" => false,
            "message" => "An error occurred: " . $e->getMessage()
        ];

        header("Content-Type: application/json");
        echo json_encode($errorResponse);
    }
} else {
    // Invalid request method
    $errorResponse = [
        "success" => false,
        "message" => "Invalid request method."
    ];

    header("Content-Type: application/json");
    echo json_encode($errorResponse);
}
}

