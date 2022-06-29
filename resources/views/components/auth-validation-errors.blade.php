@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="basic__text--error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
