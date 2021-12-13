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
        <h1 center>Todos Table</h1>
        <button class="btn btn-sm btn-info text-white my-3" data-toggle="tooltip" title="Create" data-bs-toggle="modal"
            data-bs-target="#createModal">
            <i class="las la-plus-square"></i>
            | Create
        </button>
        <table class="table table-card table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todos as $todo)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $todo->name }}</td>
                    <td>{{ $todo->description }}</td>
                    <td>
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
                    </td>
                </tr>
                @include('todos.modal.update')
                <!-- update modal -->
                @empty
                <tr>
                    <td>No Records</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="m-2">
            {!! $todos->links() !!}
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

