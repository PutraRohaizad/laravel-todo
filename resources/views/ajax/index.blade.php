@extends('layout.base')

@section('content')

<div class="card mt-2">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-jph-tab" data-bs-toggle="pill" data-bs-target="#pills-jph"
                    type="button" role="tab" aria-controls="pills-jph" aria-selected="true">JsonPlaceHolder</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-fetch-tab" data-bs-toggle="pill" data-bs-target="#pills-fetch"
                    type="button" role="tab" aria-controls="pills-fetch" aria-selected="false">Fetch</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-jph" role="tabpanel" aria-labelledby="pills-jph-tab">

                <h5>Fetching data from JSONPLACEHOLDER</h5>
                <button class="btn btn-warning" onclick="getData()">Get Todos data</button>
                <div id="output"></div>

            </div><!-- end ajax -->
            <div class="tab-pane fade" id="pills-fetch" role="tabpanel" aria-labelledby="pills-fetch-tab">
                fetch
            </div>
            <!--end fetch -->
        </div>
    </div>
</div>

<script>
    async function getData(){
        let url = 'https://jsonplaceholder.typicode.com/todos';
        let ouput = document.querySelector('#output');
        let lists = [];
        try {
            let res = await fetch(url);
            let todos = await res.json();            
            todos.forEach(todo => {
                let item = `<li class="list-group-item">${todo.title}</li>`
                lists.push(item);
            });

            ouput.innerHTML = lists;
            

        } catch (error) {
            console.error(error);
        }
    }

</script>

@endsection