@extends('layouts.app')

@section('content')



<script> 
    window.App = <?= json_encode([
        'project' => $project,
        'projectId' => $project->id,
        'chanId' => $chanId,
        'userName' => auth()->user()->name,
        'tasks' => $tasks]); ?>
</script>


<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                ID: {{ $project->id}}
                    
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