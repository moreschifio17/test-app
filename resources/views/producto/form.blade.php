<div class="box box-info padding-1">
    <div class="box-body">
       
        <div class="form-group">
            {{ Form::hidden('prod_id', $producto->prod_id, ['class' => 'form-control', 'placeholder' => 'Prod Id']) }}
           
        </div>  
        <div class="form-group">
            {{ Form::label('prod_descripcion') }}
            {{ Form::text('prod_descripcion', $producto->prod_descripcion, ['class' => 'form-control', 'placeholder' => 'Prod Descripcion']) }}
           
        </div>
        <div class="form-group">
            {{ Form::label('prod_precioc') }}
            {{ Form::text('prod_precioc', $producto->prod_precioc, ['class' => 'form-control' , 'placeholder' => 'Prod Precioc']) }}
            
        </div>
        <div class="form-group">
            {{ Form::label('prod_preciov') }}
            {{ Form::text('prod_preciov', $producto->prod_preciov, ['class' => 'form-control' , 'placeholder' => 'Prod Preciov']) }}
            
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>