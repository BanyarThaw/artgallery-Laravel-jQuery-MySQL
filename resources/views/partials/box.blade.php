<div class="box-content">
    <div class="d-flex align-items-center mt-1">
        <div class="flex-grow-1 text-muted">{{ $name }}</div>
        <div class="flex-shrink-0">
            <div class="d-flex gap-3">
                <a href="{{ $edit_route }}">
                    <i class="bx bx-edit-alt fs-20"></i>
                </a>
                <a href="{{ $show_route }}"><i class="bx bx-show-alt fs-22"></i></a>
                <a href="javascript:void(0);" onclick="confirmAction('deleteForm{{ $id }}')">
                    <i class="bx bx-trash fs-20"></i>
                </a>
                <form id="deleteForm{{ $id }}" action="{{ $delete_route }}" class="d-none" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>