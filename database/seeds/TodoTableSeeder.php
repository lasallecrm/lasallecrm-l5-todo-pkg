<?php

/**
 *
 * To Do package for the LaSalle Customer Relationship Management package.
 *
 * Based on the Laravel 5 Framework.
 *
 * Copyright (C) 2015  The South LaSalle Trading Corporation
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
 * @copyright  (c) 2015, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

// LaSalle Software
use Lasallecrm\Todo\Models\Lookup_todo_priority_type;
use Lasallecrm\Todo\Models\Lookup_todo_status_type;
use Lasallecrm\Todo\Models\Project;

// Laravel classes
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the LaSalleCRM database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Lookup_todo_priority_type

        Lookup_todo_priority_type::create([
            'title'       => 'Green',
            'description' => 'Green',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);
        Lookup_todo_priority_type::create([
            'title'       => 'Yellow',
            'description' => 'Yellow',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);
        Lookup_todo_priority_type::create([
            'title'       => 'Red',
            'description' => 'Red',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);


        // Lookup_todo_status_type

        Lookup_todo_status_type::create([
            'title'       => 'Open',
            'description' => 'Open',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);
        Lookup_todo_status_type::create([
            'title'       => 'Closed',
            'description' => 'Closed',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);
        Lookup_todo_status_type::create([
            'title'       => 'Waiting',
            'description' => 'Waiting for someone to do something; or, something to happen.',
            'enabled'     => 1,
            'created_at' => new DateTime,
            'created_by' => 1,
            'updated_at' => new DateTime,
            'updated_by' => 1,
        ]);

        // Projects
        Project::create([
            'milestone_id' => null,
            'status_id'    => null,
            'priority_id'  => null,
            'company_id'   => null,
            'people_id'    => null,
            'website_id'   => null,
            'title'        => 'LaSalle Software',
            'description'  => 'Messages from LaSalle Software.',
            'comments'     => "",
            'enabled'      => 1,
            'due_date'     => new DateTime,
            'created_at'   => new DateTime,
            'created_by'   => 1,
            'updated_at'   => new DateTime,
            'updated_by'   => 1,
        ]);
    }
}