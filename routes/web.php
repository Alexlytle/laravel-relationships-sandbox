<?php

use App\Models\City;
use App\Models\Room;
use App\Models\User;
use App\Models\Image;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

/*
|-----------------------
| Has one
|-----------------------
*/

// $user = User::find(1);
// dump($user->address);

/*
|-----------------------
| Has Many
|-----------------------
*/
$result = User::find(2);

// dump($result->comments);


// $result = Comment::find(1);

// dump($result->user->name);

// $result = Room::find(1);
// dump($result->reservations);
/*
 |--------------------
 |Many to Many
 |  A city may have many room types like single room, double room.
 |  Each room type can belong to many cities
 | 
 |-------------------- 
 */

// $result = City::find(2);

// dd($result->rooms);


// $result = Room::where('room_size',3)->get();



// foreach ($result as $room) {
        
//             foreach ($room->cities as $city) {

//                  dump($city->pivot);
//         }
// }


// $result = City::find(2);

// dump($result->rooms);

/**
 *  Has one through 
 *  ex: One address is related through a comment
 * 
*/

// $result = Comment::find(3);

// dump($result->country->country);




/**
 *  Has many through 
 *  ex: A company has many reservations through a user
 * 
*/


$result = Company::find(1);

dump($result->reservations);

/**
 * One to one polymorphic.
 * A user may have one image.
 * A city may have one image.
 * But there is no need to create seperate images database table for each model.
 * You can have one images table that will be used by both User and City model.
*/

// $result = User::find(3);

// dump($result->image);


// $result = Image::find(6);

// dump($result->imageable);

// $result = City::find(2);

// dump($result->image);


/**
 * one to many polymorphic
 * a comment may have be related to many room or image
 * a room or image may be related to many comments
*/

// $result = Room::find(10);

// dump($result->comments);

// $result = Image::find(5);
// dump($result->comments);

// $result = Comment::find(2);
// dump($result->commentable);
/**
 * many to many polymorphic
 * For example, 
 * users may like many images and rooms
 * images and rooms may be liked by many users
*/
// $result = User::find(7);
// dump($result->likedRooms);
// dump($result->likedImages);
// $result = Room::find(2);
// dump($result->likes);




/**
 * Querying and counting database relationships (sql select)
 * 
*/

// $result = User::find(1)->comments()
//                         ->where('rating','>',3)
//                         ->orWhere('rating','<',2)
//                         ->get();

// dd($result);


/*get all users that have comments greater than one */
// $result = User::has('comments','>',1)->get();
/* Give me all comments with users that have address  **/
// $result = Comment::has('user.address')->get();
/**
 * The amount of commments is greater than 2. and has a rating greater than 3
*/
// $result = User::whereHas('comments',function($q){
//         $q->where('rating','>',3);       
// },'>=',2)->get();
// dump($result);

/*
        get all users they dont have comments
*/

// $result = User::doesntHave('comments')->get();
// dump($result);

/* 
   Get all users comments that doesn't have a
*/
// $result = User::whereDoesntHave('comments',function($q){
//         $q->where('rating','>',2);       
// },'>',1)->get();

// dump($result);
/*
   Nested relationship
   Give me all the reservations which don't have comments that are rated less than two

*/
// $result = Reservation::whereDoesntHave('user.comments',function($q){
//         $q->where('rating','<',2);       
// })->get();
// dump($result);

/*
  Will add on the ammount of comments
*/
// $result = User::withCount('comments')->get();
// dump($result);

/**
 *  comments with query 
 * 
*/

// $result = User::withCount([
//         'comments',
//         'comments as negative_comments_count'=>function($q){
//                 $q->where('rating','>',2);
//         }
//         ])->get();
// dump($result);

/**
 * Insert/update/delete related models
*/

// $user = User::find(1);

//delete
// dump($user->address()->delete());
//create
// $user->address()->create(['number'=>4,'street'=>'test','country'=>'USA']);

//lazy and eager loading 
// $result = User::with(['address'])->get();

// foreach ($result as $user) {
//    echo "{$user->address} <br>";
// }


return view('welcome');


});
