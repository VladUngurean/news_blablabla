<?php
function outputWelcomeMessage($language) {
    // Path to the JSON file
    $filePath = 'welcome_message.json';
    
    // Check if file exists
    if (!file_exists($filePath)) {
        die('File not found.');
    }
    
    // Read the JSON file
    $jsonContent = file_get_contents($filePath);
    
    // Decode JSON content
    $welcomeMessages = json_decode($jsonContent, true);
    
    // Check if the language exists in the JSON data
    if (!isset($welcomeMessages['welcome_message'][$language])) {
        die('Language not supported.');
    }
    
    // Get the welcome message for the specified language
    $message = $welcomeMessages['welcome_message'][$language];
    
    // Output the welcome message
    echo "<h1>{$message['title']}</h1>";
    echo "<p>{$message['intro']}</p>";
    echo "<ul>";
    foreach ($message['sections'] as $section) {
        echo "<li><strong>{$section['title']}:</strong> {$section['content']}</li>";
    }
    echo "</ul>";
    echo "<p>{$message['chatbot_feature']}</p>";
    echo "<p>{$message['closing']}</p>";
}
?>