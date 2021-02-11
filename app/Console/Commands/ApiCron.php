<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

class ApiCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron to import post';

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
        $response = Http::get('https://sq1-api-test.herokuapp.com/posts');
        $result = json_decode($response, true);

        foreach ($result['data'] as $data) {
            $resultQuery = DB::table('posts')
                ->where('title', '=', $data['title'])
                ->where('publication_date', '=', $data['publication_date'])
                ->get();

            if ($resultQuery->isEmpty()) {
                $post = new Post();
                $post->title = $data['title'];
                $post->description = $data['description'];
                $post->publication_date = $data['publication_date'];
                $post->user_id = '1'; //this is Admin user ID
                $post->save();
            }
        }
        Cache::remember('posts', 3000, function () {
            return DB::table('posts')
                ->orderBy('publication_date', 'desc')
                ->get();
        });
    }
}
