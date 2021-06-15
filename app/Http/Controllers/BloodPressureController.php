<?php

namespace App\Http\Controllers;
use App\Models\RoleUser\RoleUser;
use App\Product;
use App\Commande;
use App\Models\CommandeProduct\CommandeProduct;

use App\Reclamation;
use Illuminate\Http\Request;

use App\Charts\BloodPressureChart;

use DB;

class BloodPressureController extends Controller
{
    public function index(Request $request)
    {

      $fillColors = [
        "rgba(255, 99, 132, 0.2)",
        "rgba(22,160,133, 0.2)",
        "rgba(255, 205, 86, 0.2)",
        "rgba(51,105,232, 0.2)",
        "rgba(244,67,54, 0.2)",
        "rgba(34,198,246, 0.2)",
        "rgba(153, 102, 255, 0.2)",
        "rgba(255, 159, 64, 0.2)",
        "rgba(233,30,99, 0.2)",
        "rgba(205,220,57, 0.2)"

    ];

    $borderColors = [
      "rgba(255, 99, 132, 1.0)",
      "rgba(22,160,133, 1.0)",
      "rgba(255, 205, 86, 1.0)",
      "rgba(51,105,232, 1.0)",
      "rgba(244,67,54, 1.0)",
      "rgba(34,198,246, 1.0)",
      "rgba(153, 102, 255, 1.0)",
      "rgba(255, 159, 64, 1.0)",
      "rgba(233,30,99, 1.0)",
      "rgba(205,220,57, 1.0)"
  ];

      $bpRate = Product::orderBy('nproduct')->pluck('quantité','nproduct');

      $rbRate = CommandeProduct::orderBy('product_id')->pluck('qte','product_id');

      $sbRate = Reclamation::orderBy('medicament')->pluck('status','medicament');
      
      

      


       $hRate = new BloodPressureChart;
       $hRate->labels($bpRate->keys());
       $hRate->dataset('Quantités', 'doughnut', $bpRate->values()) ->color($borderColors)
       ->backgroundcolor($fillColors);


       $rRate = new BloodPressureChart;
       $rRate->labels($rbRate->keys());
       $rRate->dataset('Quantités', 'line', $rbRate->values())->color("rgb(255, 99, 132)")
       ->backgroundcolor("rgb(255, 99, 132)")
       ->fill(false)
       ->linetension(0.1)
       ->dashed([5]);  ;

       $sRate = new BloodPressureChart;
       $sRate->labels($sbRate->keys());
       $sRate->dataset('Nombre Reclamations', 'bar', $sbRate->values())->color($borderColors)
       ->backgroundcolor($fillColors);


       

       



      return view('index', compact('hRate','rRate','sRate'));
    }
}
