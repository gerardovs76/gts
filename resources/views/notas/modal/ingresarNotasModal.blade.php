
<div class="modal" id="modalIngresarNotas">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        <div class="modal-header modal-header-info text-center">
                <h4 class="modal-title w-100"  id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body" id="modal-body">
            <div class="form-row">
                <table class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>ALUMNOS</th>
                            <th>NOTA</th>
                        </tr>
                    </thead>
                    <tbody id="tableid">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          {!!Form::button('<i class="far fa-save"></i>  GUARDAR', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
        </div>

      </div>
    </div>
  </div>
