<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends _BaseModel
{
    /**
     * News constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        // we set the object attributes
        $this->attributes = $attributes;

        // we define the table name
        $this->table = 'pages';

        // we define the fillable attributes
        $this->fillable = [
            'page_key',
            'title',
            'image',
            'content',
            'meta_title',
            'meta_description',
            'meta_keywords'
        ];

        // we define the image(s) size(s)
        $this->sizes = [
            'image' => [
                'admin' => [40, 40],
                'list'  => [150, 150],
                '767'   => [767, 431],
                '991'   => [991, 557],
                '1199'  => [1199, 674],
                '1919'  => [1919, 1079],
                '2560'  => [2560, 1440],
            ],
        ];

        // we define the public path to retrieve files
        $this->public_path = 'img/pages';

        // we define the storage path to store files
        $this->storage_path = 'app/pages';
    }
}
