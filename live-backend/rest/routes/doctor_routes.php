<?php

require_once __DIR__ .'/../../get_doctor_data.php'; 


/**
 * @OA\Get(
 *      path="/get_doctor_data",
 *      tags={"doctor_data"},
 *      summary="Get doctor data",
 *      description="Retrieves data of doctors.",
 *      @OA\Response(
 *           response=200,
 *           description="Successful response",
 *           @OA\JsonContent(
 *               type="object",
 *               @OA\Property(
 *                   property="doctors",
 *                   type="array",
 *                   @OA\Items(
 *                       type="object",
 *                       @OA\Property(property="id", type="integer", description="The ID of the doctor"),
 *                       @OA\Property(property="name", type="string", description="The name of the doctor"),
 *                       @OA\Property(property="specialty", type="string", description="The specialty of the doctor")
 *                   )
 *               )
 *           )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Data not found",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="message", type="string", example="Data not found")
 *          )
 *      ),
 *      security={{"ApiKey": {}}}
 * )
 */



Flight::route('GET /get_doctor_data', function() {
    
    $results = get_doctor_data();
    
    Flight::json($results);
});