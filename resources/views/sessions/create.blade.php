@extends ('layouts.app')

@section ('pageContent')
<div class="container">

<div class="col-sm-8">

  <h1>{{ trans('astroties.signin') }}</h1>

  <form action="/login" method="post">
    @csrf

    <div class="form-group">
      <label for="email">{{ trans('astroties.email') }}: </label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">{{ trans('astroties.password') }}: </label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
      <a href="/sifreyenile">{{ trans('astroties.forgotpassword') }}</a>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">{{ trans('astroties.signin') }}</button>
    </div>
  </form>

</div>

</div>
@endsection
