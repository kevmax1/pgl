<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Fr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    {!! Form::text('libelle_fr', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    {!! Form::text('libelle_en', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    <label for="section_id">Section:</label>
    <select class="form-control" id="section_id" name="section_id">
        @foreach($sections as $section)
            <option {{ (isset($serie) && $serie->niveau->cycle->section->id == $section->id) ? "selected" : "" }} value="s-{{ $section->id }}">{{ $section->libelle_fr }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <label for="cycle_id">Cycle:</label>
    <select class="form-control" id="cycle_id" name="cycle_id">
        @foreach($cycles as $cycle)
            <option {{ (isset($serie) && $serie->niveau->cycle->id == $cycle->id) ? "selected" : "" }} class="s-{{ $cycle->section->id }}" value="c-{{ $cycle->id }}">{{ $cycle->libelle_fr }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="niveau_id">Niveau:</label>
    <select class="form-control" id="niveau_id" name="niveau_id">
        @foreach($niveaux as $niveau)
            <option {{ (isset($serie) && $serie->niveau->id == $niveau->id) ? "selected" : "" }} class="c-{{ $niveau->cycle->id }}" value="{{ $niveau->id }}">{{ $niveau->libelle_fr }}</option>
        @endforeach
    </select>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('series.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('custom_js')
    <script src="/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded",function(event){
            $("#cycle_id").chained("#section_id");
            $("#niveau_id").chained("#cycle_id");
        });
    </script>
@endsection