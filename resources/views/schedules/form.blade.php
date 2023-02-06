<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($schedule->user_id) ? $schedule->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($schedule->group_id) ? $schedule->group_id : ''}}" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'Note' }}</label>
    <input class="form-control" name="note" type="text" id="note" value="{{ isset($schedule->note) ? $schedule->note : ''}}" >
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_at') ? 'has-error' : ''}}">
    <label for="start_at" class="control-label">{{ 'Start At' }}</label>
    <input class="form-control" name="start_at" type="datetime-local" id="start_at" value="{{ isset($schedule->start_at) ? $schedule->start_at : ''}}" >
    {!! $errors->first('start_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_at') ? 'has-error' : ''}}">
    <label for="end_at" class="control-label">{{ 'End At' }}</label>
    <input class="form-control" name="end_at" type="datetime-local" id="end_at" value="{{ isset($schedule->end_at) ? $schedule->end_at : ''}}" >
    {!! $errors->first('end_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
