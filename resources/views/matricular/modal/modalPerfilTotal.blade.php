
{!!Form::open(['route' => 'cobros.facturacion-in-store'])!!}
<div class="modal" id="modalPerfilTotal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        <div class="modal-header modal-header-info text-center">
          <h4 class="modal-title w-100"  id="modal-title">DATOS DE LA FACTURA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body" id="modal-body">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <strong>Fecha inicio</strong><br>
                    <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!!Form::date('fecha_inicio',null, ['class' => 'form-control'])!!}
                </div>
                </div>
                <div class="form-group col-md-4">
                        <strong>Fecha Fin</strong><br>
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!!Form::date('fecha_fin',null, ['class' => 'form-control'])!!}
                    </div>
                </div>
                    <div class="form-group col-md-4">
                            <strong>Codigo</strong><br>
                            <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            {!!Form::text('codigo',null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                        <div class="form-group col-md-4">
                                <strong>Nombres</strong><br>
                                <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                {!!Form::text('nombres',null, ['class' => 'form-control'])!!}
                            </div>
                        </div>
                            <div class="form-group col-md-4">
                                    <strong>Valor</strong><br>
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    {!!Form::text('valor',null, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                                <div class="form-group col-md-4">
                                        <strong>Referencias</strong><br>
                                        <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        {!!Form::text('referencias',null, ['class' => 'form-control'])!!}
                                    </div>
                                </div>
                                    <div class="form-group col-md-4">
                                            <strong>Numero de referencia</strong><br>
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                            {!!Form::text('num_referencia',null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

            </div>
        </div>
        <div class="modal-footer">
          {!!Form::button('<i class="far fa-save"></i>  GUARDAR', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
        </div>

      </div>
    </div>
  </div>
  {!!Form::close()!!}
