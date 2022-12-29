<?php

namespace App\Actions\Practical;


use App\Models\User;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class Collection
{
    use AsAction;
    public function handle()
    {
        // Using all() method on any collection will return all remaining result.

        /**
         * The map and reject method
         *
         * The reject method remove any empty element from the array collection
         *
         * The map method iterates through the collection and passes each value to the given callback. The callback is
         * free to modify the item and return it, thus forming a new collection of modified items
         */

        $array = ['taylor', 'abigail'];
        $collection1 = collect($array)->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
            return empty($name);
        });
        //dd($collection1);

        /**
         * The shift method
         *
         * The shift method removes and returns the first item from the collection
         */
        $collection = collect([1, 2, 3, 4, 5]);
        $collection2 = $collection->shift(3);
        //dd($collection2);
        // collect([1, 2, 3])

        $collection3 = $collection->all();
        //dd($collection3);
        // [4, 5]

        /**
         * The Tap method
         *
         * The tap method passes the collection to the given callback, allowing you to "tap" into the collection at a
         * specific point and do something with the items while not affecting the collection itself.
         *
         * Note: The second tap() method is using the collection result return after the first tap() method
         */
        // The query below return same result but the 2nd one is more efficient
       /* $user = User::all()->filter(function ($users){
            return $users->rate <= 20;
        })->tap(function ($user) {
            Log::info($user->pluck('company_name', 'name')->all());
        });*/
        $user = User::where('rate', '<=', 20)->get()->tap(function ($user) {
            Log::info($user->pluck('company_name', 'name')->all());
        })->where('occupation', '=', 'Engineer')->tap(function ($collection) {
            Log::info($collection->pluck('company_name', 'name')->all());
        });
       //print_r($user);

        $collection = collect([1, 2, 3, 4, 5])
            ->sort()
            ->tap(function ($collection) {
                Log::info('Values after sorting', $collection->values()->all());
            })->shift();

        /**
         * The each() method
         *
         */
        $user = User::all()->each(function ($user) {
            return $user->rate == 67 ? false : $user;
        });
       //print_r($user);
    }
}
