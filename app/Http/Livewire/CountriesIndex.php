<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CountriesIndex extends Component
{
    public $filter;

	public $order;

	public $search;

	protected $queryString = [
		'filter',
		'order',
		'search',
	];

	public function updatingFilter()
	{
		$this->reset();
	}

	public function updatingSearch()
	{
		// $this->reset();
	}


    public function render()
    {
        $countries = [];
        if($this->filter && $this->filter === 'location') {
            if($this->order && $this->order === 'desc') {
                $countries = Country::all()->sortByDesc('name');
            } else {
                $countries = Country::all()->sortBy('name');
            }
        } else if($this->filter && $this->filter === 'confirmed') {
            if($this->order && $this->order === 'desc') {
                $countries = Country::all()->sortByDesc('confirmed');
            } else {
                $countries = Country::all()->sortBy('confirmed');
            }
        } else if($this->filter && $this->filter === 'deaths') {
            if($this->order && $this->order === 'desc') {
                $countries = Country::all()->sortByDesc('deaths');
            } else {
                $countries = Country::all()->sortBy('deaths');
            }
        } else if($this->filter && $this->filter === 'recovered') {
            if($this->order && $this->order === 'desc') {
                $countries = Country::all()->sortByDesc('recovered');
            } else {
                $countries = Country::all()->sortBy('recovered');
            }
        } else {
            $countries = Country::all();
        }


        if(strlen($this->search) >= 3) {
            if(app()->currentLocale() == 'ka'){
                $countries = Country::where('name->ka', 'like','%' . $this->search . '%')->get();
            } else {
                $countries = Country::where('name->en', 'like','%' . $this->search . '%')->get();
            }
        }
        
        return view('livewire.countries-index', [
            'countries' => $countries
        ]);
    }
}
