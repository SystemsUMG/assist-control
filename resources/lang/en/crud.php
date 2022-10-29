<?php

return [
    'common' => [
        'save' => 'Save',
        'cancel' => 'Cancel',
        'no_items_found' => 'No items found'
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'List of Roles',
        'create_title' => 'Create a new role',
        'edit_title' => 'Edit a role',
        'delete_title' => 'Delete a role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'List of Permissions',
        'create_title' => 'Create a new permission',
        'edit_title' => 'Edit a permission',
        'delete_title' => 'Delete a permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'centers' => [
        'name' => 'Centers',
        'index_title' => 'List of Centers',
        'create_title' => 'Create a new Center',
        'edit_title' => 'Edit a Center',
        'delete_title' => 'Delete a Center',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'careers' => [
        'name' => 'Careers',
        'index_title' => 'List of Careers',
        'create_title' => 'Create a new Career',
        'edit_title' => 'Edit a Career',
        'delete_title' => 'Delete a Career',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'courses' => [
        'name' => 'Courses',
        'index_title' => 'List of Courses',
        'create_title' => 'Create a new Course',
        'edit_title' => 'Edit a Course',
        'delete_title' => 'Delete a Course',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'semesters' => [
        'name' => 'Semesters',
        'index_title' => 'List of Semesters',
        'create_title' => 'Create a new Semester',
        'edit_title' => 'Edit a Semester',
        'delete_title' => 'Delete a Semester',
        'inputs' => [
            'name' => 'Name',
            'number' => 'Number',
            'year' => 'Year',
        ],
    ],

    'students' => [
        'name' => 'Students',
        'index_title' => 'List of Students',
        'create_title' => 'Create a new Student',
        'edit_title' => 'Edit a Student',
        'delete_title' => 'Delete a Student',
        'successfully_created_title' => 'Successfully created student',
        'successfully_edited_title' => 'Successfully edited student',
        'successfully_delete_title' => 'Successfully deleted student',
        'enabled_user' => 'Enabled student',
        'disabled_user' => 'Disabled student',
        'inputs' => [
            'tuition' => 'Tuition',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'type' => 'Type',
            'career_in_center_id' => 'Center and career',
        ],
    ],

    'teachers' => [
        'name' => 'Teachers',
        'index_title' => 'List of Teachers',
        'create_title' => 'Create a new Teacher',
        'edit_title' => 'Edit a Teacher',
        'delete_title' => 'Delete a Teacher',
        'successfully_created_title' => 'Successfully created teacher',
        'successfully_edited_title' => 'Successfully edited teacher',
        'successfully_delete_title' => 'Successfully deleted teacher',
        'enabled_user' => 'Enabled teacher',
        'disabled_user' => 'Disabled teacher',
        'inputs' => [
            'tuition' => 'Tuition',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'type' => 'Type',
            'career_in_center_id' => 'Center and career',
        ],
    ],

    'course_sections' => [
        'name' => 'Sections',
        'index_title' => 'List of Sections',
        'create_title' => 'Create a new Section',
        'edit_title' => 'Edit a Section',
        'delete_title' => 'Delete a Section',
        'inputs' => [
            'name' => 'Name',
            'start_date' => 'Start time',
            'end_date' => 'End time',
            'career_in_center_id' => 'Center and career',
            'user_id' => 'Teacher',
            'course_id' => 'Course',
            'semester_id' => 'Semester',
        ],
    ],

    'student_assignment' => [
        'name' => 'Student Assignment'
    ],

    'assistances' => [
        'name' => 'Assistances',
        'create_title' => 'Create a new assistance',
    ]
];
