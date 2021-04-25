<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Edit Item' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ( $errors -> any() )
                        <div class = "alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ( $errors -> all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action = "{{ route( 'items.update', $item -> id ) }}" method = "POST">
                        @csrf
                        @method( 'PUT' )

                        <div class = "row">
                            <div class = "col-xs-12 col-sm-12 col-md-12">
                                <div class = "form-group">
                                    <strong>Name:</strong>
                                    <input type = "text" name = "name" value = "{{ $item -> name }}"
                                           class = "form-control" placeholder = "Name">
                                </div>
                            </div>
                            <div class = "col-xs-12 col-sm-12 col-md-12">
                                <div class = "form-group">
                                    <strong>Price:</strong>
                                    <input type = "text" name = "price" value="{{ $item -> price }}"
                                           class = "form-control" placeholder = "Price">
                                </div>
                            </div>
                            <div class = "col-xs-12 col-sm-12 col-md-12">
                                <div class = "form-group">
                                    <strong>Category:</strong>
                                    <select name = "category" class = "form-control">
                                        <option value="">Select category</option>
                                        @foreach( $categories as $category )
                                            <option value = "{{ $category -> id }}"
                                                {{ ( $item -> category == $category -> id ) ? 'selected' : '' }} >{{ $category -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class = "col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type = "submit" class = "btn btn-primary">Submit</button>
                                <a class = "btn btn-primary" href = "{{ route( 'items.index' ) }}"> Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
