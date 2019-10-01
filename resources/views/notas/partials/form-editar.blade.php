<div class="panel panel-primary">
    <div class="panel panel-heading">INGRESE EDITE LOS DATOS CORRESPONDIENTES...</div>
    <div class="panel panel-body">
        @if(!empty($notas->nota_ta))
        <div class="form-row">
            <div class="form-group col-sm-2">
                <strong>Trabajo academico: </strong><br>
                {!!Form::number('nota_ta', null, ['class' => 'form-control col-md-4', 'min' => '1', 'max' => '10'])!!}
            </div>
            <div class="form-group col-sm-2">
                <strong>Nro. parcial: </strong><br>
                {!!Form::text('parcial', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
            </div>
            <div class="form-group col-sm-2">
                <strong>Nro. quimestre: </strong><br>
                {!!Form::text('quimestre', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
            </div>
            <div class="form-group col-md-2">
                <strong>Descripcion: </strong><br>
                {!!Form::text('descripcion', null, ['class' => 'form-control col-md-6'])!!}
                {!!Form::hidden('matriculados_id')!!}
                {!!Form::hidden('materias_id')!!}
            </div>
            <div class="form-group col-md-12">
                {!!Form::button('<i class="far fa-save"></i> Guardar', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
            </div>
        </div>
        @elseif(!empty($notas->nota_ti))
        <div class="form-row">
                <div class="form-group col-sm-2">
                    <strong>Trabajo invividual: </strong><br>
                    {!!Form::number('nota_ti', null, ['class' => 'form-control col-md-4', 'min' => '1', 'max' => '10'])!!}
                </div>
                <div class="form-group col-sm-2">
                    <strong>Nro. parcial: </strong><br>
                    {!!Form::text('parcial', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                </div>
                <div class="form-group col-sm-2">
                    <strong>Nro. quimestre: </strong><br>
                    {!!Form::text('quimestre', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                </div>
                <div class="form-group col-md-2">
                    <strong>Descripcion: </strong><br>
                    {!!Form::text('descripcion', null, ['class' => 'form-control col-md-6'])!!}
                    {!!Form::hidden('matriculados_id')!!}
                    {!!Form::hidden('materias_id')!!}
                </div>
                <div class="form-group col-md-12">
                    {!!Form::button('<i class="far fa-save"></i> Guardar', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
                </div>
            </div>
            @elseif(!empty($notas->nota_tg))
            <div class="form-row">
                    <div class="form-group col-sm-2">
                        <strong>Trabajo grupal: </strong><br>
                        {!!Form::number('nota_tg', null, ['class' => 'form-control col-md-4', 'min' => '1', 'max' => '10'])!!}
                    </div>
                    <div class="form-group col-sm-2">
                        <strong>Nro. parcial: </strong><br>
                        {!!Form::text('parcial', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                    </div>
                    <div class="form-group col-sm-2">
                        <strong>Nro. quimestre: </strong><br>
                        {!!Form::text('quimestre', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                    </div>
                    <div class="form-group col-md-2">
                        <strong>Descripcion: </strong><br>
                        {!!Form::text('descripcion', null, ['class' => 'form-control col-md-6'])!!}
                        {!!Form::hidden('matriculados_id')!!}
                        {!!Form::hidden('materias_id')!!}
                    </div>
                    <div class="form-group col-md-12">
                        {!!Form::button('<i class="far fa-save"></i> Guardar', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
                    </div>
                </div>
                @elseif(!empty($notas->nota_le))
                <div class="form-row">
                        <div class="form-group col-sm-2">
                            <strong>Leccion: </strong><br>
                            {!!Form::number('nota_le', null, ['class' => 'form-control col-md-4', 'min' => '1', 'max' => '10'])!!}
                        </div>
                        <div class="form-group col-sm-2">
                            <strong>Nro. parcial: </strong><br>
                            {!!Form::text('parcial', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                        </div>
                        <div class="form-group col-sm-2">
                            <strong>Nro. quimestre: </strong><br>
                            {!!Form::text('quimestre', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                        </div>
                        <div class="form-group col-md-2">
                            <strong>Descripcion: </strong><br>
                            {!!Form::text('descripcion', null, ['class' => 'form-control col-md-6'])!!}
                            {!!Form::hidden('matriculados_id')!!}
                            {!!Form::hidden('materias_id')!!}
                        </div>
                        <div class="form-group col-md-12">
                            {!!Form::button('<i class="far fa-save"></i> Guardar', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
                        </div>
                    </div>
                    @elseif(!empty($notas->nota_ev))
                    <div class="form-row">
                            <div class="form-group col-sm-2">
                                <strong>Evaluacion: </strong><br>
                                {!!Form::number('nota_ev', null, ['class' => 'form-control col-md-4', 'min' => '1', 'max' => '10'])!!}
                            </div>
                            <div class="form-group col-sm-2">
                                <strong>Nro. parcial: </strong><br>
                                {!!Form::text('parcial', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                            </div>
                            <div class="form-group col-sm-2">
                                <strong>Nro. quimestre: </strong><br>
                                {!!Form::text('quimestre', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                            </div>
                            <div class="form-group col-md-2">
                                <strong>Descripcion: </strong><br>
                                {!!Form::text('descripcion', null, ['class' => 'form-control col-md-6'])!!}
                                {!!Form::hidden('matriculados_id')!!}
                                {!!Form::hidden('materias_id')!!}
                            </div>
                            <div class="form-group col-md-12">
                                {!!Form::button('<i class="far fa-save"></i> Guardar', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
                            </div>
                        </div>
                        @elseif(!empty($notas->conducta))
                    <div class="form-row">
                            <div class="form-group col-sm-2">
                                <strong>Conducta: </strong><br>
                                {!!Form::number('conducta', null, ['class' => 'form-control col-md-4', 'min' => '1', 'max' => '10'])!!}
                            </div>
                            <div class="form-group col-sm-2">
                                <strong>Nro. parcial: </strong><br>
                                {!!Form::text('parcial', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                            </div>
                            <div class="form-group col-sm-2">
                                <strong>Nro. quimestre: </strong><br>
                                {!!Form::text('quimestre', null, ['class' => 'form-control col-md-2', 'readonly'])!!}
                            </div>
                            <div class="form-group col-md-2">
                                <strong>Descripcion: </strong><br>
                                {!!Form::text('descripcion', null, ['class' => 'form-control col-md-6'])!!}
                                {!!Form::hidden('matriculados_id')!!}
                                {!!Form::hidden('materias_id')!!}
                            </div>
                            <div class="form-group col-md-12">
                                {!!Form::button('<i class="far fa-save"></i> Guardar', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
                            </div>
                        </div>
        @endif
    </div>
</div>
