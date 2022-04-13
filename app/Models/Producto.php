<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $prod_id
 * @property $prod_descripcion
 * @property $prod_precioc
 * @property $prod_preciov
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    protected $perPage = 2;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['prod_id','prod_descripcion','prod_precioc','prod_preciov'];
    protected $primarykey = 'prod_id';
    protected $table = 'producto';



}
