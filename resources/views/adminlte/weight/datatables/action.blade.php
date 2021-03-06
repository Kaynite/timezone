<a href="{{ route('weight.edit', $id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
<button type="button" class="btn btn-sm btn-danger" data-target="#manufacturerModal{{$id}}" data-toggle="modal">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>
<div class="modal fade" id="manufacturerModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.weight.modal.title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('admin.weight.modal.body with name', ['name' => $unit]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.weight.modal.close') }}</button>
                <form action="{{ route('weight.destroy', $id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">{{ __('admin.weight.modal.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
