<?php
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CategoryController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// 1|aPvb1WCXBQ6JZsgTXSwurmtztSpkQuCSBrV40P4z


// Route::get('users',function(Request $request){

//     return User::all();
// });
// Route::resource('users',UserController::class);

Route::get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
Route::get('user/{id}',[UserController::class,'UserByID']);
Route::delete('users/{id}',[UserController::class,'destroy']);
Route::post('userbyId',[UserController::class,'getuserbyID']);
Route::post('editProfile',[UserController::class,'editProfile'])->middleware('auth:sanctum');
Route::get('like/{id}',[UserController::class,'like'])->middleware('auth:sanctum');
Route::get('showlike/{id}',[ProductController::class,'showlikeproduct'])->middleware('auth:sanctum');







Route::get('products',[ProductController::class,'index'])->middleware('auth:sanctum');
Route::get('productsWithOutLogin',[ProductController::class,'productsWithOutLogin']);

// Route::get('products/{id}',[ProductController::class,'show'])->middleware('auth:sanctum');
Route::get('product/{catID}',[ProductController::class,'showcat']);
Route::get('products/{id}',[ProductController::class,'show']);
Route::delete('products/{id}',[ProductController::class,'destroy']);
Route::delete('deleteproduct/{id}',[ProductController::class,'delete'])->middleware('auth:sanctum');
Route::delete('favdelete/{id}',[ProductController::class,'favdelete'])->middleware('auth:sanctum');





Route::get('categories',[CategoryController::class,'index']);
Route::get('categories/{id}',[CategoryController::class,'show']);
Route::delete('categories/{id}',[CategoryController::class,'destroy'])->middleware('auth:sanctum');
Route::delete('categories/{id}',[CategoryController::class,'destroy']);

Route::post("/products",[ProductController::class,'store'])->middleware('auth:sanctum');

Route::post("/purchases/{id}",[PurchasesController::class,'store'])->middleware('auth:sanctum');
Route::delete("/nof/{id}",[PurchasesController::class,'destroy'])->middleware('auth:sanctum');

Route::post("image/{id}",[ProductController::class,'updateImage'])->middleware('auth:sanctum');
Route::post("fav",[ProductController::class,'AddFav'])->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/profile', [UserController::class, 'getdata'])->middleware('auth:sanctum');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/isFav/{product_id}', [UserController::class, 'isFav'])->middleware('auth:sanctum');


Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');
Route::post('/forget', [ForgetPasswordController::class, 'forget']);
Route::post('/reset', [ForgetPasswordController::class, 'reset']);

Route::get('/oo/{id}', [UserController::class, 'hello']);
//Route show detailes of product
Route::get('productid/{id}', [ProductController::class, 'ShowDetailesProduct']);

Route::post("/buy/{id}",[NotificationController::class,'store'])->middleware('auth:sanctum');
Route::get("notification/{id}",[NotificationController::class,'notifay'])->middleware('auth:sanctum');




// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//         'device_name' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }

//     return $user->createToken($request->device_name)->plainTextToken;
// });

