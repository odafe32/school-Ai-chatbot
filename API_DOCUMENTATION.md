# NSUK AI Chatbot - API Documentation

## 📡 **Chatbase API Integration**

### **Base URL**
```
https://www.chatbase.co/api/v1
```

### **Authentication**
```
Authorization: Bearer 0bad557c-187f-482d-a5c4-a208f5fa6497
```

---

## 🔌 **Endpoints**

### **1. Send Message**

Send a message to the chatbot and receive an AI response.

**Endpoint**: `POST /chat`

**Headers**:
```json
{
  "Authorization": "Bearer 0bad557c-187f-482d-a5c4-a208f5fa6497",
  "Content-Type": "application/json"
}
```

**Request Body**:
```json
{
  "messages": [
    {
      "content": "What are the admission requirements for NSUK?",
      "role": "user"
    }
  ],
  "chatbotId": "n0-Qe4suEVbJZBZYU4zG2",
  "stream": false,
  "temperature": 0.7,
  "conversationId": "optional-conversation-id"
}
```

**Parameters**:
- `messages` (array, required): Array of message objects
  - `content` (string, required): The user's message
  - `role` (string, required): Always "user"
- `chatbotId` (string, required): Your chatbot ID
- `stream` (boolean, optional): Set to false for complete responses
- `temperature` (float, optional): 0.0-1.0, controls creativity (default: 0.7)
- `conversationId` (string, optional): For maintaining context

**Response**:
```json
{
  "text": "To apply for admission at NSUK, you need to...",
  "conversationId": "conv_abc123xyz",
  "sources": []
}
```

**Response Fields**:
- `text` (string): The AI-generated response
- `conversationId` (string): ID to use for follow-up messages
- `sources` (array): Referenced sources (if any)

---

### **2. Get Chatbot Info**

Retrieve information about your chatbot.

**Endpoint**: `GET /chatbot/{chatbotId}`

**Headers**:
```json
{
  "Authorization": "Bearer 0bad557c-187f-482d-a5c4-a208f5fa6497"
}
```

**Response**:
```json
{
  "id": "n0-Qe4suEVbJZBZYU4zG2",
  "name": "NSUK AI Assistant",
  "status": "active",
  "model": "gpt-3.5-turbo",
  "temperature": 0.7
}
```

---

## 💻 **Laravel Implementation**

### **ChatbaseService.php**

```php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbaseService
{
    private $apiKey;
    private $chatbotId;
    private $baseUrl = 'https://www.chatbase.co/api/v1';

    public function __construct()
    {
        $this->apiKey = config('services.chatbase.api_key');
        $this->chatbotId = config('services.chatbase.chatbot_id');
    }

    public function sendMessage(string $message, ?string $conversationId = null): ?array
    {
        $payload = [
            'messages' => [
                ['content' => $message, 'role' => 'user']
            ],
            'chatbotId' => $this->chatbotId,
            'stream' => false,
            'temperature' => 0.7,
        ];

        if ($conversationId) {
            $payload['conversationId'] = $conversationId;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])
        ->timeout(60)
        ->retry(3, 1000)
        ->post($this->baseUrl . '/chat', $payload);

        if ($response->successful()) {
            $data = $response->json();
            return [
                'answer' => $data['text'] ?? null,
                'conversationId' => $data['conversationId'] ?? null
            ];
        }

        return null;
    }
}
```

---

## 🔄 **Usage Examples**

### **Example 1: Simple Question**

```php
$chatbaseService = new ChatbaseService();
$result = $chatbaseService->sendMessage("When was NSUK established?");

if ($result) {
    echo $result['answer'];
    // Output: "Nasarawa State University, Keffi (NSUK) was established..."
}
```

### **Example 2: Conversation with Context**

```php
// First message
$result1 = $chatbaseService->sendMessage("Tell me about NSUK");
$conversationId = $result1['conversationId'];

// Follow-up message (maintains context)
$result2 = $chatbaseService->sendMessage(
    "What about the admission process?",
    $conversationId
);
```

### **Example 3: Error Handling**

