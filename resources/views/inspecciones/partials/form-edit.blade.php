<marquee><strong>AL MOMENTO DE CAMBIAR UNA 01(FALTA INJUSTIFICADA) DEBE CAMBIAR EN LA HORA DESEADA AL CODIGO 02(FALTA JUSTIFICADA) Y ASIGNAR LA JUSTIFICACIÓN.</strong></marquee>
        <div class="card-deck">
                <div class="card border-primary" style="width: 100rem;">
                    <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 1 </div>
                        <div class="card-body">

                          @if($inspeccion->h1 == '01')
      <div class="form-group col-md-4">
          <strong>Hora 1: </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('h1', null, ['class' => 'form-control col-md-4'])!!}
      </div>
    </div>
      <div class="form-group col-md-8">
          <strong>Justificacion hora 1 : </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('justificacionh1', null, ['class' => 'form-control col-md-10'])!!}
      </div>
    </div>
      @else
      <div class="form-group col-md-4">
            <strong>Hora 1: </strong><br>
             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!!Form::text('h1', null, ['class' => 'form-control col-md-4', 'readonly' => 'true'])!!}
        </div>
      </div>
      @endif

                        </div>
                      </div>

                      <div class="card border-primary" style="width: 100rem;">
                          <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 2 </div>
                            <div class="card-body">

                              @if($inspeccion->h2 == '01')
      <div class="form-group col-md-4">
          <strong>Hora 2: </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('h2', null, ['class' => 'form-control col-md-4'])!!}
      </div>
    </div>
      <div class="form-group col-md-8">
          <strong>Justificacion hora 2 : </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('justificacionh2', null, ['class' => 'form-control col-md-10'])!!}
      </div>
    </div>
      @else
      <div class="form-group col-md-4">
            <strong>Hora 2: </strong><br>
             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!!Form::text('h2', null, ['class' => 'form-control col-md-4', 'readonly' => 'true'])!!}
        </div>
      </div>
      @endif

                            </div>
                          </div>
        </div>
        <br>

                    <div class="card-deck">


                          <div class="card border-primary" style="width: 100rem;">
                              <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 3 </div>
                                <div class="card-body">

                                  @if($inspeccion->h3 == '01')
      <div class="form-group col-md-4">
          <strong>Hora 3: </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('h3', null, ['class' => 'form-control col-md-4'])!!}
      </div>
    </div>
      <div class="form-group col-md-8">
          <strong>Justificacion hora 3 : </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('justificacionh3', null, ['class' => 'form-control col-md-10'])!!}
      </div>
    </div>
      @else
      <div class="form-group col-md-4">
            <strong>Hora 3: </strong><br>
             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!!Form::text('h3', null, ['class' => 'form-control col-md-4', 'readonly' => 'true'])!!}
        </div>
      </div>
      @endif

                                </div>
                              </div>


                              <div class="card border-primary" style="width: 100rem;">
                                  <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 4 </div>
                                    <div class="card-body">

                                      @if($inspeccion->h4 == '01')
      <div class="form-group col-md-4">
          <strong>Hora 4: </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('h4', null, ['class' => 'form-control col-md-4'])!!}
      </div>
    </div>
      <div class="form-group col-md-8">
          <strong>Justificacion hora 4 : </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('justificacionh4', null, ['class' => 'form-control col-md-10'])!!}
      </div>
    </div>
      @else
      <div class="form-group col-md-4">
            <strong>Hora 3: </strong><br>
             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!!Form::text('h4', null, ['class' => 'form-control col-md-4', 'readonly'])!!}
        </div>
      </div>
      @endif

                                    </div>
                                  </div>
                                </div><br>

                                <div class="card-deck">

                                  <div class="card border-primary" style="width: 100rem;">
                                      <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 5 </div>
                                        <div class="card-body">

                                          @if($inspeccion->h5 == '01')
      <div class="form-group col-md-4">
          <strong>Hora 5: </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('h5', null, ['class' => 'form-control col-md-4'])!!}
      </div>
    </div>
      <div class="form-group col-md-8">
          <strong>Justificacion hora 5 : </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('justificacionh5', null, ['class' => 'form-control col-md-10'])!!}
      </div>
    </div>
      @else
      <div class="form-group col-md-4">
            <strong>Hora 5: </strong><br>
             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!!Form::text('h5', null, ['class' => 'form-control col-md-4', 'readonly'])!!}
        </div>
      </div>
      @endif

                                        </div>
                                      </div>

                                      <div class="card border-primary" style="width: 100rem;">
                                          <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 6 </div>
                                            <div class="card-body">

                                              @if($inspeccion->h6 == '01')
      <div class="form-group col-md-4">
          <strong>Hora 6: </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('h6', null, ['class' => 'form-control col-md-4'])!!}
      </div>
    </div>
      <div class="form-group col-md-8">
          <strong>Justificacion hora 6 : </strong><br>
           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!!Form::text('justificacionh6', null, ['class' => 'form-control col-md-10'])!!}
      </div>
    </div>
      @else
      <div class="form-group col-md-4">
            <strong>Hora 6: </strong><br>
             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!!Form::text('h6', null, ['class' => 'form-control col-md-4', 'readonly' => 'true'])!!}
        </div>
      </div>
      @endif

                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <div class="card-deck">

                                          <div class="card border-primary" style="width: 100rem;">
                                              <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 7 </div>
                                                <div class="card-body">


                                                  @if($inspeccion->h7 == '01')
                                                  <div class="form-group col-md-4">
                                                      <strong>Hora 7: </strong><br>
                                                       <div class="input-group-prepend">
                                                                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                      {!!Form::text('h7', null, ['class' => 'form-control col-md-4'])!!}
                                                  </div>
                                                </div>
                                                  <div class="form-group col-md-8">
                                                      <strong>Justificacion hora 7 : </strong><br>
                                                       <div class="input-group-prepend">
                                                                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                      {!!Form::text('justificacionh7', null, ['class' => 'form-control col-md-10'])!!}
                                                  </div>
                                                </div>
                                                  @else
                                                  <div class="form-group col-md-4">
                                                        <strong>Hora 7: </strong><br>
                                                         <div class="input-group-prepend">
                                                                                         <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                        {!!Form::text('h7', null, ['class' => 'form-control col-md-4', 'readonly' => 'true'])!!}
                                                    </div>
                                                  </div>
                                                  @endif

                                                </div>
                                              </div>

                                              <div class="card border-primary" style="width: 100rem;">
                                                  <div class="card-header text-center" style="background-color: #008cba;color : white;"><i class="fas fa-clock"></i> HORA: 8 </div>
                                                    <div class="card-body">

                                                      @if($inspeccion->h8 == '01')
                                                      <div class="form-group col-md-4">
                                                          <strong>Hora 8: </strong><br>
                                                           <div class="input-group-prepend">
                                                                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                          {!!Form::text('h8', null, ['class' => 'form-control col-md-4'])!!}
                                                      </div>
                                                    </div>
                                                      <div class="form-group col-md-8">
                                                          <strong>Justificacion hora 8 : </strong><br>
                                                           <div class="input-group-prepend">
                                                                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                          {!!Form::text('justificacionh8', null, ['class' => 'form-control col-md-10'])!!}
                                                      </div>
                                                    </div>
                                                      @else
                                                      <div class="form-group col-md-4">
                                                            <strong>Hora 8: </strong><br>
                                                             <div class="input-group-prepend">
                                                                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                            {!!Form::text('h8', null, ['class' => 'form-control col-md-4', 'readonly'])!!}
                                                        </div>
                                                      </div>
                                                      @endif


                                                    </div>
                                                  </div>

                                                </div>








      <div class="form-group col-md-12 col-md-offset-5" style="padding-top: 20px;">
          {!!Form::button('<i class="fas fa-save"></i> GUARDAR', ['class' => 'btn btn-success col-md-2', 'type' => 'submit'])!!}
      </div>


        <script>
