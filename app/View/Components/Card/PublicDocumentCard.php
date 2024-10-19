<?php

namespace App\View\Components\Card;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class PublicDocumentCard extends Component
{
    public $index;
    public $title;
    public $description;
    public $year;
    public $filePath;
    public $fileType;
    public $uploadedAt;

    /**
     * Create a new component instance.
     */
    public function __construct($index, $title, $description, $year, $filePath, $fileType, $uploadedAt)
    {
        $this->index = $index;
        $this->title = $title;
        $this->description = $description;
        $this->year = $year;
        $this->filePath = $filePath;
        $this->fileType = Str::of($fileType)->upper();
        $this->uploadedAt = Carbon::parse($uploadedAt)->translatedFormat("l, j F Y");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.public-document-card');
    }
}
