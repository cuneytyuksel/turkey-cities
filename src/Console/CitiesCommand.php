<?php namespace Turkey\Cities\Console;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 17/04/2017
 * Time: 16:43
 */

use Illuminate\Console\Command;
use Turkey\Cities\Database\Seeders\CitiesSeeder;

class CitiesCommand extends Command
{
    protected $signature = 'turkey:cities';
    protected $description = 'Türkiye\'nin il, ilçe ve mahalle bilgilerini PTT kaynaklarından alınan bilgiler ile dolduruan komut.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        (new CitiesSeeder())->run();
        $this->line('Seeder completed.');
    }
}