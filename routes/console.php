<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('bitcoin:cache-price')->everyFifteenMinutes();
Schedule::command('ord-collection:cache-stats')->everyFifteenMinutes();
