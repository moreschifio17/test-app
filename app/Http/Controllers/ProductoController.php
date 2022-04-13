<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $producto = Producto::paginate();
        $producto = Producto::all();
        return response()->json($producto);

        } catch(QueryException $e) {

            return $this->respondInvalidQuery();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        
         try{
            $producto = Producto::create($request->all());
            return $producto;

        } catch (Exception $e) {
            return response()->json(["msg" => $e->getMessage()], 404);
        } 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::where('prod_id', $id)->first();

        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::where('prod_id', $id)->first();

        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        try{

            $producto = Producto::where('prod_id', $id)->update($request->all());
            return response()->json($producto);

       } catch(Exception $exception) {

            return response()->json(["msg" => $exception->getMessage()], 404);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{

            $producto = Producto::where('prod_id', $id)->delete();
            return response()->json(["msg" => "Eliminado exitosamente!!"]);

        }catch(NotFoundHttpException $exception){

            return response()->json(["msg" => $exception->getMessage()], 404);
        }
       
    }
}
