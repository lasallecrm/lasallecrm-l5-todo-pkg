<?php
namespace Lasallecrm\Todo\Models;

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
use Lasallecms\Lasallecmsapi\Models\BaseModel;

class Project extends BaseModel
{
    ///////////////////////////////////////////////////////////////////
    ///////////     MANDATORY USER DEFINED PROPERTIES      ////////////
    ///////////              MODIFY THESE!                /////////////
    ///////////////////////////////////////////////////////////////////


    // LARAVEL MODEL CLASS PROPERTIES

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'projects';


    /**
     * Which fields may be mass assigned
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'comments', 'enabled', 'due_date', 'milestone_id', 'status_id', 'priority_id', 'company_id', 'people_id', 'website_id'
    ];


    // PACKAGE PROPERTIES

    /*
     * Name of this package
     *
     * @var string
     */
    public $package_title = "LaSalleCRM - To Do";


    // MODEL PROPERTIES

    /*
     * Model class namespace.
     *
     * Do *NOT* specify the model's class.
     *
     * @var string
     */
    public $model_namespace = "Lasallecrm\Todo\Models";

    /*
     * Model's class.
     *
     * Convention is capitalized and singular -- which is assumed.
     *
     * @var string
     */
    public $model_class = "Project";


    // RESOURCE ROUTE PROPERTIES

    /*
     * The base URL of the resource routes.
     *
     * Frequently is the same as the table name.
     *
     * By convention, plural.
     *
     * Lowercase.
     *
     * @var string
     */
    public $resource_route_name   = "todoprojects";


    // FORM PROCESSORS PROPERTIES.
    // THESE ARE THE ADMIN CRUD COMMAND HANDLERS.
    // THE ONLY REASON YOU HAVE TO CREATE THESE COMMAND HANDLERS AT ALL IS THAT
    // THE EVENTS DIFFER. EVERYTHING THAT HAPPENS UP TO THE "PERSIST" IS PRETTY STANDARD.

    /*
     * Namespace of the Form Processors
     *
     * MUST *NOT* have a slash at the end of the string
     *
     * @var string
     */
    public $namespace_formprocessor = 'Lasallecrm\Todo\Listeners\Projects';

    /*
     * Class name of the CREATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_create = 'CreateProjectFormProcessing';

    /*
     * Namespace and class name of the UPDATE Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_update = 'UpdateProjectFormProcessing';

    /*
     * Namespace and class name of the DELETE (DESTROY) Form Processor command
     *
     * @var string
     */
    public $classname_formprocessor_delete = 'DeleteProjectFormProcessing';


    // SANITATION RULES PROPERTIES

    /**
     * Sanitation rules for Create (INSERT)
     *
     * @var array
     */
    public $sanitationRulesForCreate = [
        'title'       => 'trim|strip_tags',
        'description' => 'trim',
        'comments'    => 'trim',
    ];

    /**
     * Sanitation rules for UPDATE
     *
     * @var array
     */
    public $sanitationRulesForUpdate = [
        'title'       => 'trim|strip_tags',
        'description' => 'trim',
        'comments'    => 'trim',
    ];


    // VALIDATION RULES PROPERTIES

    /**
     * Validation rules for  Create (INSERT)
     *
     * @var array
     */
    public $validationRulesForCreate = [
        'status_id'   => 'integer',
        'priority_id' => 'integer',
        'title'       => 'required|min:4',
        'due_date'    => 'date',
    ];

    /**
     * Validation rules for UPDATE
     *
     * @var array
     */
    public $validationRulesForUpdate = [
        'status_id'   => 'integer',
        'priority_id' => 'integer',
        'title'       => 'min:4',
        'due_date'    => 'date',
    ];


    // USER GROUPS & ROLES PROPERTIES

    /*
     * User groups that are allowed to execute each controller action
     *
     * @var array
     */
    public $allowed_user_groups = [
        ['index'   => ['Super Administrator']],
        ['create'  => ['Super Administrator']],
        ['store'   => ['Super Administrator']],
        ['edit'    => ['Super Administrator']],
        ['update'  => ['Super Administrator']],
        ['destroy' => ['Super Administrator']],
    ];


    // FIELD LIST PROPERTIES

