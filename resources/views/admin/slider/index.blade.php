<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
    <script type="text/javascript">
        swal({
          title: "{!! Session::get('success') !!}",
          text: '',
          icon: 'success',
        });
    </script>
    @endif
    <div class="py-10 px-4">
        <div class="rounded shadow bg-white dark:bg-gray-800 dark:text-gray-900">
            <div class="p-4">
                <div class="w-full px-2 flex items-center justify-between">
                  <h3 class="text-2xl font-bold dark:text-gray-100">All Slides</h3>
                  <a href="{{ route('admin.slider.create') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 border border-gray-500 rounded">Add slide</a>
                </div>              
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                      <table class="w-full">
                        <thead>
                          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-300 dark:bg-gray-800">
                            <th class="px-4 py-3">Slide Title</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="w-1/6 px-4 py-3">Action</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                          @foreach($slides as $slide)
                          <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-300">
                            <td class="px-4 py-3">
                              <p class="font-semibold">{{ $slide->title }}</p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                              <span class="px-2 py-1 font-semibold leading-tight rounded-full text-green-700 {{ $slide->status == 'active' ? 'bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700'}}"> {{ $slide->status }} </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <a href="{{ route('admin.slider.edit', $slide->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Edit</a>
                                <form class="inline-block relative" action="{{ route('admin.slider.destroy', $slide->id) }}" method="POST">
                                  @csrf

                                  @method('DELETE')
                                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>