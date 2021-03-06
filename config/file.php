<?php

$file_prefix = "universite-nantes-aviron-una-";

return [
    
    // file prefix used
    "prefix"       => $file_prefix,
    
    // icons used on the file library
    "icon"         => [
        "pdf"     => "<i class=\"fa fa-file-pdf-o\" aria-hidden=\"true\"></i>",
        "doc"     => "<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i>",
        "docx"    => "<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i>",
        "xls"     => "<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i>",
        "xlsx"    => "<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i>",
        "text"    => "<i class=\"fa fa-file-text-o\" aria-hidden=\"true\"></i>",
        "default" => "<i class=\"fa fa-file-o\" aria-hidden=\"true\"></i>",
    ],
    
    // registration
    "registration" => [
        "registration_form_file" => [
            "name" => $file_prefix . "registration-form",
        ],
        "storage_path"           => storage_path('app/registration/files'),
        "public_path"            => "files/registration",
    ],
    
    // google_analytics upload configurations
    "google_analytics" => [
        "credentials_json" => [
            "name" => "google-analytics-credentials",
        ],
        "storage_path"     => storage_path('app/laravel-google-analytics'),
    ],

];