    /*
     * Field list
     *
     * ID and TITLE must go first.
     *
     * Forms will list fields in the order fields are listed in this array.
     *
     * @var array
     */
    public $field_list = [
        [
            'name'                  => 'id',
            'type'                  => 'int',
            'info'                  => false,
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'title',
            'alternate_form_name'   => 'Project Name',
            'type'                  => 'varchar',
            'info'                  => false,
            'index_skip'            => false,
            'index_align'           => 'left',
            'persist_wash'          => 'title',
        ],
        [
            'name'                  => 'description',
            'type'                  => 'text-no-editor',
            'info'                  => 'Description is optional.',
            'index_skip'            => false,
        ],
        [
            'name'                  => 'comments',
            'type'                  => 'text-with-editor',
            'info'                  => 'Optional.',
            'index_skip'            => true,
            'persist_wash'          => 'content',
        ],
        [
            'name'                  => 'due_date',
            'type'                  => 'date',
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
            'persist_wash'          => 'publish_on',
        ],
        [
            'name'                  => 'status_id',
            'alternate_form_name'   => 'Status',
            'type'                  => 'related_table',
            'related_table_name'    => 'lookup_todo_status_types',
            'related_namespace'     => 'Lasallecrm\Todo\Models',
            'related_model_class'   => 'Lookup_todo_status_type',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'priority_id',
            'alternate_form_name'   => 'Priority',
            'type'                  => 'related_table',
            'related_table_name'    => 'lookup_todo_priority_types',
            'related_namespace'     => 'Lasallecrm\Todo\Models',
            'related_model_class'   => 'Lookup_todo_priority_type',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'milestone_id',
            'alternate_form_name'   => 'Milestone',
            'type'                  => 'related_table',
            'related_table_name'    => 'milestones',
            'related_namespace'     => 'Lasallecrm\Todo\Models',
            'related_model_class'   => 'milestone',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'company_id',
            'alternate_form_name'   => 'Company',
            'type'                  => 'related_table',
            'related_table_name'    => 'companies',
            'related_namespace'     => 'Lasallecrm\Todo\Models',
            'related_model_class'   => 'Company',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'people_id',
            'alternate_form_name'   => 'Person',
            'type'                  => 'related_table',
            'related_table_name'    => 'peoples',
            'related_namespace'     => 'Lasallecrm\Todo\Models',
            'related_model_class'   => 'People',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
        [
            'name'                  => 'website_id',
            'alternate_form_name'   => 'Website',
            'type'                  => 'related_table',
            'related_table_name'    => 'websites',
            'related_namespace'     => 'Lasallecrm\Todo\Models',
            'related_model_class'   => 'Website',
            'related_fk_constraint' => false,
            'related_pivot_table'   => false,
            'nullable'              => true,
            'info'                  => 'Optional.',
            'index_skip'            => false,
            'index_align'           => 'center',
        ],
    ];


    // MISC PROPERTIES

    /*
     * Suppress the delete button when just one record to list, in the listings (index) page
     *
     * true  = suppress the delete button when just one record to list
     * false = display the delete button when just one record to list
     *
     * @var bool
     */
    public $suppress_delete_button_when_one_record = false;

    /*
     * DO NOT DELETE THESE CORE RECORDS.
     *
     * Specify the TITLE of these records
     *
     * Assumed that this database table has a "title" field
     *
     * @var array
     */
    public $do_not_delete_these_core_records = [];


    ///////////////////////////////////////////////////////////////////
    //////////////        RELATIONSHIPS             ///////////////////
    ///////////////////////////////////////////////////////////////////

    /*
     * One to one relationship with Milestone
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function milestone()
    {
        return $this->hasOne('Lasallecrm\Todo\Models\Milestone');
    }

    /*
     * One to one relationship with Lookup_todo_priority_type
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function lookup_todo_priority_type()
    {
        return $this->hasOne('Lasallecrm\Todo\Models\Lookup_todo_priority_type');
    }

    /*
     * One to one relationship with Lookup_todo_status_type
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function lookup_todo_status_type()
    {
        return $this->hasOne('Lasallecrm\Todo\Models\Lookup_todo_status_type');
    }

    /*
     * One to one relationship with Company
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function company()
    {
        return $this->hasOne('Lasallecrm\Todo\Models\Company');
    }

    /*
     * One to one relationship with People
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function people()
    {
        return $this->hasOne('Lasallecrm\Todo\Models\People');
    }

    /*
     * One to one relationship with Website
     *
     * Method name must be:
     *    * the model name,
     *    * NOT the table name,
     *    * singular;
     *    * lowercase.
     *
     * @return Eloquent
     */
    public function website()
    {
        return $this->hasOne('Lasallecrm\Todo\Models\Website');
    }


    ///////////////////////////////////////////////////////////////////
    //////////////        OTHER METHODS             ///////////////////
    ///////////////////////////////////////////////////////////////////

    // none
}