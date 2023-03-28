<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
     public function generatePDF()
    {
        $users = User::get();
  
        $data = [
            'title' => 'PERITAJE',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
      //  $pdf = PDF::loadView('vehiculo.myPDF', $data);
      $pdf = PDF::loadView('vehiculo.myPDFDOS', $data);
     
       // return $pdf->download('peritaje.pdf');
        return $pdf->stream('peritaje.pdf');
    }
}
