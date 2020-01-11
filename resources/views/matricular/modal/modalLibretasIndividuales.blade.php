{!! Form::open(['route' => 'notas.reporte-individual-libreta-store']) !!}
<div class="modal" id="modalLibreta">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        <div class="modal-header modal-header-info text-center">
          <h4 class="modal-title w-100"  id="modal-title">DATOS DE LA LIBRETA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body" id="modal-body">
            <div class="form-row">
                                <div class="form-group col-md-4">
                                        <strong>Codigo: <br></strong>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                        {{ Form::text('codigo',null , ['class' => 'form-control' , 'id' => 'codigo', 'placeholder' => 'Introduzca el codigo...', 'readonly']) }}
                                        </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>Parcial: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <strong>Quimestre: <br></strong>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                                </div>
                                                </div>
                                            </div>
                                        </div>
        <div class="modal-footer">
                {!! Form::button('<i class="fas fa-print"></i> DESCARGAR REPORTE', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}
        </div>

      </div>
    </div>
  </div>
  {!!Form::close()!!}
  <script>
      $('#modalLibreta').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var codigo = button.data('codigo');
        $('#codigo').val(codigo);
 
});
 </script>
