# NSUK AI Chatbot - Chatbase Integration Guide

## 🎯 **System Overview**

The NSUK AI Chatbot is a Laravel-based intelligent assistant that combines **local database knowledge** with **Chatbase AI** to provide accurate, context-aware responses about Nasarawa State University, Keffi.

### **Key Features**
- ✅ **Hybrid Intelligence**: Database-first approach with AI fallback
- ✅ **Chatbase Integration**: Professional AI responses using trained knowledge
- ✅ **Conversation Context**: Maintains context across messages
- ✅ **User Authentication**: Secure, personalized chat experience
- ✅ **Chat History**: Persistent conversation storage
- ✅ **Real-time Responses**: Fast, accurate information delivery

---

## 🏗️ **Architecture**

### **3-Tier Response System**

```
User Message
    ↓
┌─────────────────────────────────────┐
│ 1. GREETING HANDLER                 │
│    Simple greetings → Instant reply │
└─────────────────────────────────────┘
    ↓ (if not greeting)
┌─────────────────────────────────────┐
│ 2. DATABASE SEARCH                  │
│    Local knowledge → Fast response  │
└─────────────────────────────────────┘
    ↓ (if not found)
┌─────────────────────────────────────┐
│ 3. CHATBASE AI                      │
│    Trained AI → Intelligent answer  │
└─────────────────────────────────────┘
    ↓ (if no answer)
┌─────────────────────────────────────┐
│ 4. FALLBACK                         │
│    Contact information              │
└─────────────────────────────────────┘
```

---

## 🔧 **Installation & Setup**

### **Step 1: Environment Configuration**

Add the following to your `.env` file:

```env
# Chatbase AI Configuration (Primary AI System)
CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2

# NSUK Configuration
NSUK_CONTACT_NUMBER="+234-XXX-XXX-XXXX"
NSUK_SUPPORT_EMAIL="support@nsuk.edu.ng"
NSUK_WEBSITE="https://nsuk.edu.ng"
```

### **Step 2: Install Dependencies**

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Generate application key (if not done)
php artisan key:generate
```

### **Step 3: Database Setup**

```bash
# Run migrations
php artisan migrate

# Seed database with NSUK knowledge
php artisan db:seed
```

### **Step 4: Clear Caches**

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

### **Step 5: Start Development Server**

```bash
# Start Laravel server
php artisan serve

# In another terminal, start Vite
npm run dev
```

---

## 📚 **How It Works**

### **1. Database Search (First Priority)**

The system first searches the local `nsuk_knowledge` table for answers:

- **Exact Question Match**: Checks for identical questions
- **Keyword Scoring**: Analyzes keyword relevance
- **Smart Matching**: Requires 60% keyword match + 2 main keywords
- **Fast Response**: Instant answers for known topics

**Example Database Questions:**
- "When was NSUK established?"
- "Who is the Vice-Chancellor?"
- "Tell me about CMP courses"
- "How many faculties does NSUK have?"

### **2. Chatbase AI (Secondary)**

If no database match is found, the system queries Chatbase:

- **Trained Knowledge**: Uses your Chatbase-trained data
- **Context Awareness**: Maintains conversation history
- **Natural Responses**: Professional, conversational answers
- **Broad Coverage**: Handles questions beyond database

**Example Chatbase Questions:**
- "What are the admission requirements?"
- "Tell me about the library facilities"
- "How do I apply for scholarships?"
- General knowledge questions

### **3. Fallback Response**

If neither system has an answer:

```
I apologize, but I don't have specific information about that at the moment.

📞 Phone: +234-XXX-XXX-XXXX
📧 Email: support@nsuk.edu.ng
🌐 Website: https://nsuk.edu.ng
```

---

## 🔌 **Chatbase Integration Details**

### **API Endpoint**

```
POST https://www.chatbase.co/api/v1/chat
```

### **Request Format**

```json
{
  "messages": [
    {
      "content": "User's question here",
      "role": "user"
    }
  ],
  "chatbotId": "n0-Qe4suEVbJZBZYU4zG2",
  "stream": false,
  "temperature": 0.7,
  "conversationId": "optional-for-context"
}
```

### **Response Format**

```json
{
  "text": "AI-generated answer",
  "conversationId": "unique-conversation-id"
}
```

### **Key Features**

- **Conversation Context**: `conversationId` maintains chat history
- **Temperature Control**: Set to 0.7 for balanced creativity
- **Non-streaming**: Returns complete responses
- **Error Handling**: Automatic retries with fallback

---

## 📁 **File Structure**

```
app/
├── Services/
│   ├── ChatbaseService.php      # Chatbase API integration
│   └── NsukChatService.php      # Main chat logic
├── Http/Controllers/
│   └── ChatController.php       # Chat endpoints
└── Models/
    ├── Chat.php                 # Chat sessions
    ├── ChatMessage.php          # Individual messages
    └── NsukKnowledge.php        # Database knowledge

