<?php

require_once __DIR__ .'/../../get_test_results.php'; 
require_once __DIR__ .'/../../submit_blood_test.php';


 /**
     * @OA\Get(
     *      path="/get_test_results.php",
     *      tags={"test_results"},
     *      summary="Get patients details",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="test_results"
     *      )
     * )
     */

Flight::route('GET /test-results', function() {
    

    $results = get_test_results();

    
    Flight::json($results);
});



/**
 * @OA\Post(
 *      path="/submit_blood_test.php",
 *      tags={"blood_tests"},
 *      summary="Submit a blood test",
 *      description="Endpoint to submit a blood test.",
 *      @OA\Response(
 *           response=200,
 *           description="Success message",
 *           @OA\JsonContent(
 *               type="object",
 *               @OA\Property(property="success", type="boolean", example=true),
 *               @OA\Property(property="message", type="string", example="Blood test submitted successfully")
 *           )
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Server Error",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="success", type="boolean", example=false),
 *              @OA\Property(property="message", type="string", example="Internal server error occurred")
 *          )
 *      ),
 *      @OA\RequestBody(
 *          description="Blood test data payload",
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name","surname","username","hemoglobin","rbcCount","pcv","mcv","tlc","neutrophils","lymphocytes","monocytes","eosinophils","basophils","additionalNote"},
 *              @OA\Property(property="name", type="string"),
 *              @OA\Property(property="surname", type="string"),
 *              @OA\Property(property="username", type="string"),
 *              @OA\Property(property="hemoglobin", type="number", format="float"),
 *              @OA\Property(property="rbcCount", type="number", format="float"),
 *              @OA\Property(property="pcv", type="number", format="float"),
 *              @OA\Property(property="mcv", type="number", format="float"),
 *              @OA\Property(property="tlc", type="number", format="float"),
 *              @OA\Property(property="neutrophils", type="number", format="float"),
 *              @OA\Property(property="lymphocytes", type="number", format="float"),
 *              @OA\Property(property="monocytes", type="number", format="float"),
 *              @OA\Property(property="eosinophils", type="number", format="float"),
 *              @OA\Property(property="basophils", type="number", format="float"),
 *              @OA\Property(property="additionalNote", type="string"),
 *          )
 *      ),
 *      security={{"ApiKey": {}}}
 * )
 */
Flight::route('POST /submit_blood_test', function() {
    submit_blood_test();
});





