@extends ('layouts.app')

@section ('pageContent')
<div class="container">

<div class="card">
  <div class="card-header">
    <h2>{{ trans('astroties.messages') }}</h2>
  </div>
  <div class="card-block">
    <div class="container">
      <p>{{ trans('astroties.messageempty') }}</p>
    </div>
  </div>
</div>

</div>
@endsection
