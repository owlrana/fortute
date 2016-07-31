<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses' => 'MainController@index',
]);

Route::post('send_mail', [
	'uses' => 'MainController@send_mail',
]);

Route::group(['prefix' => 'api'], function()
{	
	Route::group(['prefix' => 'v1'], function()
	{
	    Route::post('signup', [
			'uses' => 'Webservice@signup',
		]);

		Route::post('insert_password', [
			'uses' => 'Webservice@insertPassword',
		]);

		Route::post('login', [
			'uses' => 'Webservice@login',
		]);

		Route::post('update_qualifications', [
			'uses' => 'Webservice@updateQualifications',
		]);
		
		Route::post('add_student', [
			'uses' => 'Webservice@addStudent',
		]);

		Route::post('update_student', [
			'uses' => 'Webservice@updateStudent',
		]);
		
		Route::post('pushNotificationGCM', [
			'uses' => 'Webservice@pushNotificationGCM',
		]);

		Route::post('login', [
			'uses' => 'Webservice@login',
		]);

		Route::post('tutor-request', [
			'uses' => 'Webservice@tutor_request',
		]);

		Route::post('accept-student', [
			'uses' => 'Webservice@accept_student',
		]);

		Route::post('get-student', [
			'uses' => 'Webservice@get_student',
		]);

		Route::post('get-accepted-tutor', [
			'uses' => 'Webservice@get_accepted_tutor',
		]);

		Route::post('profile', [
			'uses' => 'Webservice@profile',
		]);

		Route::post('demo-tutor', [
			'uses' => 'Webservice@demo_tutor',
		]);

		Route::post('grade', [
			'uses' => 'Webservice@grade',
		]);

		Route::post('get-subject', [
			'uses' => 'Webservice@getStudent',
		]);

		Route::post('login', [
			'uses' => 'Webservice@login',
		]);

		Route::post('get-demo-date', [
			'uses' => 'Webservice@getDemoDate',
		]);

		Route::post('hire-data', [
			'uses' => 'Webservice@hireData',
		]);

		Route::post('take-demo', [
			'uses' => 'Webservice@takeDemo',
		]);

		Route::post('demo-tutor-date', [
			'uses' => 'Webservice@demoTutorDate',
		]);

		Route::post('accept-demo', [
			'uses' => 'Webservice@acceptDemo',
		]);

		Route::post('tutor-demo-info', [
			'uses' => 'Webservice@tutorDemoInfo',
		]);

		Route::post('calender-dates', [
			'uses' => 'Webservice@calenderDates',
		]);

		Route::post('user-session', [
			'uses' => 'Webservice@userSession',
		]);

	});	
});	

Route::group(['prefix' => 'admin'], function(){
	Route::get('login', [
		'uses' => 'AdminController@index',
	]);

	Route::post('postLogin', [
		'uses' => 'AdminController@postLogin',
	]);

	Route::get('dashboard', [
		'uses' => 'AdminController@dashboard',
	]);

	Route::get('all-grade', [
		'uses' => 'AdminController@allGrade',
	]);

	Route::get('subject', [
		'uses' => 'AdminController@allSubject',
	]);

	Route::get('parent', [
		'uses' => 'AdminController@allparent',
	]);

	Route::get('tutor', [
		'uses' => 'AdminController@allTutor',
	]);

	Route::get('student/{id}', [
		'uses' => 'AdminController@student',
	]);

	Route::get('manage-home', [
		'uses' => 'AdminController@managehome',
	]);

	Route::post('postTabContent', [
		'uses' => 'AdminController@postTabContent',
	]);

	Route::post('postTabPrice', [
		'uses' => 'AdminController@postTabPrice',
	]);

	Route::post('postTabDownloadImage', [
		'uses' => 'AdminController@postTabDownloadImage',
	]);

	Route::post('postTabSlider', [
		'uses' => 'AdminController@postTabSlider',
	]);

	Route::get('add-parent', [
		'uses' => 'AdminController@addParent',
	]);

	Route::post('addNewParent', [
		'uses' => 'AdminController@addNewParent',
	]);

	Route::get('edit-parent/{id}', [
		'uses' => 'AdminController@editParent',
	]);

	Route::post('editParent', [
		'uses' => 'AdminController@postEditParent',
	]);
	
	Route::get('delete-parent/{id}', [
		'uses' => 'AdminController@deleteParent',
	]);

	Route::get('add-grade', [
		'uses' => 'AdminController@addNewGrade',
	]);

	Route::post('postAddNewGrade', [
		'uses' => 'AdminController@postAddNewGrade',
	]);

	Route::get('delete-grade/{id}', [
		'uses' => 'AdminController@deleteGrade',
	]);

	Route::get('delete-subject/{id}', [
		'uses' => 'AdminController@deleteSubject',
	]);

	Route::get('edit-grade/{id}', [
		'uses' => 'AdminController@editGrade',
	]);

	Route::post('postEditGrade', [
		'uses' => 'AdminController@postEditGrade',
	]);

	Route::get('add-subject', [
		'uses' => 'AdminController@addSUbject',
	]);

	Route::post('addNewSubject', [
		'uses' => 'AdminController@addNewSubject',
	]);

	Route::get('edit-subject/{id}', [
		'uses' => 'AdminController@editSUbject',
	]);

	Route::post('editSubject', [
		'uses' => 'AdminController@postEditSubject',
	]);

	Route::get('manage-location', [
		'uses' => 'AdminController@manageLocation',
	]);

	Route::get('add-location', [
		'uses' => 'AdminController@addLocation',
	]);

	Route::post('addLocation', [
		'uses' => 'AdminController@postAddLocation',
	]);

	Route::get('edit-location/{id}', [
		'uses' => 'AdminController@editLocation',
	]);

	Route::post('editLocation', [
		'uses' => 'AdminController@postEditLocation',
	]);

	Route::get('delete-location/{id}', [
		'uses' => 'AdminController@deleteLocation',
	]);

	Route::get('import-location', [
		'uses' => 'AdminController@importLocation',
	]);

	Route::post('postImportLocation', [
		'uses' => 'AdminController@postImportLocation',
	]);

	Route::get('import-grade', [
		'uses' => 'AdminController@importGrade',
	]);

	Route::post('postImportGrade', [
		'uses' => 'AdminController@postImportGrade',
	]);

	Route::get('import-subject', [
		'uses' => 'AdminController@importSubject',
	]);

	Route::post('postImportSubject', [
		'uses' => 'AdminController@postImportSubject',
	]);

	Route::get('logout', [
		'uses' => 'AdminController@logout',
	]);

	
});