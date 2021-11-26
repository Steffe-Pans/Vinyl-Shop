<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id');    // shorthand for $table->unsignedBigInteger('id');
            $table->string('artist');
            $table->string('title');
            $table->string('title_mbid', 36)->nullable();
            $table->string('cover')->nullable();
            $table->float('price', 5, 2)->default(19.99);
            $table->unsignedInteger('stock')->default(1);
            $table->timestamps();

            // Foreign key relation
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
        });
        // Insert some records (inside up-function, after create method)
        DB::table('records')->insert(
            [
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 1,
                    'artist' => 'Queen',
                    'title' => 'Greatest Hits',
                    'title_mbid' => 'fcb78d0d-8067-4b93-ae58-1e4347e20216',
                    'cover' => null,
                    'price' => 19.99
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 1,
                    'artist' => 'The Rolling Stones',
                    'title' => 'Sticky Fingers',
                    'title_mbid' => 'd883e644-5ec0-4928-9ccd-fc78bc306a46',
                    'cover' => null,
                    'price' => 21.00
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 0,
                    'artist' => 'The Beatles',
                    'title' => 'Abbey Road',
                    'title_mbid' => 'd6010be3-98f8-422c-a6c9-787e2e491e58',
                    'cover' => null,
                    'price' => 24.99
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 3,
                    'artist' => 'The Who',
                    'title' => 'Tommy',
                    'title_mbid' => 'fceaca05-a210-4f92-9e88-1e8b44ec8e37',
                    'cover' => null,
                    'price' => 12.50
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 1,
                    'artist' => 'Fleetwood Mac',
                    'title' => 'Rumours',
                    'title_mbid' => '081ea37e-db59-4332-8cd2-ad020cb93af6',
                    'cover' => null,
                    'price' => 19.99
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 0,
                    'artist' => 'David Bowie',
                    'title' => '"Heroes"',
                    'title_mbid' => 'f0a4ed57-10e0-4c37-81b4-36311dc7d4b6',
                    'cover' => null,
                    'price' => 19.99
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 3,
                    'artist' => 'David Bowie',
                    'title' => 'The Rise and Fall of Ziggy Stardust and the Spiders From Mars',
                    'title_mbid' => '7dc5edce-ead6-41e4-9c4b-240223c9bab0',
                    'cover' => null,
                    'price' => 24.99
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 1,
                    'artist' => 'Steve Harley & Cockney Rebel',
                    'title' => 'The Psychomodo',
                    'title_mbid' => '88776dcc-072e-4072-bc25-8b970a3f055e',
                    'cover' => 'https://coverartarchive.org/release/4650b4c9-6cc2-4139-a46d-58b9f40a697b/front-250.jpg',
                    'price' => 9.99
                ],
                [
                    'genre_id' => 1,
                    'created_at' => now(),
                    'stock' => 4,
                    'artist' => 'Roxy Music',
                    'title' => 'Siren',
                    'title_mbid' => 'c2dad882-7804-416d-980e-d06b8405e9cf',
                    'cover' => null,
                    'price' => 24.00
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
