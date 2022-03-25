<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'command:getStatistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Gets information about countries and their Covid19 data from https://devtest.ge/API ';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$confirmedSum = 0;
		$recoveredSum = 0;
		$deathsSum = 0;

		$response = Http::get('https://devtest.ge/countries')->json();

		foreach ($response as $single)
		{
			$data = Http::post('https://devtest.ge/get-country-statistics', ['code' => $single['code']])->json();
			$country = Country::where('code', '=', $single['code'])->first();
			if ($country == null)
			{
				if (isset($data['confirmed']) && isset($data['recovered']) && isset($data['deaths']))
				{
					Country::create([
						'code' => $single['code'],
						'name' => [
							'en' => $single['name']['en'],
							'ka' => $single['name']['ka'],
						],
						'confirmed' => $data['confirmed'],
						'recovered' => $data['recovered'],
						'deaths'    => $data['deaths'],
					]);
				}
			}
			else
			{
				if (isset($data['confirmed']) && isset($data['recovered']) && isset($data['deaths']))
				{
					$country->confirmed = $data['confirmed'];
					$country->recovered = $data['recovered'];
					$country->deaths = $data['deaths'];
				}
			}

			$confirmedSum += $data['confirmed'];
			$recoveredSum += $data['recovered'];
			$deathsSum += $data['deaths'];
			sleep(2);
		}

		$country = Country::where('code', '=', 'WRLD')->first();
		if ($country == null)
		{
			Country::create([
				'code' => 'WRLD',
				'name' => [
					'en' => 'Worldwide',
					'ka' => 'მსოფლიოში',
				],
				'confirmed' => $confirmedSum,
				'recovered' => $recoveredSum,
				'deaths'    => $deathsSum,
			]);
		} else {
			$country->confirmed = $confirmedSum;
			$country->recovered = $recoveredSum;
			$country->deaths = $deathsSum;	
		}
		echo 'The data has been fetched successfully!';
		return 0;
	}
}
