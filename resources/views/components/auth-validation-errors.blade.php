@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <p class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </p>
    </div>
@endif
