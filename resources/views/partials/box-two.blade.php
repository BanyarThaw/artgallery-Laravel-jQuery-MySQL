<div class="list-group-item nested-2">
    <div class=" align-items-center d-flex">
        <p class="mb-0 flex-grow-1">{{ $name }}</p>
        <div class="flex-shrink-0">
            <a href="{{ $edit_route }}">
                <i class="bx bx-edit-alt fs-20"></i>
            </a>
            <a href="javascript:void(0);" onclick="confirmAction('deleteForm{{ $id }}')">
                <i class="bx bx-trash fs-20"></i>
            </a>
            <form id="deleteForm{{ $id }}" action="{{ $delete_route }}" class="d-none" method="POST">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div><!-- end card header -->
</div>