<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobros;
use App\Matriculacion;
use DB;
use PDO;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteMatriculados;
use App\Exports\ReportesClientes;
use App\Imports\FacturacionImport;
use App\Exports\FacturacionPensionExport;
use App\Exports\FacturacionTotalExport;
use App\Http\Requests\FacturacionRequest;
use Storage;
use App\FacturacionArchivos;
use App\Facturacion;
use Illuminate\Support\Carbon;

class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function index()
    {

        return view('cobros.index', compact('cobros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cobros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cobros = new Cobros;
        $cobros->curso = $request->curso;
        $cobros->matricula = $request->matricula;
        $cobros->pension = $request->pension;
        $cobros->servicio_copiado = $request->servicio_copiado;
        $cobros->colada_morada = $request->colada_morada;
        $cobros->mantenimiento = $request->mantenimiento;
        $cobros->agenda = $request->agenda;
        $cobros->seguro_accidentes = $request->seguro_accidentes;
        $cobros->piscina = $request->piscina;
        $cobros->uniformes = $request->uniformes;
        $cobros->total = $request->total;
        $cobros->tipo_estudiante = $request->tipo_estudiante;
        $cobros->save();


        return redirect()->route('cobros.index')->with('info', 'Se ha actualizado correctamente.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cobros = Cobros::find($id);
        return view('cobros.edit', compact('cobros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cobros = Cobros::find($id);
        $cobros->curso = $request->curso;
        $cobros->matricula = $request->matricula;
        $cobros->pension = $request->pension;
        $cobros->servicio_copiado = $request->servicio_copiado;
        $cobros->colada_morada = $request->colada_morada;
        $cobros->mantenimiento = $request->mantenimiento;
        $cobros->agenda = $request->agenda;
        $cobros->seguro_accidentes = $request->seguro_accidentes;
        $cobros->piscina = $request->piscina;
        $cobros->uniformes = $request->uniformes;
        $cobros->total = $request->total;
        $cobros->tipo_estudiante = $request->tipo_estudiante;
        $cobros->save();

        return redirect()->route('cobros.indexCobros')->with('info', 'Se han actualizado con exito los valores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cobros = Cobros::find($id);
        $cobros->delete();
        return back()->with('info', 'Se ha eliminado con exito el registro');
    }

    public function reportesCobros()

    {
        return view('cobros.reportes');
    }

    public function matriculadosReporte(Request $request)
    {

        $fecha = $request->get('fecha');
        $tipo_estudiante = $request->get('tipo_estudiante');
        $fecha_hasta = $request->get('fecha_hasta');

        return Excel::download(new ReportesClientes($fecha, $tipo_estudiante, $fecha_hasta), 'reportes-clientes.xls');




}
    public function indexCobros()
    {
         $cobros = Cobros::all();
         return view('cobros.indexCobros', compact('cobros'));
    }

    public function reportesClientes(){

        //return Excel::download(new ReporteMatriculados, 'reportes-de-clientes.xls');

        return view('cobros.index-repoMatriculados');


    }
    public function descargarReporteCliente(Request $request)
    {
        $fecha = $request->fecha;
        $fecha_hasta = $request->fecha_hasta;

        return Excel::download(new ReporteMatriculados($fecha, $fecha_hasta), 'reporte-carga-cliente.xlsx');
    }

    public function facturacion()
    {
        return view('cobros.facturacion');
    }

    public function facturacionStore(Request $request)
    {
        if(isset($request->import_file))
        {
            $date = Carbon::now();

            $file = $request->import_file;
            $nombre = $file->getClientOriginalName();
            $nombre2 = str_replace(' ', '-', $nombre);
            var_dump($nombre2);
            $facturacionArchivos = new FacturacionArchivos;
            $facturacionArchivos->archivos = $nombre2;
            $facturacionArchivos->fecha_creacion =  $date->format('Y-m-d');
            $facturacionArchivos->save();
            \Storage::disk('archivo-facturacion')->put($nombre2,  \File::get($file));
            Excel::import(new FacturacionImport, $request->import_file);
            return back()->with('info', 'Se ha cargado la informacion correctamente');
        }


    }

    public function facturacionList()
    {
        $facturacion = FacturacionArchivos::all();
        return view('cobros.lista-facturaciones', compact('facturacion'));
    }
    public function facturacionDownload($file)
    {
        return response()->download(public_path("archivos-facturacion/{$file}"));
    }
    public function deleteFileFacturacion($file)
    {
        $query = DB::table('facturacion_archivos')->where('id',$file);
        $files_to_delete = $query->pluck('archivos')->toArray();
        $query->delete();
        Storage::disk('archivo-facturacion')->delete($files_to_delete);
        return view('cobros.lista-facturaciones')->with('info', 'Se ha eliminado el archivo correctamente');
    }
    public function facturacionExports(Request $request)
    {
        $tipo_factura = $request->tipo_factura;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_hasta = $request->fecha_hasta;
        try {
            if($tipo_factura == 'TOTAL'){
                return Excel::download(new FacturacionTotalExport($fecha_inicio, $fecha_hasta), 'facturacion-total.xlsx');
            }elseif($tipo_factura == 'PENSION'){
                return Excel::download(new FacturacionPensionExport($fecha_inicio, $fecha_hasta), 'facturacion-pension.xlsx');
        }
        } catch (Exception $e) {
            report($e);

            return false;
        }


    }

    public function facturacionIndividualStore(Request $request)
    {
        $date = Carbon::now();
        $facturacion = new Facturacion;
        $facturacion->fecha_inicio = $request->fecha_inicio;
        $facturacion->fecha_fin = $request->fecha_fin;
        $facturacion->codigo = $request->codigo;
        $facturacion->nombres = $request->nombres;
        $facturacion->valor = $request->valor;
        $facturacion->referencias = $request->referencias;
        $facturacion->num_referencia = $request->num_referencia;
        $facturacion->fecha_creacion = $date->format('Y-m-d');
        $facturacion->save();

        return redirect()->route('cobros.facturacion-index')->with('info', 'Se ha agregado la factura correctamente');


    }

}
