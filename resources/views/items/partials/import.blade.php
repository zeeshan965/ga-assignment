<!-- Modal -->
<div class = "modal fade import_items_modal" id = "import_items_modal" tabindex = "-1" role = "dialog"
     aria-labelledby = "notesLabel">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Import Items</h4>
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
            </div>
            <div class = "modal-body">
                <form action = "{{ route( 'items.import' ) }}" id = "importUser" method = "POST"
                      enctype = "multipart/form-data">
                    @csrf
                    <div class = "col-xs-12 col-sm-12 col-md-12">
                        <div class = "form-group">
                            <strong>Select to upload file!</strong>
                            <input type = "file" name = "file" required
                                   accept = ".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </div>

                        <button type = "submit" class = "inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                        text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900
                        focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Import Items from csv
                        </button>
                        <a class = "btn btn-light" href = "{{ asset('items.xlsx') }}">Download Sample File</a>
                    </div>
                </form>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-info" data-dismiss = "modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
