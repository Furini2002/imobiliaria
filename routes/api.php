<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CityController,
    PropertyController,
    PropertyImageController,
    PropertyTypeController,
    SimulationLogController,
    SiteStatisticsController,
    StatusController,
    TestimonialController
};

Route::prefix('v1')->middleware('api')->group(function () {

    Route::apiResource('cities', CityController::class)->names('cities');
    Route::apiResource('properties', PropertyController::class)->names('properties');
    Route::apiResource('property-images', PropertyImageController::class)->names('property-images');
    Route::get('/property-images/images-by-property/{propertyId}', [PropertyImageController::class, 'getImagesByPropertyId'])->name('property-images.by-property');
    Route::apiResource('property-types', PropertyTypeController::class)->names('property-types');
    Route::apiResource('simulation-logs', SimulationLogController::class)->names('simulation-logs');
    Route::apiResource('site-statistics', SiteStatisticsController::class)->names('site-statistics');
    Route::apiResource('statuses', StatusController::class)->names('statuses');
    Route::apiResource('testimonials', TestimonialController::class)->names('testimonials');

});
