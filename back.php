<?php
if($_POST['text'] || $_POST['system'] || $_POST['assistant'] == true) {
$url = 'https://openai.jabirproject.org/v1/chat/completions';
$data = [
    'model' => 'jabir-400b-online',
    'messages' => [
        [
            'role' => 'system',
            'content' => $_POST['system']
        ],
        [
            'role' => 'user',
            'content' => $_POST['text']
        ],
        [
            'role' => 'assistant',
            'content' => $_POST['assistant']
        ]
    ]
];

$options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => json_encode($data),
];

$ch = curl_init();
curl_setopt_array($ch, $options);
$response = curl_exec($ch);
$result = json_decode($response, true);

function removeEmojis($string) {
    $regex = '/[^\x{0000}-\x{007F}]+|' .
         '[\x{1F600}-\x{1F64F}]+' . // Emoticons
         '|[\x{1F300}-\x{1F5FF}]+' . // Miscellaneous Symbols and Pictographs
         '|[\x{1F680}-\x{1F6FF}]+' . // Transport and Map Symbols
         '|[\x{1F700}-\x{1F77F}]+' . // Alchemical Symbols
         '|[\x{1F900}-\x{1F9FF}]+' . // Supplemental Symbols and Pictographs
         '|[\x{2600}-\x{26FF}]+' . // Miscellaneous Symbols
         '|[\x{2700}-\x{27BF}]+' . // Dingbats
         '|[\x{1F1E6}-\x{1F1FF}]+' . // Regional Indicator Symbols
         '|[\x{1F9C0}-\x{1F9FF}]+' . // Additional Emotions
         '|[\x{1F191}-\x{1F251}]+' . // Enclosed Alphanumeric Supplement
         '|[\x{1F1F2}-\x{1F1F4}]+' . // Flag Symbols
         '|[\x{1F018}-\x{1F0FF}]+' . // Playing Cards
         "|[#]+" .
         '/u';
    return preg_replace($regex, '', $string);
}

function code($string) {
    $callback = function($matches) {
        $codeContent = trim($matches[1]);
        return '<div style="background-color: #f4f4f4; border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-family: monospace; white-space: pre-wrap;">' . htmlspecialchars($codeContent) . '</div>';
    };
    $styledString = preg_replace_callback('/```(.*?)```/s', $callback, $string);
    return $styledString;
}

echo json_encode(["role" => $result['choices']['0']['message']['role'], "output" => code(removeEmojis($result['choices']['0']['message']['content']))]);
curl_close($ch);
}
?>