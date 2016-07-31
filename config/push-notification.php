<?php

return array(
    'appNameIOS'     => array(
        'environment' =>'development',
        'certificate' =>'/path/to/certificate.pem',
        'passPhrase'  =>'password',
        'service'     =>'apns'
    ),
    'appNameAndroid' => array(
        'environment' =>'production',
        'apiKey'      =>'AIzaSyDoPLnIIHrTOz-Rzbv7hoAx-TBJ1de4pXs',
        'service'     =>'gcm'
    )
);