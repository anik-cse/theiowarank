<x-app-layout>
    @section('css')
    <!-- HTag Styles -->
    <link rel="stylesheet" href="{{ mix('css/htag.css') }}">
    <link rel="stylesheet" href="{{ mix('css/select2.tailwind.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Slider') }}
        </h2>
    </x-slot>

    <div class="py-10 px-4">
        <div class="rounded shadow bg-white dark:bg-gray-800 dark:text-gray-900">
            <div class="p-4">
                <div class="w-full px-2 flex items-center justify-between">
                    <h3 class="text-2xl font-bold dark:text-gray-100">Create a slider content.</h3>
                    <a href="{{ route('admin.slider.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Return back</a>
                  </div>  
                <form action="{{ route('admin.slider.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="mt-4">
                        <img src="{{ $slide->getFirstMediaUrl('slider') }}" id="image" style="width: 200; height: auto;">
                    </div>
                    <!-- image -->
                    <div class="mt-4">
                        <x-jet-label for="image" value="{{ __('Slider image') }}" />
                        <x-jet-input id="image" type="file" class="mt-1 block w-full" name="image" :value="old('image')" onchange="loadFile(event,'image')" />
                        <x-jet-input-error for="image" class="mt-2" />
                    </div>
                    <div class="mt-4" x-cloak>
                        <x-jet-label for="animation_id" value="{{ __('Image Animation') }}" />
                        <select
                            class="selectpicker border border-gray-300 text-gray-900 dark:bg-gray-800 dark:text-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 px-3 rounded-md shadow-sm mt-1 block w-full" style="width: 100%"
                            name="animation_id" 
                            data-placeholder="Select animation"
                            data-allow-clear="false"
                            title="Select animation">
                            @foreach ($animations as $animation)
                            <option value="{{ $animation->id }}" {{ old('animation_id', $slide->animation_id) == $animation->id ? "selected" : "" }}>{{ $animation->title }}</option> 
                            @endforeach
                        </select>
                        <x-jet-input-error for="animation_id" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $slide->title)" required autofocus autocomplete="title" />
                        <x-jet-input-error for="title" class="mt-2" />
                    </div>
                    <div class="mt-4" x-cloak>
                        <x-jet-label for="status" value="{{ __('Status') }}" />
                        <select
                            class="border border-gray-300 text-gray-900 dark:bg-gray-800 dark:text-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 px-3 rounded-md shadow-sm mt-1 block w-full" style="width: 100%"
                            name="status" 
                            data-placeholder="Select animation"
                            data-allow-clear="false"
                            title="Select animation">
                            <option value="active" {{ old('status', $slide->status) == 'active' ? "selected" : "" }}>Active</option> 
                            <option value="disabled" {{ old('status', $slide->status) == 'disabled' ? "selected" : "" }}>Disabled</option> 
                        </select>
                        <x-jet-input-error for="animation_id" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="sort_description	" value="{{ __('Sort Description') }}" />
                        <textarea class="block mt-1 border border-gray-300 text-gray-900 dark:bg-gray-800 dark:text-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2 px-3 rounded-md shadow-sm w-full" name="sort_description" :value="old('sort_description')" rows="2" id="sort_description" required>{{ $slide->sort_description }}</textarea>
                        <x-jet-input-error for="sort_description" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="long_description" value="{{ __('Long Description') }}" />
                        <textarea x-cloak class="block mt-1 text-gray-900 dark:text-gray-800 w-full ckeditor" name="long_description" rows="10"  id="task-textarea">{!! $slide->long_description !!}</textarea>
                        <x-jet-input-error for="long_description" class="mt-2" />
                    </div>
                    <div class="mt-3">
                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    @include('admin.ckeditor')
    <script src="{{ mix('js/jquery.js') }}"></script>
    <script src="{{ mix('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').select2();
        });
    </script>
    @endpush
</x-app-layout>