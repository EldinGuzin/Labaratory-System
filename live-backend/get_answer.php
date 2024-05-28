<?php
require_once __DIR__ . "/rest/dao/AnswersDao.class.php";
require_once __DIR__ . "/rest/dao/BaseDao.class.php";

$answersDao = new AnswersDao();

header('Content-Type: application/json');

if (isset($_GET['question_id'])) {
    $question_id = $_GET['question_id'];
    try {
        $answer = $answersDao->getAnswerByQuestionId($question_id);
        if ($answer) {
            echo json_encode(['success' => true, 'answer' => $answer['body']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No answer found for this question.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error fetching answer: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request. Question ID is missing.']);
}
?>
