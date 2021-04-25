<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Items' ) }}
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
                                <a class = "btn btn-success" href = "{{ route( 'items.create' ) }}"> Add Items</a>
                                <a href = "javascript:;" data-toggle = "modal" data-target = "#import_items_modal"
                                   class = "btn btn-info"><i class="fa fa-plus"></i> Import Items</a>
                            </div>
                        </div>
                    </div>
                    @if ( $errors -> any() )
                        <div class = "alert alert-danger">
                            <strong>Whoops!</strong> Please only choose these file formats. doc,csv,xlsx,xls,docx<br>
                            <ul>
                                @foreach ( $errors -> all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ( $message = Session::get( 'success' ) )
                        <div class = "alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class = "table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th width = "280px">Action</th>
                        </tr>
                        @foreach ( $items as $item )
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item -> name }}</td>
                                <td>{{ $item -> price }}</td>
                                <td>{{ $item -> getRelation ( 'category' ) -> name ?? '' }}</td>
                                <td>
                                    <form action = "{{ route( 'items.destroy', $item -> id ) }}" method = "POST">
                                        <a class = "btn btn-info" href = "{{ route( 'items.show', $item -> id ) }}">Show</a>
                                        <a class = "btn btn-primary" href = "{{ route( 'items.edit', $item -> id ) }}">Edit</a>
                                        @csrf
                                        @method( 'DELETE' )
                                        <button type = "submit" class = "btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $items -> links() !!}
                </div>
            </div>
        </div>
    </div>
    @include( 'items.partials.import' )
</x-app-layout>
