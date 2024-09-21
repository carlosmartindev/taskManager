<?php
require_once '../src/TareasController.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

header('Content-Type: application/json');
$controller = new TareasController();

$method = $_SERVER['REQUEST_METHOD'];

error_log($method);

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['titulo']) && isset($data['descripcion'])) {
            $resultado = $controller->crearTarea($data['titulo'], $data['descripcion']);
            echo json_encode(['success' => $resultado]);
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
        break;

    case 'GET':
        $tareas = $controller->obtenerTareas();
        echo json_encode($tareas);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id'], $data['titulo'], $data['descripcion'], $data['estado'])) {
            $resultado = $controller->actualizarTarea($data['id'], $data['titulo'], $data['descripcion'], $data['estado']);
            echo json_encode(['success' => $resultado]);
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        preg_match('/"id":(\d+)/', array_key_first($data), $id);

        if (isset($id[1])) {
            error_log("Si trae ID");
            $resultado = $controller->eliminarTarea($id[1]);
            echo json_encode(['success' => $resultado]);
        } else {
            error_log("No trae ID");
            echo json_encode(['error' => 'ID no proporcionado']);
        }
        break;

    default:
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
