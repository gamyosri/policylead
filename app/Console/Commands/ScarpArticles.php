<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\ScarpingHelper;

class ScarpArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:scraper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $scraper;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->scraper = app(ScarpingHelper::class);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->scraper->scrapeSite();
    }
}
