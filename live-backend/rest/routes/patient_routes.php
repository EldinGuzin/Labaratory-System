<?php

require_once __DIR__ .'/../../get_patient_data.php'; 


  /**
     * @OA\Get(
     *      path="/get_patient_data.php",
     *      tags={"patients"},
     *      summary="Get patients details",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Patient details"
     *      )
     * )
     */

Flight::route('GET /get_patient_data', function() {
    
    $results = get_patient_data();

    Flight::json($results);
});



