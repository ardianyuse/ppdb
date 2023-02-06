<div class="form-group {{ $errors->has('schedule_id') ? 'has-error' : ''}}">
    <label for="schedule_id" class="control-label">{{ 'Schedule Id' }}</label>
    <input class="form-control" name="schedule_id" type="number" id="schedule_id" value="{{ isset($presence->schedule_id) ? $presence->schedule_id : ''}}" >
    {!! $errors->first('schedule_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
    <input class="form-control" name="student_id" type="number" id="student_id" value="{{ isset($presence->student_id) ? $presence->student_id : ''}}" >
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'Note' }}</label>
    <input class="form-control" name="note" type="text" id="note" value="{{ isset($presence->note) ? $presence->note : ''}}" >
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_at') ? 'has-error' : ''}}">
    <label for="start_at" class="control-label">{{ 'Start At' }}</label>
    <input class="form-control" name="start_at" type="datetime-local" id="start_at" value="{{ isset($presence->start_at) ? $presence->start_at : ''}}" >
    {!! $errors->first('start_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_at') ? 'has-error' : ''}}">
    <label for="end_at" class="control-label">{{ 'End At' }}</label>
    <input class="form-control" name="end_at" type="datetime-local" id="end_at" value="{{ isset($presence->end_at) ? $presence->end_at : ''}}" >
    {!! $errors->first('end_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
