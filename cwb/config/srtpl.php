<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | Pagination
      |--------------------------------------------------------------------------
      |
      | When your application is in debug mode, detailed error messages with
      | stack traces will be shown on every error that occurs within your
      | application. If disabled, a simple generic error page is shown.
      |
     */

    'par_page' => 10,
    'status' => array('p' => 'Pending', 'c' => 'Cancel', 'abr' => 'Approve By Rec.', 'rbr' => 'Reject By Rec.', 'abau' => 'Approve By Approve User', 'rbau' => 'Reject By Approve User'),
    'type' => array('1' => '=', '2' => '!=', '3' => '<', '4' => '>', '5' => '<=', '6' => '>=', '7' => 'like', '8' => 'not like'),
    'bccmail' => '',
    'is_email' => '1',
    'is_sms' => '1',
    'bccsms' => '',
    'project_name' => 'Project Setup',
    'is_down' => '0',
    'superUserIps' => '',
    'par_page_new' => 500,

);
