@extends('layouts.app')

@section('content')



<!-- <script src="{{ asset('js/tasklist.js') }}"></script> -->


<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                     You are logged in!!!
                     <hr>
                    
                    
                    <div><h4>Task List</h4><hr></div>
                    
                    <tasklist></tasklist>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- production version, optimized for size and speed -->
<!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- <script src="{{ asset('js/tasklist.js') }}"></script> -->


@endsection