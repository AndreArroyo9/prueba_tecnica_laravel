<?php

arch('Controllers')
    ->expect('App\Controllers')
    ->toExtend(\App\Http\Controllers\Controller::class);

arch('Policies')
    ->expect('App\Models')
    ->toExtend(\Illuminate\Database\Eloquent\Model::class);
