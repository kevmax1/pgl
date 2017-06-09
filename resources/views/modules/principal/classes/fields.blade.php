<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>
<input type="hidden" value="0" name="effectif_normal">
<div class="form-group col-sm-6">
    <label for="section_id">Section:</label>
    <select class="form-control" id="section_id" name="section_id">
        @foreach($sections as $section)
            <option {{ (isset($classe) && $classe->serie->niveau->cycle->section->id == $section->id) ? "selected" : "" }} value="s-{{ $section->id }}">{{ $section->libelle_fr }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <label for="cycle_id">Cycle:</label>
    <select class="form-control" id="cycle_id" name="cycle_id">
        @foreach($cycles as $cycle)
            <option {{ (isset($classe) && $classe->serie->niveau->cycle->id == $cycle->id) ? "selected" : "" }} class="s-{{ $cycle->section->id }}" value="c-{{ $cycle->id }}">{{ $cycle->libelle_fr }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="niveau_id">Niveau:</label>
    <select class="form-control" id="niveau_id" name="niveau_id">
        @foreach($niveaux as $niveau)
            <option {{ (isset($classe) && $classe->serie->niveau->id == $niveau->id) ? "selected" : "" }} class="c-{{ $niveau->cycle->id }}" value="n-{{ $niveau->id }}">{{ $niveau->libelle_fr }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <label for="serie_id">Serie:</label>
    <select class="form-control" id="serie_id" name="serie_id">
        @foreach($series as $serie)
            <option {{ (isset($classe) && $classe->serie->id == $serie->id) ? "selected" : "" }} class="n-{{ $serie->niveau->id }}" value="{{ $serie->id }}">{{ $serie->libelle_fr }}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('classes.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('custom_js')
    <script src="/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded",function(event){
            $("#cycle_id").chained("#section_id");
            $("#niveau_id").chained("#cycle_id");
            $("#serie_id").chained("#niveau_id");
        });
    </script>
@endsection