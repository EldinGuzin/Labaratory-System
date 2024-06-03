<?php

require_once '../live-backend/rest/dao/SubmitAnswerDao.class.php'; // Adjust the path as necessary

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Log the received data for debugging
    error_log('Received data: ' . print_r($data, true));

    // Check if data is parsed correctly
    if ($data === null) {
        error_log('JSON decode error: ' . json_last_error_msg());
        echo json_encode(['success' => false, 'message' => 'Invalid JSON format']);
        exit;
    }

    if (isset($data['question_id'], $data['user_id'], $data['body'])) {
        $answerDao = new SubmitAnswerDao();
        $answer = [
            'question_id' => $data['question_id'],
            'user_id' => $data['user_id'],
            'body' => $data['body']
        ];
        try {
            $result = $answerDao->addAnswer($answer);
            echo json_encode(['success' => true, 'answer_id' => $result['id']]);
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Database error']);
        }
    } else {
        error_log('Invalid input: ' . print_r($data, true));
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
