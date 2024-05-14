<?php
function get_test_results() {
    
    require_once __DIR__ . "/rest/dao/TestResultsDao.class.php";

    
    $testResultsDao = new TestResultsDao();

    // Fetch test results from the database
    $results = $testResultsDao->getAll(1); // Assuming this method fetches all test results (the parameter value is the id (hopefully))
    // TODO I also have to somehow make the authentication so based on the user it fetchees the specific user id for that user
    // note: I have no idea how to do that

    // Prepare an array 
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

    return $data;
}

// Call the function if the script is executed directly , I have no idea how this if statement works but I think it is checking if the file is being executed directly
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    header("Content-Type: application/json");
    echo json_encode(get_test_results());
}

