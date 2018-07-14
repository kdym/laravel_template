<div class="form-group">
    {{ Form::label($name, $label) }}
    {{ Form::input('phone', $name, $default, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
