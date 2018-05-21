@extends ('layouts.app')

@section ('pageContent')
<div class="container">

<div class="card">
  <div class="card-header">
    <h2>{{ trans('astroties.welcome') }} {{Auth::user()->name}}</h2>
  </div>
  <div class="card-body">
    <p class="card-text">{{trans('astroties.name') }}: {{ Auth::user()->name}}</p>
    <p class="card-text">E-mail adresiniz: {{Auth::user()->email}}</p>
    <a href="/changePassword" class="btn btn-primary">{{trans('astroties.changePassword') }}</a>
    <p class="card-text">
      Bugün Ay {{ $transitsnow->ay->burcu }} burcunda {{ $transitsnow->ay->burcDerecesi }}&deg; {{ $transitsnow->ay->burcDakikasi }}'<br>
      Bugün Güneş {{ $transitsnow->gunes->burcu }} burcunda {{ $transitsnow->gunes->burcDerecesi }}&deg; {{ $transitsnow->gunes->burcDakikasi }}'
      <br>
      Arkadaşlık bekleyen {{ count($user->getFriendRequests()) }}
      <br>
      Arkadaş sayısı {{ $user->getFriendsCount() }}

      @if (count($user->getFriendRequests()) > 0)
        @foreach ($user->getFriendRequests() as $friendRequest)
      <div class="row">
      @php
      $sender = \App\Http\Models\User::where('id', '=', $friendRequest->sender_id)->first();
      @endphp
        <div>
          You have friendship request from {{ $sender->name }}
        </div>
        <form action="/friendships/acceptFriendshipRequest" method="post">
          <div class="form-group row">
            <div class="col-8 col-form-label">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="candidate" value="{{ $friendRequest }}">
              <button type="submit" class="btn btn-primary">{{ trans('astroties.acceptRequest') }}</button>
            </div>
          </div>
        </form>
        <div class="col-1"></div>
        <form action="/friendships/denyFriendshipRequest" method="post">
          <div class="form-group row">
            <div class="col-8 col-form-label">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="candidate" value="{{ $friendRequest }}">
              <button type="submit" class="btn btn-primary">{{ trans('astroties.denyRequest') }}</button>
            </div>
          </div>
        </form>
      </div>
        @endforeach
      @endif
      
    </p>
  </div>
</div>
<br>

<div class="card">
  <div class="card-header">
    <h2>{{ trans('astroties.friends') }}</h2>
  </div>
  @if(count($user->getFriends()) > 0)
  <div>
    <div class="row">
      @foreach ($user->getFriends() as $friend)
        <div class="col-2" align="center">
          <br>
          <img src="/img/avatars/{{$friend->avatar}}" alt="" height="42" width="42"></img>
          <br>
          <a href="http://astroties.com/publicprofile/{{$friend->id}}">{{$friend->name}}</a>
        </div>

      @endforeach
    </div>
  </div>
  @else 
  <div>
  {{ trans('astroties.dontHaveAnyFriends') }}
  </div>
  @endif
  <div class="card-body">
  {{ $dailyFreePrediction }}
  </div>
</div>
<br>

<div class="card">
  <div class="card-header">
    <h2>{{ trans('astroties.dailyMoonPredictions') }}</h2>
  </div>
  <div class="card-body">
  {{ $dailyFreePrediction }}
  </div>
</div>
<br>

<div class="card">
  <div class="card-header">
    <h2>{{ trans('astroties.dailyPredictions') }}</h2>
  </div>
  <div class="card-body">
@if(isset($dailyPredictions))
@foreach ($dailyPredictions as $prediction)
    <h5 class="card-text">{{ $prediction->transit_gezegen }} {{ trans('astroties.and' )}}
        {{ $prediction->natal_gezegen }} {{ trans('astroties.has') }}
        {{ $prediction->aci_tipi }} {{ trans('astroties.aspect') }}</h5>
    <p class="card-text">{{ $prediction->aci_yorumu }}</p>
@endforeach
@else
    <p class="card-text">{{ trans('astroties.predictionsCouldBeHereText') }}</p>
    <a href="/account" class="btn btn-primary btn-small">{{ trans('astroties.buyDailyPredictions') }}</a>
@endif
  </div>
</div>

</div>
<br>
@endsection