config/
└── services.php                 # API configurations

database/
├── migrations/                  # Database schema
└── seeders/                     # Knowledge seeding

resources/
└── views/
    └── dashboard.blade.php      # Chat interface
```

---

## 🧪 **Testing the System**

### **Test 1: Database Questions**

```
User: "when was nsuk established"
Expected: Database answer with establishment details
```

### **Test 2: Chatbase Questions**

```
User: "what are the admission requirements for computer science"
Expected: Chatbase AI response with detailed information
```

### **Test 3: Greetings**

```
User: "hello"
Expected: Instant greeting response
```

### **Test 4: Unknown Topics**

```
User: "tell me about quantum physics"
Expected: Chatbase answer or fallback with contact info
```

---

## 🔐 **Security Considerations**

### **API Key Protection**

- ✅ API keys stored in `.env` (not version controlled)
- ✅ Keys loaded via `config/services.php`
- ✅ Never exposed to frontend

### **User Authentication**

- ✅ All chat routes require authentication
- ✅ Users can only access their own chats
- ✅ Session-based security

### **Input Validation**

- ✅ Message length limited to 1000 characters
- ✅ XSS protection via Laravel's escaping
- ✅ SQL injection prevention via Eloquent ORM

---

## 🎨 **Chatbase Iframe Integration**

You can also embed the Chatbase chatbot directly:

```html
<iframe
    src="https://www.chatbase.co/chatbot-iframe/n0-Qe4suEVbJZBZYU4zG2"
    width="100%"
    style="height: 100%; min-height: 700px"
    frameborder="0"
></iframe>
```

**Note**: The Laravel integration provides better control, database integration, and user management compared to the iframe.

---

## 📊 **Logging & Debugging**

### **Enable Detailed Logging**

All chat operations are logged to `storage/logs/laravel.log`:

```php
Log::info('AI: Processing message - ' . $message);
Log::info('Database search: Keywords found - ' . implode(', ', $keywords));
Log::info('Chatbase search: Successfully found answer');
```

### **Check Logs**

```bash
# View real-time logs
tail -f storage/logs/laravel.log

# Search for specific events
grep "Chatbase" storage/logs/laravel.log
```

---

## 🚀 **Performance Optimization**

### **Database Indexing**

```sql
-- Add indexes for faster searches
CREATE INDEX idx_question ON nsuk_knowledge(question);
CREATE INDEX idx_keywords ON nsuk_knowledge(keywords);
CREATE INDEX idx_active ON nsuk_knowledge(is_active);
```

### **Caching Strategy**

```php
// Cache frequently asked questions
Cache::remember('faq_' . md5($question), 3600, function() {
    return $this->searchDatabase($question);
});
```

### **API Optimization**

- ✅ 60-second timeout for Chatbase requests
- ✅ 3 automatic retries on failure
- ✅ Conversation context reduces redundant queries

---

## 🔄 **Migration from Groq to Chatbase**

### **What Changed**

| Feature | Groq (Old) | Chatbase (New) |
|---------|-----------|----------------|
| API Provider | Groq AI | Chatbase |
| Training | Generic | NSUK-specific |
| Context | Stateless | Conversation-aware |
| Integration | Direct API | Service layer |

### **Backward Compatibility**

The Groq configuration is kept in `config/services.php` for reference but is no longer used.

---

## 📞 **Support & Contact**

### **For Technical Issues**

- Check logs: `storage/logs/laravel.log`
- Verify API keys in `.env`
- Ensure database is seeded
- Clear all caches

### **For Content Updates**

- Update `database/seeders/NsukKnowledgeSeeder.php`
- Run: `php artisan db:seed --class=NsukKnowledgeSeeder`

### **For Chatbase Training**

- Visit: https://www.chatbase.co
- Update your chatbot training data
- Changes reflect immediately in API responses

---

## 🎉 **Success Checklist**

- ✅ Environment variables configured
- ✅ Database migrated and seeded
- ✅ Chatbase API responding
- ✅ User authentication working
- ✅ Chat history persisting
- ✅ Logs showing successful operations

---

## 📝 **Example Conversation Flow**

```
User: "hi"
System: [Greeting Handler] → Instant welcome message

User: "when was nsuk established"
System: [Database Search] → "Nasarawa State University, Keffi (NSUK) was established..."

User: "what programs do you offer"
System: [Chatbase AI] → Detailed list of programs from trained knowledge

User: "tell me about quantum computing"
System: [Chatbase AI] → General knowledge response

User: "something completely unknown"
System: [Fallback] → Contact information
```

---

## 🔮 **Future Enhancements**

- [ ] Add voice input/output
- [ ] Implement sentiment analysis
- [ ] Add multi-language support
- [ ] Create admin dashboard for knowledge management
- [ ] Integrate with NSUK student portal
- [ ] Add file upload for document queries

---

**Built with ❤️ for Nasarawa State University, Keffi**
