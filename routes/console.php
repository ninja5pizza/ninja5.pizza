<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('bitcoin:cache-price')->everyFifteenMinutes();
Schedule::command('bitcoin:ord-collection:cache-stats')->everyFifteenMinutes();
