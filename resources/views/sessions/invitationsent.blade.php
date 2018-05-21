@extends ('layouts.app')

@section ('pageContent')
<div class="container">

<div class="card" >
  <div class="card-header">
    <h2>Davetin başarıyla gönderildi</h2>
  </div>
  <div class="card-block">
    <div class="container">
      <p>Davetiniz {{ $request['email'] }} adresine gönderildi. <br>
        Davet etmek istediğin başka bir arkadaşın varsa hemen ona da davet gönder!</p>
    </div>
    <div class="container">
      <form action="/invite" method="post">
        @csrf

        <div class="form-group">
          <label for="email">E-mail: </label>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Gönder</button>
        </div>

      </form>
    </div>
  </div>
</div>

</div>
@endsection
