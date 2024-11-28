<?php
namespace App\View\Components;

use App\Models\Service;
use Illuminate\View\Component;
use Illuminate\View\View;

class ServiceComponent extends Component
{
    public $services;
    public $categories;
    public $spanishCities;

    public function __construct()
    {
        $this->categories = Service::select('category')
            ->distinct()
            ->pluck('category');

        $this->services = Service::with('user')
            ->where('is_active', true)
            ->latest()
            ->get();

        $this->spanishCities = [
            'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza',
            'Málaga', 'Murcia', 'Palma', 'Bilbao', 'Alicante',
            'Córdoba', 'Valladolid', 'Vigo', 'Gijón', 'Granada'
        ];
    }

    public function render(): View
    {
        return view('components.service-component', [
            'categories' => $this->categories,
            'services' => $this->services,
            'spanishCities' => $this->spanishCities
        ]);
    }
}
