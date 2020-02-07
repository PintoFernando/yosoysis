<?php
namespace sis5cs\Http\Controllers\Oficial;
use sis5cs\Http\Controllers\Controller;
use Illuminate\Http\Request;
use sis5cs\Persona;
use sis5cs\CuentasDocumentosCobrar;
use sis5cs\TipoDeposito;
use sis5cs\Http\Requests\CuentasDocumentosCobrarFormRequest;
use sis5cs\User;
use DB;
use Fpdf;
use Auth;
use Alert;
use Session;

class CuentasDocumentosCobrarCodeudorController extends Controller
{
	public $id_persona_codeudor;
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request)
	{
		$this->id_persona_codeudor=Session::get('id_persona_codeudor');
		if(Session::get('id_persona_codeudor')==null)
			{
				alert()->info('Info','Seleccione un Codeudor')->showConfirmButton();
				return redirect('oficial/codeudor/');
			}
			else
			{

				$cuentas=CuentasDocumentosCobrar::where('id_persona',Session::get('id_persona_codeudor'))->get();
				return view('oficial.a_codeudores.cuentas_documentos_cobrar.index')->with(compact('cuentas'));

			}

		}

		public function create()
		{    
			if(Session::get('id_persona_codeudor')==null)
				{
					alert()->info('Info','Seleccione un Codeudor')->showConfirmButton();
					return redirect('oficial/codeudor/');
				}

				else
				{
					$if_exist=CuentasDocumentosCobrar::where('id_persona',Session::get('id_persona_codeudor'))->count();
					if($if_exist>100)
					{
						alert()->info('Info','Ya registro las datos de cuentas documentos cobrar')->showConfirmButton();
						return redirect('oficial/a_codeudores/cuentas_documentos_cobrar/');
					}
					else
					{      
						return view('oficial.a_codeudores.cuentas_documentos_cobrar.create');
					} 
				}
			}

			public function store(CuentasDocumentosCobrarFormRequest $request)
			{
				$this->id_persona_codeudor=Session::get('id_persona_codeudor');  
				$cuentas= new CuentasDocumentosCobrar(); 
				$cuentas->nit=$request->input('nit');
				$cuentas->nombre_razon_social=$request->input('nombre_razon_social');
				$cuentas->concepto=$request->input('concepto');
				$cuentas->saldo=$request->input('saldo'); 
				$cuentas->id_persona=$this->id_persona_codeudor;
   $cuentas->save(); //metodo se encarga de ejecutar un insert sobre la tabla return redirect('oficial/direccion');
   $notification= 'Exelente los datos se han guardado correctamente'; 
   return redirect('oficial/a_codeudores/cuentas_documentos_cobrar')->with(compact('notification'));
}

public function edit($id)
{
	$cuentas=CuentasDocumentosCobrar::find($id);
      return view('oficial.a_codeudores.cuentas_documentos_cobrar.edit')->with(compact('cuentas')); //formulario de registro
  }
  public function update(CuentasDocumentosCobrarFormRequest $request,$id)
  {
  	$this->id_persona_codeudor=Session::get('id_persona_codeudor');
  	$cuentas=CuentasDocumentosCobrar::find($id); 
  	$cuentas->nit=$request->input('nit');  
  	$cuentas->nombre_razon_social=$request->input('nombre_razon_social');  
  	$cuentas->concepto=$request->input('concepto');  
  	$cuentas->saldo=$request->input('saldo');
  	$cuentas->id_persona=$this->id_persona_codeudor;
      $cuentas->save(); //metodo se encarga de ejecutar un insert sobre la tabla
      $notification= 'Exelente sus datos se han modificado correctamente';     
      return redirect('oficial/a_codeudores/cuentas_documentos_cobrar/')->with(compact('notification'));
  }
    /*-------------
    public function destroy($id)
    {

     $cro=Croquis::find($id); 
      $cro->delete(); //delete
      return back();
  }--------------*/
}
