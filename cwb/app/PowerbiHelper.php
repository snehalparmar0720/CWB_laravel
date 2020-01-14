<?php
namespace App;
class PowerbiHelper
{
    public static function processPowerbiHttpRequest($url, $header, $data, $method = 'POST')
    {
        $header[] = 'Content-Length:' . strlen($data);
        $context = [
            'http' => [
                'method'  => $method,
                'header'  => implode("\r\n", $header),
                'content' => $data
            ]
        ];
        $content = file_get_contents($url, false, stream_context_create($context));
        if ($content != false) {
            $content = json_decode($content);
        }
        return [
            'content'=> $content,
            'headers'=> $http_response_header,
        ];
    }


    public static function getOffice360AccessToken()
    {
        $data = http_build_query([
            'grant_type'    => 'password',
            'resource'      => 'https://analysis.windows.net/powerbi/api',
            'client_id'     => '727c679c-aa38-4b0e-bafb-95824762d19e',
            'client_secret' => 'YenMDEX1Guv06qGm8fWySvOz4cg3m9OxG4E9G0Dqk78',
            'username'      => 'parmar@ualberta.ca',
            'password'      => 'Atmiya2720',
        ], '', '&');
        $header = [
            "Content-Type:application/x-www-form-urlencoded",
            "return-client-request-id:true",
        ];
        $result = self::processPowerbiHttpRequest('https://login.microsoftonline.com/common/oauth2/token', $header, $data);
        if ($result) {
            return $result['content'];
        }else{
            return null;
        }
    }


    public static function debugPrint($param)
    {
        print '<pre>';
        print_r($param);
        print '</pre>';
    }
}
