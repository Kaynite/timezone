<a href="{{ route('admins.edit', $id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
@if (auth('admin')->id() !== $id) {{-- Will Remove The Delete Button for the Current Admin User --}}
<button type="button" class="btn btn-sm btn-danger" data-target="#adminModal{{$id}}" data-toggle="modal">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>
<div class="modal fade" id="adminModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.admins.modal title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('admin.admins.modal body with name', ['name' => $username]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('common.close') }}</button>
                <form action="{{ route('admins.destroy', $id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
