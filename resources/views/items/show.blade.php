<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Show Item' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class = "row">
                        <div class = "col-xs-12 col-sm-12 col-md-12">
                            <div class = "form-group">
                                <strong>Name:</strong>
                                {{ $item -> name }}
                            </div>
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12">
                            <div class = "form-group">
                                <strong>Price:</strong>
                                {{ $item -> price }}
                            </div>
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12">
                            <div class = "form-group">
                                <strong>Category:</strong>
                                {{ $item -> getRelation ( 'category' ) -> name ?? '' }}
                            </div>
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12 text-center">
                            <a class = "btn btn-primary" href = "{{ route( 'items.index' ) }}"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
