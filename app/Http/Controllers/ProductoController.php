<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
/**
* @OA\Info(title="API Producto", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/
class ProductoController extends Controller
{

    /**
    * index Producto
    * @OA\Get(
    *     path="/api/producto",
    *     summary="index Productos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los productos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Not Found"
    *     )
    * )
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
     * store Producto
     * @OA\Post (
     *     path="/api/producto",
     *     tags={"Producto"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="prod_descripcion",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="prod_precioc",
     *                          type="number"
     *                      ),
     *                       @OA\Property(
     *                          property="prod_preciov",
     *                          type="number"
     *                      )
     *                 ),
     *                 example={
     *                     "prod_descripcion":"Utensilios",
     *                     "prod_precioc":1000,
     *                     "prod_preciov":2000
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="prod_id", type="number", example=1),
     *              @OA\Property(property="prod_descripcion", type="string", example="Utensilios"),
     *              @OA\Property(property="prod_precioc", type="number", example=1000),
     *              @OA\Property(property="prod_preciov", type="number", example=2000),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Record not found"),
     *          )
     *      )
     * )
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
    * show Producto
    * @OA\Get(
    *     path="/api/producto/1",
    *     summary="show Productos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar el producto por id."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Not Found"
    *     )
    * )
    */
    public function show($id)
    {
        $producto = Producto::where('prod_id', $id)->first();

        return $producto;
    }

    /**
    * Edit Producto
    * @OA\Head(
    *     path="/api/producto/2/edit",
    *     summary="Edit Productos",
    *     @OA\Response(
    *         response=200,
    *         description="Editar el producto por id"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Not Found"
    *     )
    * )
    */
    public function edit($id)
    {
        $producto = Producto::where('prod_id', $id)->first();

        return $producto;
    }

     /**
     * Update Producto
     * @OA\Put (
     *     path="/api/producto/{producto}",
     *     tags={"Producto"},
     *     @OA\Parameter(
     *         in="path",
     *         name="producto",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="prod_descripcion)",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="prod_precioc",
     *                          type="number"
     *                      ),
     *                       @OA\Property(
     *                          property="prod_preciov",
     *                          type="number"
     *                      )
     *                 ),
     *                 example={
     *                     "prod_descripcion":"Articulos p/ adultos",
     *                     "prod_precioc":5000,
     *                     "prod_preciov":10000
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="prod_id", type="number", example=2),
     *              @OA\Property(property="prod_descripcion", type="string", example="Articulos p/ adultos"),
     *              @OA\Property(property="prod_precioc", type="number", example=5000),
     *              @OA\Property(property="prod_preciov", type="number", example=10000),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z")
     *          )
     *      )
     * )
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
     * Delete Producto
     * @OA\Delete (
     *     path="/api/producto/{producto}",
     *     tags={"Producto"},
     *     @OA\Parameter(
     *         in="path",
     *         name="producto",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="Delete producto success")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        try{

            $producto = Producto::where('prod_id', $id)->delete();
            return response()->json(["msg" => "Delete producto success"]);

        }catch(NotFoundHttpException $exception){

            return response()->json(["msg" => $exception->getMessage()], 404);
        }
       
    }
}
