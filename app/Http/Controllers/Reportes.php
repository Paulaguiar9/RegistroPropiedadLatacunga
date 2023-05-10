<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Devolucion;
use App\Distribucion;
use App\Reporte;
use App\ReporteItem;

Use DB;
use App\DataTables\ConsultaCertificadosDataTable;
use App\DataTables\ReportesDataTable;
use App\DataTables\ReporteDistribucionDataTable;

use PDF;
class Reportes extends Controller
{
    public function prestamos(Request $request)
    {

    	$fi=$request->fi;
    	$ff=$request->ff;

    	$p=Prestamo::whereDate('created_at','>=',$fi)->whereDate('created_at','<=',$ff)->get();

        $p_l_max = Prestamo::select('libro_id', DB::raw('COUNT(libro_id) as total'))
                ->groupBy('libro_id')                
                ->orderBy('total','desc')
                ->whereDate('created_at','>=',$fi)->whereDate('created_at','<=',$ff)
                ->get();

        $data = array(
            'p' =>$p ,
            'libro_max'=>$p_l_max,
            'fi'=>$fi,
            'ff'=>$ff
        );

        return view('reportes.prestamo',$data);

    }


    public function devoluciones(Request $request)
    {
    	$fi=$request->fi;
    	$ff=$request->ff;
    	$dev=Devolucion::whereDate('created_at','>=',$fi)->whereDate('created_at','<=',$ff)->get();
    	return view('reportes.devolucion',['dev'=>$dev]);
    }


    public function distribucion(Request $request)
    {
        $fi=$request->fi;
        $ff=$request->ff;
        $dis=Distribucion::whereDate('created_at','>=',$fi)->whereDate('created_at','<=',$ff)->get();
        return view('reportes.distribucion',['dis'=>$dis]);   
    }

    public function consultasCertificados(ConsultaCertificadosDataTable $dataTable)
    {
        return  $dataTable->render('reportes.consultasCertificados');
    }


    public function buscarDistribucionesUsuario(Request $request)
    {
        $dis=Distribucion::whereDate('created_at',$request->fecha)->where('user_id',$request->usuario)->get();
        $data = array('dis' => $dis );
        return view('reportes.distribucionesUsuario',$data);
    }

    public function guardarReporteCertificados(Request $request)
    {
        
        $re=new Reporte;
        $re->fecha=$request->fecha;
        $re->tipo="Certificados";
        $re->save();
        foreach ($request->idC as $idC) {
            $rei=new ReporteItem;
            $rei->certificado_id=$idC;
            $rei->reporte_id=$re->id;
            $rei->save();
        }
        $request->session()->flash('success','Reporte de certificados guardado exitosamente');

        return redirect()->route('certificados');
    }

    public function reportesCertificados(ReportesDataTable $dataTable)
    {
        return  $dataTable->render('reportes.reportesCertificados');
    }

    public function descargarReportePdf($idR)
    {
        $data = array('reporte' => Reporte::find($idR));
        $pdf = PDF::loadView('reportes.descargaPdf', $data);
        return $pdf->stream(Reporte::find($idR)->fecha.'.pdf');
    }



    public function guardarReporteDistribucion(Request $request)
    {
        
        $re=new Reporte;
        $re->fecha=$request->fecha;
        $re->tipo="Distribucion";
        $re->save();
        foreach ($request->idD as $idC) {
            $rei=new ReporteItem;
            $rei->distribucion_id=$idC;
            $rei->reporte_id=$re->id;
            $rei->save();
        }
        $request->session()->flash('success','Reporte de Distribucion guardado exitosamente');

        return redirect()->route('home');
    }

    public function reportesDistribucion(ReporteDistribucionDataTable $dataTable)
    {
        return  $dataTable->render('reportes.reportesCertificadosDistribucion');
    }

    public function descargarReporteDistribucionPdf($idR)
    {
        $data = array('reporte' => Reporte::find($idR));
        $pdf = PDF::loadView('reportes.descargaDistibucionPdf', $data);
        return $pdf->stream(Reporte::find($idR)->fecha.'.pdf');
    }
}
