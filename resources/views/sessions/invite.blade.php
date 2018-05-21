@extends ('layouts.app')

@section ('pageContent')
<div class="container">

<div class="card" >
  <div class="card-header">
    <h2>{{ trans('astroties.invite') }}</h2>
  </div>
  <div class="card-block">
    <div class="container">
      <p>{{ trans('astroties.invitetext1') }}</p>
      <p>{{ trans('astroties.invitetext2') }} <strong>{{ config('constants.INVITATION_EARNED_CREDITS') }}</strong> {{ trans('astroties.invitetext3') }}</p>
    </div>
    <div class="container">
      <form action="/invite" method="post">
        @csrf

        <div class="form-group">
          <label for="email">{{ trans('astroties.email') }}: </label>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{ trans('astroties.send') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
@endsection
