{!!Form::open(['route' => 'notas.abanderados-reportes'])!!}
<div class="modal" id="modalAbanderados">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        <div class="modal-header modal-header-info text-center">
          <h4 class="modal-title w-100" id="modal-title">INGRESE LOS DATOS PARA LA BUSQUEDA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body" id="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                        <strong>Curso: <br></strong>
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {{ Form::select('curso',['TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                        </div>
                        </div>
                        <div class="form-group col-md-6">
                        <strong>Paralelo: <br></strong>
                        <div class="input-group-prepend">
                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                        </div>
                        </div>
                    </div>

        </div>
        <div class="modal-footer">
          {!!Form::button('<i class="fas fa-search"></i>  REALIZAR BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
        </div>

      </div>
    </div>
  </div>
  {!!Form::close()!!}
