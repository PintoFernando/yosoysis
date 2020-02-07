<?php

namespace sis5cs\Http\Controllers\Oficial;
use sis5cs\Http\Controllers\Controller;
use Illuminate\Http\Request;
use sis5cs\VentaComercializacionProducto;
use Session;
use Excel;
class VentaComercializacionProductoCodeudorController extends Controller
{
   // variables
  public $numero_filas;
  public $id_persona_codeudor;

  public function index()
  {
    $this->id_persona_codeudor=Session::get('id_persona_codeudor');
    if($this->id_persona_codeudor==null)
    {
      alert()->info('Info','Seleccione un codeudor')->showConfirmButton();
      return redirect('oficial/codeudor/');
    }
    else{
      $venta=VentaComercializacionProducto::where('id_persona',$this->id_persona_codeudor)->get();
      return view('oficial.a_codeudores.venta_comercializacion_producto.index')->with(compact('venta'));
    }
    
  }

  public function import(Request $request)
  {
      //var request
    $this->numero_filas=$request->num_rows;
    $this->id_persona_codeudor=Session::get('id_persona_codeudor');
     // dd('Numero de filas'.$this->numero_filas.'id persona:'.$this->id_persona);
    Excel::selectSheets('calculo')->load($request->costo_ventas, function($reader){  
      $reader->ignoreEmpty();   
      $reader->takeRows($this->numero_filas);	
      $reader->calculate();
      $excel = $reader->get();
        // iteracción
      $reader->each(function($row) {        
        $venta = new VentaComercializacionProducto;
        $venta->producto = $row->producto;
        $venta->cantidad = $row->cantidad;
        $venta->unidad_medida = $row->unidad_medida;
        $venta->c_costo_unitario = $row->c_costo_unitario;
        $venta->c_costo_total = $row->c_costo_total;
        $venta->v_precio_unitario = $row->v_precio_unitario;
        $venta->v_precio_total = $row->v_precio_total;
        $venta->utilidad = $row->utilidad;
        $venta->porcentaje = $row->porcentaje;
        $venta->id_persona = $this->id_persona_codeudor;
        $venta->save();
      });
    });
    alert()->info('Info','Los datos se cargaron correctamente.')->showConfirmButton();
    return redirect('oficial/a_codeudores/venta_comercializacion_producto/');
  } 

  public function create()
  { 
   if(Session::get('id_persona_codeudor')==null)
     {
      alert()->info('Info','Seleccione un codeudor')->showConfirmButton();
      return redirect('oficial/codeudor/');
    }
    else{
      $if_exist=VentaComercializacionProducto::where('id_persona',Session::get('id_persona_codeudor'))->count();
      if($if_exist>100)
      {
       alert()->info('Info','Ya registro los datos de venta y comercializacion.')->showConfirmButton();
       return redirect('oficial/a_codeudores/venta_comercializacion_producto/');
     }
     else
     {			
       return view('oficial.a_codeudores.venta_comercializacion_producto.create');
     } 
   }


 }

 public function edit($id)
 {
  if(Session::get('id_persona_codeudor')==null)
    {
      alert()->info('Info','Seleccione un codeudor')->showConfirmButton();
      return redirect('oficial/codeudor/');
    }
    else
    {
      $ventas=VentaComercializacionProducto::find($id);
      return view('oficial.a_codeudores.venta_comercializacion_producto.edit')->with(compact('ventas')); //formulario de registro
      }
    }

    public function update(VentaComercializacionProductoFormRequest $request,$id)
    {
      $ven=VentaComercializacionProducto::find($id); 
      $ven->producto=$request->input('producto');
      $ven->cantidad=$request->input('cantidad');
      $ven->unidad_medida=$request->input('unidad_medida');
      $ven->v_costo_unitario=$request->input('v_costo_unitario');
      $ven->v_costo_total=$request->input('v_costo_total');
      $ven->c_precio_unitario=$request->input('c_precio_unitario');
      $ven->c_precio_total=$request->input('c_precio_total');
      $ven->utilidad=$request->input('utilidad');
      $ven->porcentaje=$request->input('porcentaje');
      $ven->id_persona=$this->id_persona_codeudor;
      $ven->save(); //metodo se encarga de ejecutar un insert sobre la tabla
      return redirect('/oficial/a_codeudores/venta_comercializacion_producto/');
    }

    public function destroy($id)
    {
      $venta= VentaComercializacionProducto::find($id); 
      $venta->delete(); //delete
      return back();
    }


    public function download()
    {
      $pathtoFile=public_path().'/plantillas_excel/venta_comercializacion.xls';
      return response()->download($pathtoFile);
    }

    public function download_transporte()
    {
      $pathtoFile=public_path().'/plantillas_excel/venta_transporte.xls';
      return response()->download($pathtoFile);
    }
    public function download_comercio()
    {
      $pathtoFile=public_path().'/plantillas_excel/comercio.xls';
      return response()->download($pathtoFile);
    }
  }