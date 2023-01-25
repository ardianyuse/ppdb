{!! Form::hidden('group_id', $group->id) !!}
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'Student' }}</label>
    <select class="form-control" id="student-option" name="student_id">
        @foreach ($students as $student)
          <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
