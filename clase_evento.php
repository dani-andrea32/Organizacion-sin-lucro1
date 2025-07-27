<?php
class Evento {
  // Propiedades del evento //
  public $descripcion;
  public $tipo;
  public $lugar;
  public $fecha;
  public $hora;




  // Constructor para iniciar el evento //
  public function __construct($descripcion, $tipo, $lugar, $fecha, $hora) {
      $this->descripcion = $descripcion;
      $this->tipo = $tipo;
      $this->lugar = $lugar;
      $this->fecha = $fecha;
      $this->hora = $hora;
  }




  // Método para mostrar el evento //
  public function mostrar() {
      $tipo = htmlspecialchars($this->tipo);
      $descripcion = htmlspecialchars($this->descripcion);
      $lugar = htmlspecialchars($this->lugar);
      $fecha = htmlspecialchars($this->fecha);
      $hora = htmlspecialchars($this->hora);


      return "<div class='evento'>
          <h3>($tipo)</h3>
          <p><strong>Descripción:</strong> $descripcion</p>
          <p><strong>Lugar:</strong> $lugar</p>
          <p><strong>Fecha:</strong> $fecha</p>
          <p><strong>Hora:</strong> $hora</p>
      </div>";
  }




  // Método estático para el filtro de eventos por tipo //
  public static function filtrarPorTipo($eventos, $tipobuscado) {
      $filtrados = [];
      foreach ($eventos as $evento) {
          if (stripos($evento->tipo, $tipobuscado) !== false) {
              $filtrados[] = $evento;
          }
      }
      return $filtrados;
  }




  // Método estático para mostrar todos los eventos de un arreglo //
  public static function mostrarTodos($eventos) {
      $html = "";
      foreach ($eventos as $evento) {
          $html .= $evento->mostrar();
      }
      return $html;
  }
}
?>
