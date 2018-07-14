@php
    $baseClass = class_basename($model);

    $routeName = ($routeName) ? $routeName : str_plural(strtolower($baseClass));
    $modelName = ($modelName) ? $modelName : strtolower($baseClass);

    $url = ($model->id) ? route($routeName . '.update', [$modelName => $model]) : route($routeName . '.store');

    $method = ($model->id) ? 'put' : 'post';
@endphp

{{ Form::model($model, array_merge(['id' => $id, 'url' => $url, 'method' => $method], $attributes)) }}

{{ Form::hidden('id', $model->id, ['id' => 'id']) }}
