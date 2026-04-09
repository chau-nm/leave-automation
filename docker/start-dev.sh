#!/usr/bin/env sh
set -e
trap 'kill $(jobs -p) 2>/dev/null; exit 0' INT TERM

count=0;
max=5;

until php artisan tinker --execute="DB::select('SELECT 1')" > /dev/null 2>&1
do
    echo "WAITING CONNECT DATABASE";
    sleep 1;
    count=$((count + 1))

    if [ $count -ge $max ]; then
        echo "CONNECT DATABASE TIMEOUT";
        exit 1;
    fi;
done;

composer setup;

php artisan octane:frankenphp --watch &
npm run dev &
wait
