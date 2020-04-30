<?php

use App\Answer;
use App\Question;
use App\QuestionsSet;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DummyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionsSet::create([
            'id' => 1,
            'title' => 'Default title goes here.',
            'description' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic repellat excepturi officia dolores sequi tempore minus quae rerum soluta. Ad commodi iure exercitationem sequi, reiciendis officiis illo earum officia iusto.',
            'schedule_date' => Carbon::today()
        ]);

        for ($i = 1; $i < 5; $i++) {
            Question::create([
                'id' => $i,
                'questions_set_id' => 1,
                'title' => 'This is a dummy question ' . $i
            ]);
            for ($a = 1; $a < 4; $a++) {
                Answer::create([
                    'question_id' => $i,
                    'name' => 'Answer ' . $a,
                    'correct' => $a == 2 ? true : false,
                    'reason' => 'Some good reason'
                ]);
            }
        }
    }
}
