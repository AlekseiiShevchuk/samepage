<tr data-index="{{ $index }}">
    <td>{!! Form::text('content_blocks['.$index.'][value_name]', old('content_blocks['.$index.'][value_name]', isset($field) ? $field->name: ''), ['class' => 'form-control', 'required' => '']) !!}</td>
    @foreach($languages as $language)
        @php($value_name = 'value_' . $language->abbreviation)
    @if($value_name == 'value_en')
        <td>{!! Form::text('content_blocks['.$index.']['.$value_name.']', old('content_blocks['.$index.']['.$value_name.']', isset($field) ? $field->$value_name: ''), ['class' => 'form-control', 'required' => '']) !!}</td>
        @elseif($value_name == 'value_ar')
            <td>{!! Form::text('content_blocks['.$index.']['.$value_name.']', old('content_blocks['.$index.']['.$value_name.']', isset($field) ? $field->$value_name: ''), ['class' => 'form-control', 'dir' => 'rtl']) !!}</td>
    @else
        <td>{!! Form::text('content_blocks['.$index.']['.$value_name.']', old('content_blocks['.$index.']['.$value_name.']', isset($field) ? $field->$value_name: ''), ['class' => 'form-control']) !!}</td>
    @endif
    @endforeach

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>