<div class="card-header align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">
        {{ $title }}
    </h4>
    <a href="{{ $edit_route }}"><i class="bx bx-edit-alt fs-22"></i></a>
    <a href="javascript:void(0);" onclick="confirmAction('deleteForm2')">
        <i class="bx bx-trash fs-20"></i>
    </a>
    <form id="deleteForm2" action="{{ $delete_route }}" class="d-none" method="POST">
        @method('DELETE')
        @csrf
    </form>
</div><!-- end card header -->