```php
try {
    $result = $chatbaseService->sendMessage($userMessage);
    
    if ($result && isset($result['answer'])) {
        return $result['answer'];
    } else {
        return "Sorry, I couldn't process your request.";
    }
} catch (\Exception $e) {
    Log::error('Chatbase error: ' . $e->getMessage());
    return "An error occurred. Please try again.";
}
```

---

## 🛡️ **Error Handling**

### **Common Errors**

| Status Code | Error | Solution |
|-------------|-------|----------|
| 401 | Unauthorized | Check API key |
| 404 | Not Found | Verify chatbot ID |
| 429 | Rate Limit | Implement retry logic |
| 500 | Server Error | Check Chatbase status |
| Timeout | Network timeout | Increase timeout duration |

### **Laravel Error Handling**

```php
$response = Http::withHeaders([...])
    ->timeout(60)           // 60 second timeout
    ->retry(3, 1000)        // 3 retries, 1 second apart
    ->post($url, $payload);

if (!$response->successful()) {
    Log::warning('Chatbase failed: ' . $response->status());
    Log::warning('Response: ' . $response->body());
    return null;
}
```

---

## 📊 **Rate Limits**

- **Free Tier**: 100 messages/day
- **Pro Tier**: 10,000 messages/day
- **Enterprise**: Unlimited

**Current Plan**: Check your Chatbase dashboard

---

## 🔐 **Security Best Practices**

### **1. Protect API Keys**

```env
# .env file (never commit to Git)
CHATBASE_API_KEY=your-secret-key
CHATBASE_CHATBOT_ID=your-chatbot-id
```

### **2. Use Environment Variables**

```php
// config/services.php
'chatbase' => [
    'api_key' => env('CHATBASE_API_KEY'),
    'chatbot_id' => env('CHATBASE_CHATBOT_ID'),
],
```

### **3. Validate Input**

```php
$request->validate([
    'message' => 'required|string|max:1000',
]);
```

### **4. Sanitize Output**

```blade
<!-- Blade template -->
{{ $message }} <!-- Auto-escaped -->
```

---

## 📈 **Performance Optimization**

### **1. Caching**

```php
use Illuminate\Support\Facades\Cache;

$cacheKey = 'chatbase_' . md5($message);
$answer = Cache::remember($cacheKey, 3600, function() use ($message) {
    return $this->chatbaseService->sendMessage($message);
});
```

### **2. Async Processing**

```php
use Illuminate\Support\Facades\Queue;

Queue::push(function() use ($message) {
    $this->chatbaseService->sendMessage($message);
});
```

### **3. Connection Pooling**

```php
Http::pool(fn ($pool) => [
    $pool->post($url1, $data1),
    $pool->post($url2, $data2),
]);
```

---

## 🧪 **Testing**

### **Unit Test Example**

```php
use Tests\TestCase;
use App\Services\ChatbaseService;

class ChatbaseServiceTest extends TestCase
{
    public function test_send_message()
    {
        $service = new ChatbaseService();
        $result = $service->sendMessage("Hello");
        
        $this->assertNotNull($result);
        $this->assertArrayHasKey('answer', $result);
        $this->assertIsString($result['answer']);
    }
}
```

### **Integration Test**

```bash
# Test via curl
curl -X POST https://www.chatbase.co/api/v1/chat \
  -H "Authorization: Bearer 0bad557c-187f-482d-a5c4-a208f5fa6497" \
  -H "Content-Type: application/json" \
  -d '{
    "messages": [{"content": "Hello", "role": "user"}],
    "chatbotId": "n0-Qe4suEVbJZBZYU4zG2",
    "stream": false
  }'
```

---

## 📚 **Additional Resources**

- **Chatbase Dashboard**: https://www.chatbase.co/dashboard
- **API Documentation**: https://docs.chatbase.co
- **Support**: support@chatbase.co

---

## 🔗 **Related Files**

- `app/Services/ChatbaseService.php` - Service implementation
- `app/Services/NsukChatService.php` - Main chat logic
- `config/services.php` - Configuration
- `.env.example` - Environment template

---

**Last Updated**: November 2024
