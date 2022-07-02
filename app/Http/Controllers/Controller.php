<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id = null,): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOKED"];
        if ($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(width: 200, height: 170),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(maxNbChars: 100)
            ];
        }

        $data = [];
        $categories = ['Бизнес', 'Фильмы', 'Игры'];
        $ICategories = 0;


        for ($i = 0; $i < 10; $i++) {
            $id = $i + 1;

            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(width: 200, height: 170),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => "<strong>" . $faker->text(maxNbChars: 100) . "</strong>",
                'categories' => $categories[$ICategories]
            ];
            $ICategories++;
            if ($ICategories == 3) {
                $ICategories = 0;
            }
        }
        return $data;
    }

    public function getNewsICategories(?int $idCategories = null): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOKED"];


        $data = [];
        $categories = ['Бизнес', 'Фильмы', 'Игры'];
        $ICategories = 0;


        for ($i = 0; $i < 10; $i++) {
            $id = $i + 1;

            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(width: 200, height: 170),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(maxNbChars: 100),
                'categories' => $categories[$ICategories]
            ];
            $ICategories++;
            if ($ICategories == 3) {
                $ICategories = 0;
            }
        }
        if ($idCategories) {
            $dataCategories = [];
            foreach ($data as $Idata) {
                if ($Idata['categories'] == $categories[$idCategories - 1]) {
                    $dataCategories[]    = $Idata;
                }
            }
            return $dataCategories;
        }


        return $categories;
    }
}
