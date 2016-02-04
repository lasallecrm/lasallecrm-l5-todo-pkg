<?php

/**
 *
 * To Do package for the LaSalle Customer Relationship Management package.
 *
 * Based on the Laravel 5 Framework.
 *
 * Copyright (C) 2015 - 2016  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    To Do package for the LaSalle Customer Relationship Management package
 * @link       http://LaSalleCRM.com
 * @copyright  (c) 2015 - 2016, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

Route::group(array('prefix' => 'admin'), function()
{
    // Regular tables
    Route::resource('todomilestones', 'AdminTODOMilestonesController');
    Route::post('todomilestones/confirmDeletion/{id}', 'AdminTODOMilestonesController@confirmDeletion');

    Route::resource('todoprojects', 'AdminTODOProjectsController');
    Route::post('todoprojects/confirmDeletion/{id}', 'AdminTODOProjectsController@confirmDeletion');

    Route::resource('todoitems', 'AdminTODOItemsController');
    Route::post('todoitems/confirmDeletion/{id}', 'AdminTODOItemsController@confirmDeletion');
    Route::post('todoitems/confirmDeletionMultipleRows', 'AdminTODOItemsController@confirmDeletionMultipleRows');
    Route::post('todoitems/destroyMultipleRecords', 'AdminTODOItemsController@destroyMultipleRecords');

    // Lookup Tables
    Route::resource('lutodopriorities', 'AdminLookupTodoPrioritiesTypesController');
    Route::post('lutodopriorities/confirmDeletion/{id}', 'AdminLookupTodoPrioritiesTypesController@confirmDeletion');

    Route::resource('lutodostatuses', 'AdminLookupTodoStatusTypesController');
    Route::post('lutodostatuses/confirmDeletion/{id}', 'AdminLookupTodoStatusTypesController@confirmDeletion');
});