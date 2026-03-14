<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogForm extends Form
{
    public $blogId, $image, $title, $video_url, $description;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [

            'image' => $this->blogId ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title'         => 'required|string|max:255',
            'video_url'       => 'nullable|url',
            'description'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'         => 'Title field is required.',
            'title.string'           => 'Title must be a valid text.',
            'title.max'              => 'Title may not be greater than 255 characters.',

            'description.required'   => 'Detail is required.',

            'video_url.url'          => 'Please enter a valid video url.',

            'image.required'        => 'Please upload an image.',
            'image.image'           => 'The file must be an image.',
            'image.mimes'           => 'Only jpeg, png, jpg, and webp formats are allowed.',
            'image.max'             => 'The image size cannot exceed 2MB.',
        ];
    }
}
