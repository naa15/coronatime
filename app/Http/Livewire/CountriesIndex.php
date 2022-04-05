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

        // if(strlen($this->search) >= 3) {
        //     $countries = $countries->where('name', 'like', DB::raw("'%$this->search%'"));

        //     dd($countries);
        // }
        // dd($this->search);
        return view('livewire.countries-index', [
            'countries' => $countries
                ->when(strlen($this->search) >= 3, function ($query) {
                    // return $query->where('name', 'like', '%' . $this->search . '%');
                    // return ($query->where('name', 'Germany'));
                    return $query->where('name', 'LIKE', '%' . $this->search . '%');
                })
        ]);
    }
}
