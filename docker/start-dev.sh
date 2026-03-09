#!/usr/bin/env sh
set -e
trap 'kill $(jobs -p) 2>/dev/null; exit 0' INT TERM

php artisan octane:frankenphp --watch &
npm run dev &
wait
