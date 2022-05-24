<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.Dashboard.dashboard-component')->layout('layouts.base');
    }
}
