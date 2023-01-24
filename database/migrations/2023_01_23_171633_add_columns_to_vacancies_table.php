<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table -> string('title');
            $table -> string('company');
            $table -> date('lastHiringDate');
            $table -> text('jobDescription');
            $table -> string('image');
            $table -> foreignId('salary_id') -> constrained('salaries') -> onDelete('cascade');
            $table -> foreignId('category_id') -> constrained('categories') -> onDelete('cascade');
            $table -> boolean('published') -> default(true);
            $table -> foreignId('user_id') -> constrained() -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table -> dropForeign('vacancies_category_id_foreign');
            $table -> dropForeign('vacancies_salary_id_foreign');
            $table -> dropForeign('vacancies_user_id_foreign');
            $table -> dropColumn('title');
            $table -> dropColumn('company');
            $table -> dropColumn('lastHiringDate');
            $table -> dropColumn('jobDescription');
            $table -> dropColumn('image');
            $table -> dropColumn('salary_id');
            $table -> dropColumn('category_id');
            $table -> dropColumn('published');
            $table -> dropColumn('user_id');
        });
    }
};
