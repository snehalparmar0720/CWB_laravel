<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('region','RegionController');
Route::resource('branch','BranchController');
Route::resource('customer','CustomerController');
Route::resource('personal','PersonalController');
Route::resource('nonpersonal','NonPersonalController');
Route::resource('joint','JointController');
//example excel
Route::get('importExport', 'ExcelController@importExport')->name('importExport');
//Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'ExcelController@importExcel')->name('uploadexcel');

// Route::get('importcsv', 'ExcelController@getimportcsv');
Route::post('postimportcsv', 'RegionController@importCsv');

//export
Route::any('export', 'ExcelController@excelExport')->name('export');
Route::get('getPersonalDeficiency', 'PersonalController@getPDeficiency')->name('getPersonalDeficiency');
Route::get('getNonPersonalDeficiency', 'NonPersonalController@getNPDeficiency')->name('getNonPersonalDeficiency');
Route::get('getJointDeficiency', 'JointController@getJDeficiency')->name('getJointDeficiency');

/*//upload file
Route::get('/fileget', function () {
    return view('importcsv');
});
Route::post('postcust', 'CsvImportController@store')->name('postcust');*/
//Reports
Route::get('data_analysis','ReportController@getReport');

//charts
Route::get('bar-chart', 'ReportController@getReport');

//1 Address review
Route::get('address_review_personal', 'PersonalController@getAddressReview')->name('address_review_personal');
Route::post('addressreviewpersonal.store', 'PersonalController@postAddressReview')->name('addressreviewpersonal.store');

//2 id review
Route::get('id_review_personal', 'PersonalController@getIDReview')->name('id_review_personal');
Route::post('idreviewpersonal.store', 'PersonalController@postIDReview')->name('idreviewpersonal.store');

//3 noc review
Route::get('noc_review_personal', 'PersonalController@getNocReview')->name('noc_review_personal');
Route::post('nocreviewpersonal.store', 'PersonalController@postNocReview')->name('nocreviewpersonal.store');

//4 occupation review
Route::get('occupation_review_personal', 'PersonalController@getOccupationReview')->name('occupation_review_personal');
Route::post('occupationreviewpersonal.store', 'PersonalController@postOccupationReview')->name('occupationreviewpersonal.store');

//5 third party review
Route::get('third_party_review_personal', 'PersonalController@getThirdPartyReview')->name('third_party_review_personal');
Route::post('thirdpartyreviewpersonal.store', 'PersonalController@postThirdPartyReview')->name('thirdpartyreviewpersonal.store');

//6 employer review
Route::get('employer_review_personal', 'PersonalController@getEmployerReview')->name('employer_review_personal');
Route::post('employerreviewpersonal.store', 'PersonalController@postEmployerReview')->name('employerreviewpersonal.store');

// 7 pefp pep review
Route::get('pefp_pep_review_personal', 'PersonalController@getPefpPepReview')->name('pefp_pep_review_personal');
Route::post('pefppepreviewpersonal.store', 'PersonalController@postPefpPepReview')->name('pefppepreviewpersonal.store');

//8 Metrics review
Route::get('metrics_review_personal', 'PersonalController@getMetricsReview')->name('metrics_review_personal');
Route::post('metricsreviewpersonal.store', 'PersonalController@postMetricsReview')->name('metricsreviewpersonal.store');

//9 Intended use review
Route::get('intended_use_review_personal', 'PersonalController@getIntendedUseReview')->name('intended_use_review_personal');
Route::post('intendedusereviewpersonal.store', 'PersonalController@postIntendedUseReview')->name('intendedusereviewpersonal.store');

//10 average money review
Route::get('average_money_review_personal', 'PersonalController@getAverageMoneyReview')->name('average_money_review_personal');
Route::post('averagemoneyreviewpersonal.store', 'PersonalController@postAverageMoneyReview')->name('averagemoneyreviewpersonal.store');

//11 cwb  review
Route::get('cwb_review_personal', 'PersonalController@getCWBReview')->name('cwb_review_personal');
Route::post('cwbreviewpersonal.store', 'PersonalController@postCWBReview')->name('cwbreviewpersonal.store');

