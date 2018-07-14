<div class="form-group">
    {{ Form::label($name, $label) }}
    {{ Form::email($name, null, array_merge(['class' => 'form-control'], $attributes)) }}
</div>