@php
$task = $tasks[$id - 1];
@endphp
<h1>Single task list</h1>
<div>
    {{-- <p>{{ $tasks[$id - 1]->title }}</p>
    <p>{{ $tasks[$id - 1]->description }}</p>
    <p>{{ $tasks[$id - 1]->long_description }}</p>
    <p>{{ $tasks[$id - 1]->completed }}</p>
    <p>{{ $tasks[$id - 1]->created_at }}</p>
    <p>{{ $tasks[$id - 1]->updated_at }}</p> --}}
    @foreach (get_object_vars($task) as $item => $value)
        <p>{{ $item }}: {{ $value }}</p>
    @endforeach
</div>
