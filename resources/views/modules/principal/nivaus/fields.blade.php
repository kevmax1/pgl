<!-- Libelle Fr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    {!! Form::text('libelle_fr', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Fr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    {!! Form::text('libelle_en', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    <label for="section_id">Section:</label>
    <select class="form-control" id="section_id" name="section_id">
        @foreach($sections as $section)
            <option {{ (isset($nivau) && $nivau->cycle->section->id == $section->id) ? "selected" : "" }} value="s-{{ $section->id }}">{{ $section->libelle_fr }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <label for="cycle_id">Cycle:</label>
    <select class="form-control" id="cycle_id" name="cycle_id">
        @foreach($cycles as $cycle)
            <option {{ (isset($nivau) && $nivau->cycle->id == $section->id) ? "selected" : "" }} class="s-{{ $cycle->section->id }}" value="{{ $cycle->id }}">{{ $cycle->libelle_fr }}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('niveaux.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('custom_js')
    <script src="/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded",function(event){
            $("#cycle_id").chained("#section_id");
        });
    </script>
@endsection