<?php


require_once __DIR__ . "/rest/dao/QuestionsDao.class.php";
require_once __DIR__ . "/rest/dao/AnswersDao.class.php";

// Create instances of DAO classes
$questionsDao = new QuestionsDao();
$answersDao = new AnswersDao();

// Fetch questions and answers from the database
$questions = $questionsDao->getAllQuestions();

// Combine questions and answers into a single array
$data = [];
foreach ($questions as $question) {
    $questionId = $question['question_id']; 
    $userId = $question['user_id']; 
    $title = $question['title']; 
    $body = $question['body'];
    
    
    // $answerText = $answersDao->getAnswerForQuestion($questionId); 
    
    $data[] = [
        'question_id' => $questionId,
        'user_id' => $userId,
        'title' => $title,
        'body' => $body,
        // 'answer' => $answerText
    ];
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);



