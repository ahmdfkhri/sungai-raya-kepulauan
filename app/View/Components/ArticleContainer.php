<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleContainer extends Component
{
    public $containerTitle;
    public $containerDescription;
    public $containerUrl;
    public $category;
    public $articles;

    /**
     * Create a new component instance.
     */
    public function __construct($containerTitle, $containerDescription, $containerUrl, $category)
    {
        $this->containerTitle = $containerTitle;
        $this->containerDescription = $containerDescription;
        $this->containerUrl = $containerUrl;
        $this->category = $category;
        
        switch ($this->category) {
            case 'newest':
                $this->newest();
                break;
            case 'popular':
                $this->popular();
                break;
            case 'important':
                $this->important();
                break;
            default:
                $this->newest();
                break;
        }
    }

    private function newest() {
        $this->articles = [
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1727731481816-bf055858e20f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Berita Baru 1',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 1000,
            ],
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1728931710220-45fa008628a9?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwzfHx8ZW58MHx8fHx8',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Berita Baru 2',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 987,
            ],
        ];
    }

    private function popular() {
        $this->articles = [
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1728931710220-45fa008628a9?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwzfHx8ZW58MHx8fHx8',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Berita Populer 1',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 2879,
            ],
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1728818331662-a8b337eb91d1?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHw0fHx8ZW58MHx8fHx8',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Berita Populer 2',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 1568,
            ],
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1727731481816-bf055858e20f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Berita Populer 3',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 1000,
            ],
        ];
    }

    private function important() {
        $this->articles = [
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1728343070551-d0893e207533?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDJ8TThqVmJMYlRSd3N8fGVufDB8fHx8fA%3D%3D',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Informasi Penting 1',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 1000,
            ],
            [
                'imageUrl' => 'https://images.unsplash.com/photo-1727731481816-bf055858e20f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'date' => now()->toDateString(),
                'tag' => 'Kegiatan',
                'title' => 'Informasi Penting 2',
                'url' => '#',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cupiditate, est voluptatum nihil labore inventore, omnis architecto porro eveniet iure, ratione odio reiciendis facilis magnam placeat repellat consequuntur consequatur maxime! Nihil, consectetur? Iste natus cum dolore voluptas, minima reprehenderit placeat omnis perferendis blanditiis magnam sapiente repellendus id itaque similique. Autem quia, debitis maxime fugiat numquam impedit hic dolor incidunt inventore? Ut laudantium distinctio doloribus amet repellat cumque quibusdam id quam? Vel non, animi, laudantium sequi neque incidunt rem quod porro esse nostrum quam eius corrupti minima perspiciatis! Vitae, enim quaerat? Ratione enim error aliquid eligendi mollitia? Dignissimos sapiente iste nemo mollitia ex nihil voluptate, corporis in odio provident placeat est deserunt, ratione porro possimus neque, fugiat nesciunt illum magni incidunt.',
                'views' => 1000,
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-container');
    }
}
