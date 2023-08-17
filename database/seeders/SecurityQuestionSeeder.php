<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecurityQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'What was your childhood nickname?',
            'In what city did you meet your spouse/significant other?',
            'What is the name of your favorite childhood friend?',
            'Where did you vacation last year?',
            'What are the last 5 digits of your driver\'s license number?'
        ];

        $values = array_fill(0, 5, '?'); // Placeholder values

        $placeholders = implode(', ', $values);

        $sql = "INSERT INTO security_questions (`0`, `1`, `2`, `3`, `4`) VALUES ($placeholders)";

        DB::statement($sql, $questions);
    }
}