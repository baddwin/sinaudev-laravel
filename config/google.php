<?php

return [

    /*
     * Application Name
     *
     * Name of your project in `https://console.developers.google.com/`.
     */
    'applicationName' => env('GSUITE_PROJECT_NAME','MyProject'),

    /*
     * Json Auth File Path
     *
     * After creating a project, go to `APIs & auth` and choose `Credentials` section.
     * 
     * Click `Create new Client ID` and select `Service Account` choose `JSON` as the `Key Type`.
     *
     * After downloading the `json` file copy and paste it in the `storage` directory.
     *      Example:
     *          storage/MyProject-2a4d6aaa4413.json
     * 
     */
    'jsonFilePath' => storage_path(env('GSUITE_JSON_FILE', '')),

    /*
     * Here you should pass an array of needed scopes depending on what service you will be using.
     *
     *      Example:
     *          For analytics service:
     *          
     *              'scopes' => [
     *                  'https://www.googleapis.com/auth/analytics.readonly',
     *              ],
     */
    'scopes' => [
        'https://www.googleapis.com/auth/analytics.readonly',
    ],

    /**
     * View ID can be found in `http://google.com/analytics` under the `Admin` tab on navigation.
     *
     * Select `Account`, `Property` and `View`. You will see a `View Settings` link.
     */
    'analytics' => [
        'viewId' => env('GSUITE_VIEW_ID', ''),
    ],

];
