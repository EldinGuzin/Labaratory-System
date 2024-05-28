<?php

require_once __DIR__ .'/../../get_forum_data.php'; 


/**
 * @OA\Get(
 *      path="/get_forum_data",
 *      tags={"forum"},
 *      summary="Get forum data",
 *      description="Endpoint to retrieve forum data.",
 *      @OA\Response(
 *           response=200,
 *           description="Successful response",
 *           @OA\JsonContent(
 *               type="object",
 *               @OA\Property(
 *                   property="forum_data",
 *                   type="array",
 *                   @OA\Items(
 *                       type="object",
 *                       @OA\Property(property="id", type="integer", description="The ID of the forum data"),
 *                       @OA\Property(property="title", type="string", description="The title of the forum data"),
 *                       @OA\Property(property="content", type="string", description="The content of the forum data")
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
Flight::route('GET /get_forum_data', function() {
    $results = get_forum_data();
    Flight::json($results);
});
