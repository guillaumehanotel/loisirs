<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Anime\AnimeDataDto;
use App\DataTransferObjects\Book\BookDto;
use App\DataTransferObjects\Game\GameDto;
use Error;
use Exception;
use Google\Client;
use Google\Service\Books;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{


    public function index()
    {

        $url = 'https://api.rawg.io/api/games';


        $searchQuery = [
            'search' => 'zelda',
//            'ordering' => '-rating', // '-rating' or 'rating
            'ordering' => '-added', // '-rating' or 'rating
            'key' => config('services.rawg.api_key'),
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($url, $searchQuery);

        $response = $response->json();
        $results = $response['results'];
        $games = collect();
        foreach ($results as $result) {
            $games->push(new GameDto($result));
        }
        dd($games);

        return view('welcome');
    }

    public function games()
    {

    }

    /**
     * https://docs.api.jikan.moe/#tag/anime/operation/getAnimeSearch
     */
    public function anime()
    {
        $url = 'https://api.jikan.moe/v4/anime';

        // Créer l'objet DTO avec les valeurs de recherche souhaitées
        $searchQuery = [
//            'sfw' => false,
//            'unapproved' => false,
//            'page' => 1,
//            'limit' => 25,
//            'q' => 'naruto',
//            'type' => 'tv',
//            'score' => 7.5,
            'min_score' => 9,
//            'max_score' => 10,
//            'status' => 'finished_airing',
//            'rating' => 'rx',
//            'genres' => 'action,adventure',
//            'genres_exclude' => 'drama',
//            'order_by' => 'score',
//            'sort' => 'asc',
//            'letter' => 'a',
//            'producers' => '1,2',
//            'start_date' => '2020-01-01',
//            'end_date' => '2021-01-01',
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($url, $searchQuery);

        $response = $response->json();
        dd($response);

        $animesData = $response['data'];

        $animes = collect();

        foreach ($animesData as $anime) {
            try {
                $dto = new AnimeDataDto($anime);
                $animes->push($dto);
            } catch (Exception|Error $e) {
                dump($e->getMessage());
                dd($anime);
            }
        }

        dd($animes->all());


//        $current_page = $pagination['current_page'];
//        $last_visible_page = $pagination['last_visible_page'];
//        $animes = collect();
//
//        while($current_page <= $last_visible_page) {
//            $response = Http::withHeaders([
//                'Content-Type' => 'application/json',
//                'Accept' => 'application/json',
//            ])->get($url, [
//                'page' => $current_page,
//                'min_score' => 8,
//            ]);
//
//            $response = $response->json();
//
//            foreach ($response['data'] as $anime) {
//                try {
//                    $anime['type'] = App\Enums\AnimeType::fromValue($anime['type']);
//                    $dto = new AnimeDataDto($anime);
//                    $animes->push($dto);
//                } catch (Exception|Error $e) {
//                    dump($e->getMessage());
//                    dd($anime);
//                }
//            }
//
//            $current_page++;
//        }


        return view('welcome');
    }

    public function books()
    {
        $client = new Client();
        $client->setApplicationName("Books");
        $client->setDeveloperKey(config('services.google.api_key'));

        $service = new Books($client);
        $query = 'David Louapre';
        $optParams = [
        ];
        $results = $service->volumes->listVolumes($query, $optParams);

        $books = collect();

        foreach ($results->getItems() as $item) {
            $book = new BookDto($item);
            $books->push($book);
        }

        dd($books->all());

        return view('welcome');
    }
}
