<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All Date
$app->get('/api/show', function (Request $request, Response $response) {
    // Get DB
    $db = connect_db();
    $sql = 'SELECT * FROM api ';
    // query the database
    $stmt = $db->query($sql);
    // convert the record set into an associative array so we can work with it easily
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
    /*return $response -> withJson(
        [$stmt]
    ); */
});


// Get Single/Some Date By id
$app->get('/api/show/id/{id}', function (Request $request, Response $response,array $args) {
    $id = $args['id'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE id = '%s'",mysqli_real_escape_string($db,$id));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By name
$app->get('/api/show/name/{name}', function (Request $request, Response $response,array $args) {
    $name = $args['name'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE name = '%s'",mysqli_real_escape_string($db,$name));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By time
$app->get('/api/show/time/{time}', function (Request $request, Response $response,array $args) {
    $time = $args['time'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE time = '%s'",mysqli_real_escape_string($db,$time));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By reward
$app->get('/api/show/reward/{reward}', function (Request $request, Response $response,array $args) {
    $reward = $args['reward'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE reward = '%s'",mysqli_real_escape_string($db,$reward));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By name,time
$app->get('/api/show/name/{name}/time/{time}', function (Request $request, Response $response,array $args) {
    $name = $args['name'];
    $time = $args['time'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE name = '%s' AND time = '%s'",
    mysqli_real_escape_string($db,$name),mysqli_real_escape_string($db,$time));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By name,time,reward
$app->get('/api/show/name/{name}/time/{time}/reward/{reward}', function (Request $request, Response $response,array $args) {
    $name = $args['name'];
    $time = $args['time'];
    $reward = $args['reward'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE name = '%s' AND time = '%s' AND reward = '%s'",
    mysqli_real_escape_string($db,$name),mysqli_real_escape_string($db,$time),mysqli_real_escape_string($db,$reward));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By name,reward
$app->get('/api/show/name/{name}/reward/{reward}', function (Request $request, Response $response,array $args) {
    $name = $args['name'];
    $reward = $args['reward'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE name = '%s' AND reward = '%s'",
    mysqli_real_escape_string($db,$name),mysqli_real_escape_string($db,$reward));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Get Single/Some Date By time,reward
$app->get('/api/show/time/{time}/reward/{reward}', function (Request $request, Response $response,array $args) {
    $time = $args['time'];
    $reward = $args['reward'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE time = '%s' AND reward = '%s'",
    mysqli_real_escape_string($db,$time),mysqli_real_escape_string($db,$reward));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Search date(BAD!!!)
$app->post('/api/search', function (Request $request, Response $response) {
    $id = $request->getParam('id');
    $name = $request->getParam('name');
    $time = $request->getParam('time');
    $reward = $request->getParam('reward');
    // Get DB
    $db = connect_db();
    $sql = sprintf("SELECT * FROM api WHERE id = '%s' AND name = '%s' AND time = '%s' AND reward = '%s'",
    mysqli_real_escape_string($db,$id),mysqli_real_escape_string($db,$name),mysqli_real_escape_string($db,$time),mysqli_real_escape_string($db,$reward));
    // query the database
    $stmt = $db->query($sql);
    $stmt = $stmt->fetch_all(MYSQLI_ASSOC);
    $db = null;
    $data_json = json_encode($stmt);
    echo $data_json;
});


// Add date
$app->post('/api/add', function (Request $request, Response $response) {
    $name = $request->getParam('name');
    $time = $request->getParam('time');
    $reward = $request->getParam('reward');
    // Get DB
    $db = connect_db();
    $sql = sprintf("INSERT INTO api (name,time,reward) VALUES('%s','%s','%s')",
    mysqli_real_escape_string($db,$name),mysqli_real_escape_string($db,$time),mysqli_real_escape_string($db,$reward));
    // query the database
    $stmt = $db->query($sql);
    $db = null;
    echo 'insterted ',$name,' ',$time,' ',$reward,' ','successful';
});


// Delete date
$app->delete('/api/delete/{id}', function (Request $request, Response $response,array $args) {
    $id = $args['id'];
    // Get DB
    $db = connect_db();
    $sql = sprintf("DELETE FROM api WHERE id = '%s'",
    mysqli_real_escape_string($db,$id));
    // query the database
    $stmt = $db->query($sql);
    $db = null;
    echo 'deleted id = ',$id,' successful';
});


// Update date
$app->put('/api/update/{id}', function (Request $request, Response $response,array $args) {
    $id = $args['id'];
    $time = $request->getParam('time');
    $reward = $request->getParam('reward');
    // Get DB
    $db = connect_db();
    $sql = sprintf("UPDATE api SET time='%s',reward='%s' WHERE id = '%s'",
    mysqli_real_escape_string($db,$time),mysqli_real_escape_string($db,$reward),mysqli_real_escape_string($db,$id));
    // query the database
    $stmt = $db->query($sql);
    $db = null;
    echo 'updated ',$name,' ',$time,' ',$reward,' ','successful';
});