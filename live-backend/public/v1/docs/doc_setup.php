<?php

/**
 * @OA\Info(
 *   title="API",
 *   description="MeDoc API",
 *   version="1.0",
 *   @OA\Contact(
 *     email="eldin.guzin@stu.ibu.edu.ba",
 *     name="Eldin Guzin"
 *   )
 * ),
 * @OA\OpenApi(
 *   @OA\Server(
 *       url=BASE_URL
 *   )
 * )
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
