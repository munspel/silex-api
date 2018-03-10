<?php

use Symfony\Component\HttpFoundation\JsonResponse;

$headers = ['Access-Control-Allow-Origin' => '*'];

$app->get('/v1/workers', function () use ($app, $headers) {
    $sql = "SELECT * FROM workers";
    $workers = $app['db']->fetchAll($sql);
    $response = new JsonResponse([
        'status' => "ok",
        'data' => $workers
            ], 200, $headers
    );
    return $response;
});
$app->get('/v1/workers-status', function () use ($app, $headers) {
    $sql = "SELECT type, status, worker, count(id) as count, max(last_update) as updated "
            . " FROM jobs"
            . " GROUP BY type, status, worker";
    $status = $app['db']->fetchAll($sql);
    $response = new JsonResponse([
        'status' => "ok",
        'data' => $status,
            ], 200, $headers
    );
    return $response;
});
