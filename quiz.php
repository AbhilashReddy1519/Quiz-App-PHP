<?php
header('Content-Type: application/json'); //for data to convert json

$quiz_config = [
    'name' => 'General Knowledge',
    'total_questions' => 10,
    'time_limit' => 60,
    'negative_marking' => 0.25,
];

$questions = [
    [
        'id' => 1,
        'question' => 'Which is the largest planet in our solar system?',
        'options' => [
            'A' => 'Mars',
            'B' => 'Jupiter',
            'C' => 'Saturn',
            'D' => 'Neptune'
        ],
        'correct_answer' => 'B',
        'marks' => 1
    ],
    [
        'id' => 2,
        'question' => 'Who painted the Mona Lisa?',
        'options' => [
            'A' => 'Vincent van Gogh',
            'B' => 'Pablo Picasso',
            'C' => 'Leonardo da Vinci',
            'D' => 'Michelangelo'
        ],
        'correct_answer' => 'C',
        'marks' => 1
    ],
    [
        'id' => 3,
        'question' => 'What is the chemical symbol for gold?',
        'options' => [
            'A' => 'Au',
            'B' => 'Ag',
            'C' => 'Fe',
            'D' => 'Cu'
        ],
        'correct_answer' => 'A',
        'marks' => 1
    ],
    [
        'id' => 4,
        'question' => 'Which country is known as the Land of the Rising Sun?',
        'options' => [
            'A' => 'China',
            'B' => 'Thailand',
            'C' => 'South Korea',
            'D' => 'Japan'
        ],
        'correct_answer' => 'D',
        'marks' => 1
    ],
    [
        'id' => 5,
        'question' => 'What is the capital of Australia?',
        'options' => [
            'A' => 'Sydney',
            'B' => 'Melbourne',
            'C' => 'Canberra',
            'D' => 'Perth'
        ],
        'correct_answer' => 'C',
        'marks' => 1
    ],
    [
        'id' => 6,
        'question' => 'Which element is the most abundant in Earth\'s atmosphere?',
        'options' => [
            'A' => 'Oxygen',
            'B' => 'Carbon Dioxide',
            'C' => 'Nitrogen',
            'D' => 'Hydrogen'
        ],
        'correct_answer' => 'C',
        'marks' => 1
    ],
    [
        'id' => 7,
        'question' => 'Who wrote "Romeo and Juliet"?',
        'options' => [
            'A' => 'Charles Dickens',
            'B' => 'William Shakespeare',
            'C' => 'Jane Austen',
            'D' => 'Mark Twain'
        ],
        'correct_answer' => 'B',
        'marks' => 1
    ],
    [
        'id' => 8,
        'question' => 'What is the smallest bone in the human body?',
        'options' => [
            'A' => 'Stapes',
            'B' => 'Femur',
            'C' => 'Radius',
            'D' => 'Tibia'
        ],
        'correct_answer' => 'A',
        'marks' => 1
    ],
    [
        'id' => 9,
        'question' => 'Which planet is known as the Red Planet?',
        'options' => [
            'A' => 'Venus',
            'B' => 'Mars',
            'C' => 'Mercury',
            'D' => 'Uranus'
        ],
        'correct_answer' => 'B',
        'marks' => 1
    ],
    [
        'id' => 10,
        'question' => 'What is the largest organ in the human body?',
        'options' => [
            'A' => 'Heart',
            'B' => 'Brain',
            'C' => 'Liver',
            'D' => 'Skin'
        ],
        'correct_answer' => 'D',
        'marks' => 1
    ]
];

$data = [$quiz_config, $questions];

echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>