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
    TestimonialController,
    NeighborhoodController
};

Route::prefix('v1')->middleware('api')->group(function () {

    Route::apiResource('cities', CityController::class)->names('cities');
    Route::get('properties/search', [PropertyController::class, 'indexBrief'])->name('properties.search');
    Route::apiResource('properties', PropertyController::class)->names('properties');
    Route::apiResource('property-images', PropertyImageController::class)->names('property-images');
    Route::get('properties/{id}/images', [PropertyImageController::class, 'getImagesByPropertyId'])->name('properties.images');
    Route::get('/property-images/images-by-property/{propertyId}', [PropertyImageController::class, 'getImagesByPropertyId'])->name('property-images.by-property');
    Route::apiResource('property-types', PropertyTypeController::class)->names('property-types');
    Route::apiResource('simulation-logs', SimulationLogController::class)->names('simulation-logs');
    Route::apiResource('site-statistics', SiteStatisticsController::class)->names('site-statistics');
    Route::apiResource('statuses', StatusController::class)->names('statuses');
    Route::apiResource('testimonials', TestimonialController::class)->names('testimonials');
    Route::apiResource('neighborhoods', NeighborhoodController::class)->names('neighborhoods');



});

