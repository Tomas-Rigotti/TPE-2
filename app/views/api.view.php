<?php 

class ApiView {
    public function response($data, $estado = 200) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $estado . " " . $this->_pedirEstado($estado));
        echo json_encode($data);
    }


private function _pedirEstado($code){
    $estado = array(
      200 => "OK",
      201 => "Created",
      400 => "Bad request",
      404 => "Not found",
      500 => "Internal Server Error"
    );
    return (isset($estado[$code])) ? $estado[$code] : $estado[500];
  }

}