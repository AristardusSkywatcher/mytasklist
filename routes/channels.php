<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('{projectId}', function ($user, $project) {

    // $canAccess = [];

    // if ($user->email === 'tardu.demirel@live.com') {
    //     $canAccess = [1, 3];

    // }
    // if ($user->email === 'john@miller.com') {
    //     $canAccess = [2, 4];
    // }
    
    // return in_array($project, $canAccess);

        // return $project->participants->contains($user);
        
        return true;
});

