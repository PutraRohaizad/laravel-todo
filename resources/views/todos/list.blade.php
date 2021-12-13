@extends('layout.base')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center mt-3" role="alert">
    <i class="las la-check-circle"></i>
    {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card mt-2">
    <div class="card-body">
        <h1 center>Todos List</h1>
        <button class="btn btn-sm btn-info text-white my-3" data-toggle="tooltip" title="Create" data-bs-toggle="modal"
            data-bs-target="#createModal">
            <i class="las la-plus-square"></i>
            | Create
        </button>

        <div class="row">
            @forelse ($todos as $todo)
            <div class="col-md-3">
                <div class="card mb-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $todo->name }}</h5>
                        <p class="card-text">{{ $todo->description }}</p>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" id="deleteForm">
                            {{-- Edit modal --}}
                            <button class="btn btn-sm btn-info" type="button" title="Edit" data-toggle="tooltip"
                                title="Create" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $todo->id }}">
                                <i class="las la-pen-alt"></i>
                            </button>
                            {{-- End edit modal --}}
                            @csrf
                            @method("delete")
                            <button class="btn btn-sm btn-outline-info" title="Delete">
                                <i class="las la-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @include('todos.modal.update')
            <!-- update modal -->
            @empty
            No record
            @endforelse
        </div>

    </div> <!-- end of card body -->
</div> <!-- end of card -->

@include('todos.modal.create')
<!-- create modal -->

<script>
    let deleteForm = document.querySelector('#deleteForm');
    deleteForm.addEventListener("submit", (e) => {
        e.preventDefault();
        if(confirm('Are you sure?')){
            e.target.submit();
        }
    })
</script>

@endsection