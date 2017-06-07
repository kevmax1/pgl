<div class="form-group xs-pt-10">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group xs-pt-10">
    {!! Form::label('date_debut', 'Date Debut:') !!}
    {!! Form::date('date_debut', isset($anneeAcademique) ? $anneeAcademique->date_debut :null, ['class' => 'form-control']) !!}
</div>
<div class="form-group xs-pt-10">
    {!! Form::label('date_fin', 'Date Fin:') !!}
    {!! Form::date('date_fin', isset($anneeAcademique) ? $anneeAcademique->date_fin :null, ['class' => 'form-control']) !!}
</div>
<div class="row xs-pt-15">
	<div class="col-xs-6 col-xs-offset-3">
		<p class="text-center">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</p>
	</div>
</div>