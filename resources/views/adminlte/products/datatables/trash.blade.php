<form action="{{ route('products.restore', $id) }}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i></button>
</form>

<button type="button" class="btn btn-sm btn-danger" data-target="#productModal{{$id}}" data-toggle="modal">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>
<div class="modal fade" id="productModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.products.modal.title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('admin.products.modal.body with name', ['name' => $title]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.products.modal.close') }}</button>
                <form action="{{ route('products.forceDelete', $id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('admin.products.modal.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
