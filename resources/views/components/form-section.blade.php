@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ $submit ?? '' }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-5 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }} dark:border-gray-600">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center px-4 py-3 text-right dark:border-gray-600">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>