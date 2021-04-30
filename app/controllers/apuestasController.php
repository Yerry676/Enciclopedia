<?php 

class ApuestasController extends Controller{

  public function Esperanza()
  {
    $cuota = isset($_POST['cuota']) ? $_POST['cuota'] : 0;
    $prob = isset($_POST['prob']) ? $_POST['prob'] : 0;
    $esperanza = $cuota * ($prob/100) ;
    $res = '';
    if($esperanza > 1 ){
      $res = 'Favorable';
    }else if($esperanza != 0){
      $res = 'Desfavorable';
    }
    $params = [
      'cuota' => $cuota,
      'probabilidad' => $prob,
      'res'=> $esperanza,
      'esperanza' => $res
    ];
    $this->renderView("apuestas/esperanza",$params, titulo: "Esperanza Matematica");
  }

  public function pca(){
    $cuota = isset($_POST['cuota']) ? $_POST['cuota'] : 0;
    $pca = ($cuota > 0)? round((1 / $cuota),2) * 100 :0;
    $params = [
      'cuota' => $cuota,
      'res' => $pca
    ];
    $this->renderView("apuestas/pca", $params, titulo: "Probabilidad de casa de apuesta");
  }
  public function gananciaNeta()
  {
    $apuesta = isset($_POST['apuesta']) ? $_POST['apuesta'] : 0;
    $cuota = isset($_POST['cuota']) ? $_POST['cuota'] : 0;
    $GananciaNeta = $apuesta * ($cuota - 1);
    $params = [
      'apuesta' => $apuesta,
      'cuota' => $cuota,
      'ganancia' => $GananciaNeta
    ];
    $this->renderView("apuestas/ganancianeta", $params, titulo: "Ganancia Neta");
  }
  public function roi()
  {
    $GananciaNeta = isset($_POST['ganancian']) ? $_POST['ganancian'] : 0;
    $inversionTotal = isset($_POST['inversiont']) ? $_POST['inversiont'] : 0;
    if($GananciaNeta == 0 || $inversionTotal == 0){
      $roi = 0;
    }else{
      $roi = ($GananciaNeta/$inversionTotal) * 100;
    }
    $params = [
      'ganancian' => $GananciaNeta,
      'inversiont' => $inversionTotal,
      'roi' => $roi
    ];
    $this->renderView("apuestas/roi", $params, $params, titulo: "Ganancia Neta");
  }
}