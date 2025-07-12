<?php
// database/migrations/xxxx_xx_xx_create_movies_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('genre');
            $table->integer('duration'); // dalam menit
            $table->string('director');
            $table->string('cast');
            $table->date('release_date');
            $table->string('poster')->nullable();
            $table->decimal('rating', 5, 2)->default(0);
            $table->enum('status', ['coming_soon', 'now_showing', 'ended'])->default('coming_soon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}