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

// Laravel classes
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ///////////////////////////////////////////////////////////////////////
        ////                    Lookup Table                             ////
        ///////////////////////////////////////////////////////////////////////

        if (!Schema::hasTable('lookup_todo_priority_types'))
        {
            Schema::create('lookup_todo_priority_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

        if (!Schema::hasTable('lookup_todo_status_types'))
        {
            Schema::create('lookup_todo_status_types', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->string('title')->unique();
                $table->string('description');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }




        ///////////////////////////////////////////////////////////////////////
        ////                    Main Tables                                ////
        ///////////////////////////////////////////////////////////////////////

        if (!Schema::hasTable('milestones'))
        {
            Schema::create('milestones', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('status_id')->nullable()->unsigned();
                $table->foreign('status_id')->references('id')->on('lookup_todo_status_types');

                $table->integer('priority_id')->nullable()->unsigned();
                $table->foreign('priority_id')->references('id')->on('lookup_todo_priority_types');

                $table->string('title');
                $table->string('description');
                $table->text('comments');
                $table->boolean('enabled')->default(true);

                $table->date('due_date');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }


        if (!Schema::hasTable('projects'))
        {
            Schema::create('projects', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('milestone_id')->nullable()->unsigned();
                $table->foreign('milestone_id')->references('id')->on('milestones');

                $table->integer('status_id')->nullable()->unsigned();
                $table->foreign('status_id')->references('id')->on('lookup_todo_status_types');

                $table->integer('priority_id')->nullable()->unsigned();
                $table->foreign('priority_id')->references('id')->on('lookup_todo_priority_types');

                $table->integer('company_id')->nullable()->unsigned();
                $table->foreign('company_id')->references('id')->on('companies');

                $table->integer('people_id')->nullable()->unsigned();
                $table->foreign('people_id')->references('id')->on('peoples');

                $table->integer('website_id')->nullable()->unsigned();
                $table->foreign('website_id')->references('id')->on('websites');

                $table->string('title');
                $table->string('description');
                $table->text('comments');
                $table->boolean('enabled')->default(true);

                $table->date('due_date');

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }


        if (!Schema::hasTable('todo_items'))
        {
            Schema::create('todo_items', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('project_id')->nullable()->unsigned();
                $table->foreign('project_id')->references('id')->on('projects');

                $table->integer('milestone_id')->nullable()->unsigned();
                $table->foreign('milestone_id')->references('id')->on('milestones');

                $table->integer('status_id')->nullable()->unsigned();
                $table->foreign('status_id')->references('id')->on('lookup_todo_status_types');

                $table->integer('priority_id')->nullable()->unsigned();
                $table->foreign('priority_id')->references('id')->on('lookup_todo_priority_types');

                $table->integer('people_id')->nullable()->unsigned();
                $table->foreign('people_id')->references('id')->on('peoples');

                $table->string('title');
                $table->string('description');
                $table->text('comments');

                $table->date('due_date');

                $table->boolean('enabled')->default(true);

                $table->timestamp('created_at');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');

                $table->timestamp('updated_at');
                $table->integer('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');

                $table->timestamp('locked_at')->nullable();
                $table->integer('locked_by')->nullable()->unsigned();
                $table->foreign('locked_by')->references('id')->on('users');
            });
        }

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Disable foreign key constraints or these DROPs will not work
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        ///////////////////////////////////////////////////////////////////////
        ////                       Lookup Tables                           ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('lookup_todo_priority_types', function($table){
            $table->dropIndex('lookup_todo_priority_types_title_unique');
            $table->dropForeign('lookup_todo_priority_types_created_by_foreign');
            $table->dropForeign('lookup_todo_priority_types_updated_by_foreign');
            $table->dropForeign('lookup_todo_priority_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_todo_priority_types');

        Schema::table('lookup_todo_status_types', function($table){
            $table->dropIndex('lookup_todo_status_types_title_unique');
            $table->dropForeign('lookup_todo_status_types_created_by_foreign');
            $table->dropForeign('lookup_todo_status_types_updated_by_foreign');
            $table->dropForeign('lookup_todo_status_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_todo_priority_types');


        ///////////////////////////////////////////////////////////////////////
        ////                         Main Tables                           ////
        ///////////////////////////////////////////////////////////////////////

        Schema::table('lookup_todo_status_types', function($table){
            $table->dropIndex('lookup_todo_status_types_title_unique');
            $table->dropForeign('lookup_todo_status_types_created_by_foreign');
            $table->dropForeign('lookup_todo_status_types_updated_by_foreign');
            $table->dropForeign('lookup_todo_status_types_locked_by_foreign');
        });
        Schema::dropIfExists('lookup_todo_priority_types');

        Schema::table('milestones', function($table){
            $table->dropForeign('milestones_status_id_foreign');
            $table->dropForeign('milestones_priority_id_foreign');
            $table->dropForeign('milestones_created_by_foreign');
            $table->dropForeign('milestones_updated_by_foreign');
            $table->dropForeign('milestones_locked_by_foreign');
        });
        Schema::dropIfExists('milestones');

        Schema::table('projects', function($table){
            $table->dropForeign('projects_milestone_id_foreign');
            $table->dropForeign('projects_status_id_foreign');
            $table->dropForeign('projects_priority_id_foreign');
            $table->dropForeign('projects_company_id_foreign');
            $table->dropForeign('projects_people_id_foreign');
            $table->dropForeign('projects_website_id_foreign');
            $table->dropForeign('projects_created_by_foreign');
            $table->dropForeign('projects_updated_by_foreign');
            $table->dropForeign('projects_locked_by_foreign');
        });
        Schema::dropIfExists('projects');

        Schema::table('todo_items', function($table){
            $table->dropForeign('todo_items_status_id_foreign');
            $table->dropForeign('todo_items_priority_id_foreign');
            $table->dropForeign('todo_items_milestone_id_foreign');
            $table->dropForeign('todo_items_project_id_foreign');
            $table->dropForeign('todo_items_people_id_foreign');
            $table->dropForeign('todo_items_created_by_foreign');
            $table->dropForeign('todo_items_updated_by_foreign');
            $table->dropForeign('todo_items_locked_by_foreign');
        });
        Schema::dropIfExists('todo_items');

        // Enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
