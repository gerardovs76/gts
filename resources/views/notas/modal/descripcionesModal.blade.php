
<div class="modal" id="modalIngresarDescripciones">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">


            <div class="modal-header modal-header-info text-center">
                    <h4 class="modal-title w-100"  id="modal-title">INGRESAR DESCRIPCIONES</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal-body">
                <div class="form-row">
                        <div class="form-group col-md-6">
                                <strong style="background-color: #008cba; padding: 8px 12px; color: white;">DESCRIPCIÓN TRABAJOS ACADEMICOS: </strong><br><br>
                                <strong>Trabajos academicos nro. 1<br></strong>
                                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ta1', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ta1'])!!}
                  </div>
                  <strong>Trabajos academicos nro. 2<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ta2', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ta2'])!!}
                  </div>
                  <strong>Trabajos academicos nro. 3<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ta3', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ta3'])!!}
                  </div>
                  <strong>Trabajos academicos nro. 4<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ta4', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ta4'])!!}
                  </div>
                  <strong>Descripción recuperación(<em>Si se amerita.</em>)<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ta5', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ta5'])!!}
                  </div>

                        </div>
                        <div class="form-group col-md-6">
                          <strong style="background-color: #e99002; padding: 8px 12px; color: white;">DESCRIPCIÓN TAREAS INDIVIDUALES: </strong><br><br>
                                <strong>Tareas inviduales nro. 1<br></strong>
                                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ti1', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ti1'])!!}
                  </div>
                  <strong>Tareas inviduales nro. 2<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ti2', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ti2'])!!}
                  </div>
                  <strong>Tareas inviduales nro. 3<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ti3', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ti3'])!!}
                  </div>
                  <strong>Tareas inviduales nro. 4<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ti4', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ti4'])!!}
                  </div>
                  <strong>Descripción recuperación(<em>Si se amerita.</em>)<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ti5', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ti5'])!!}
                  </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-6">
                                <strong style="background-color: #f04124; padding: 8px 12px; color: white;">DESCRIPCIÓN TAREAS GRUPALES: </strong><br><br>
                                <strong>Tareas grupales nro. 1<br></strong>
                                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_tg1', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_tg1'])!!}
                  </div>
                  <strong>Tareas grupales nro. 2<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_tg2', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_tg2'])!!}
                  </div>
                  <strong>Tareas grupales nro. 3<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_tg3', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_tg3'])!!}
                  </div>
                  <strong>Tareas grupales nro. 4<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_tg4', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_tg4'])!!}
                  </div>
                  <strong>Descripción recuperación(<em>Si se amerita.</em>)<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_tg5', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_tg5'])!!}
                  </div>
                        </div>
                        <div class="form-group col-md-6">
                                <strong style="background-color: #5bc0de; padding: 8px 12px; color: white;">DESCRIPCIÓN LECCIONES: </strong><br><br>
                                <strong>Lecciones nro. 1<br></strong>
                                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_le1', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_le1'])!!}
                  </div>
                  <strong>Lecciones nro. 2<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_le2', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_le2'])!!}
                  </div>
                  <strong>Lecciones nro. 3<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_le3', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_le3'])!!}
                  </div>
                  <strong>Lecciones nro. 4<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_le4', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_le4'])!!}
                  </div>
                  <strong>Descripción recuperación(<em>Si se amerita.</em>)<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_le5', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_le5'])!!}
                  </div>
                        </div>
                        <div class="form-group col-md-6">
                                <strong style="background-color: #43ac6a; padding: 8px 12px; color: white;">DESCRIPCIÓN EVALUACIONES: </strong><br><br>
                                <strong>Evaluaciones nro. 1<br></strong>
                                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ev1', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ev1'])!!}
                  </div>
                  <strong>Evaluaciones nro. 2<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ev2', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ev2'])!!}
                  </div>
                  <strong>Evaluaciones nro. 3<br></strong>
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ev3', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ev3'])!!}
                  </div>
                  <strong>Evaluaciones nro. 4<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ev4', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ev4'])!!}
                  </div>
                  <strong>Descripción recuperación(<em>Si se amerita.</em>)<br></strong>
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                  {!!Form::text('descripcion_ev5', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Ingrese la descripción de la tarea', 'id' => 'descripcion_ev5'])!!}
                  </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-save"></i> GUARDAR</button>
            </div>

          </div>
        </div>
      </div>
