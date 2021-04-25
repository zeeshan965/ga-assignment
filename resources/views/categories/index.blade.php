<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class = "row">
                        <div class = "col-lg-12 margin-tb">
                            <div class = "pull-left">
                                <h2>Laravel 8 Grocer App Assignment</h2>
                            </div>
                            <div class = "pull-right">
                                <a class = "btn btn-success" href = "{{ route('categories.create') }}"> Add Category</a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class = "alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class = "table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th width = "280px">Action</th>
                        </tr>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item -> name }}</td>
                                <td>
                                    <form action = "{{ route( 'categories.destroy', $item -> id ) }}" method = "POST">

                                        <a class = "btn btn-info" href = "{{ route( 'categories.show', $item -> id ) }}">Show</a>

                                        <a class = "btn btn-primary" href = "{{ route( 'categories.edit', $item -> id ) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type = "submit" class = "btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $categories -> links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
