# NSUK AI Chatbot 🤖

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue" alt="PHP">
  <img src="https://img.shields.io/badge/Chatbase-Integrated-green" alt="Chatbase">
  <img src="https://img.shields.io/badge/Status-Production%20Ready-success" alt="Status">
</p>

An intelligent chatbot system for **Nasarawa State University, Keffi (NSUK)** that combines local database knowledge with Chatbase AI to provide accurate, context-aware responses about the university.

---

## ✨ **Features**

- 🎯 **Hybrid Intelligence**: Database-first approach with AI fallback
- 🤖 **Chatbase Integration**: Professional AI responses using trained knowledge
- 💬 **Conversation Context**: Maintains context across messages
- 🔐 **User Authentication**: Secure, personalized chat experience
- 📚 **Chat History**: Persistent conversation storage
- ⚡ **Real-time Responses**: Fast, accurate information delivery
- 📱 **Responsive Design**: Works on desktop, tablet, and mobile
- 🔍 **Smart Search**: Intelligent keyword matching and scoring

---

## 🚀 **Quick Start**

### **Prerequisites**

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite (or MySQL/PostgreSQL)

### **Installation**

```bash
# 1. Clone the repository
git clone <repository-url>
cd nsuk-ai

# 2. Install dependencies
composer install
npm install

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Add Chatbase credentials to .env
CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2

# 5. Set up database
php artisan migrate
php artisan db:seed

# 6. Clear caches
php artisan config:clear
php artisan cache:clear

# 7. Start development servers
php artisan serve
# In another terminal:
npm run dev
```

### **Access the Application**

Open your browser to: `http://localhost:8000`

---

## 📖 **Documentation**

- **[Quick Start Guide](QUICK_START.md)** - Get started in 5 minutes
- **[Chatbase Integration](CHATBASE_INTEGRATION.md)** - Complete integration guide
- **[System Overview](UPDATED_SYSTEM_OVERVIEW.md)** - Architecture and features
- **[API Documentation](API_DOCUMENTATION.md)** - API reference and examples

---

## 🏗️ **Architecture**

### **Response Flow**

```
User Question
    ↓
┌─────────────────────────────────┐
│ 1. Greeting Handler             │
│    "hi", "hello" → Instant      │
└─────────────────────────────────┘
    ↓
┌─────────────────────────────────┐
│ 2. Database Search              │
│    Local knowledge → Fast       │
└─────────────────────────────────┘
    ↓
┌─────────────────────────────────┐
│ 3. Chatbase AI                  │
│    Trained AI → Intelligent     │
└─────────────────────────────────┘
    ↓
┌─────────────────────────────────┐
│ 4. Fallback                     │
│    Contact information          │
└─────────────────────────────────┘
```

### **Key Components**

- **ChatbaseService**: Handles Chatbase API communication
- **NsukChatService**: Main chat logic and orchestration
- **ChatController**: HTTP endpoints and request handling
- **Database Models**: Chat sessions and message storage

---

## 🧪 **Testing**

### **Test Database Questions**

```
"when was nsuk established"
"tell me about cmp courses"
"how many faculties does nsuk have"
```

### **Test Chatbase AI**

```
"what are the admission requirements"
"tell me about the library facilities"
"explain the grading system"
```

### **Test Greetings**

```
"hi"
"hello"
"good morning"
```

---

## 🔧 **Configuration**

### **Environment Variables**

```env
# Chatbase AI Configuration
CHATBASE_API_KEY=your-api-key
CHATBASE_CHATBOT_ID=your-chatbot-id

# NSUK Contact Information
NSUK_CONTACT_NUMBER="+234-XXX-XXX-XXXX"
NSUK_SUPPORT_EMAIL="support@nsuk.edu.ng"
NSUK_WEBSITE="https://nsuk.edu.ng"
```

### **Service Configuration**

Located in `config/services.php`:

```php
'chatbase' => [
    'api_key' => env('CHATBASE_API_KEY'),
    'chatbot_id' => env('CHATBASE_CHATBOT_ID'),
],
```

---

## 📊 **Database Schema**

### **Tables**

- `users` - User accounts
- `chats` - Chat sessions
- `chat_messages` - Individual messages
- `nsuk_knowledge` - Local knowledge base

### **Seeding Data**

```bash
# Seed all tables
php artisan db:seed

# Seed specific seeder
php artisan db:seed --class=NsukKnowledgeSeeder
```

---

## 🛠️ **Development**

### **File Structure**

```
app/
├── Services/
│   ├── ChatbaseService.php      # Chatbase API integration
│   └── NsukChatService.php      # Main chat logic
├── Http/Controllers/
│   └── ChatController.php       # Chat endpoints
└── Models/
    ├── Chat.php                 # Chat sessions
    ├── ChatMessage.php          # Messages
    └── NsukKnowledge.php        # Knowledge base

config/
└── services.php                 # Service configurations

database/
├── migrations/                  # Database schema
└── seeders/                     # Data seeding

resources/
└── views/
    └── dashboard.blade.php      # Chat interface
```

### **Adding New Knowledge**

Edit `database/seeders/NsukKnowledgeSeeder.php`:

```php
NsukKnowledge::create([
    'question' => 'Your question here',
    'answer' => 'Your answer here',
    'keywords' => 'keyword1, keyword2, keyword3',
    'category' => 'Category Name',
    'is_active' => true,
]);
```

Then run:

```bash
php artisan db:seed --class=NsukKnowledgeSeeder
```

---

## 🔐 **Security**

- ✅ API keys stored in environment variables
- ✅ User authentication required for all chat routes
- ✅ Input validation and sanitization
- ✅ XSS protection via Laravel's escaping
- ✅ SQL injection prevention via Eloquent ORM
- ✅ CSRF protection on all forms

---

## 📈 **Performance**

- ⚡ Database queries optimized with indexes
- ⚡ Chatbase API with timeout and retry logic
- ⚡ Frontend loading indicators
- ⚡ Conversation context caching
- ⚡ Efficient keyword matching algorithm

---

## 🐛 **Troubleshooting**

### **Chatbase Not Responding**

```bash
# Check API credentials
php artisan tinker
>>> config('services.chatbase.api_key')
>>> config('services.chatbase.chatbot_id')

# Check logs
tail -f storage/logs/laravel.log
```

### **Database Issues**

```bash
# Reset database
php artisan migrate:fresh --seed

# Check database connection
php artisan tinker
>>> DB::connection()->getPdo()
```

### **Cache Issues**

```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 📝 **Logging**

All operations are logged to `storage/logs/laravel.log`:

```
[2024-11-09 18:00:00] local.INFO: AI: Processing message - when was nsuk...
[2024-11-09 18:00:00] local.INFO: Database search: Keywords found - nsuk, when
[2024-11-09 18:00:00] local.INFO: Database search: Best match found with 8 points
[2024-11-09 18:00:00] local.INFO: AI: Answer found in database
```

---

## 🤝 **Contributing**

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 👥 **Credits**

- **Laravel Framework** - [laravel.com](https://laravel.com)
- **Chatbase AI** - [chatbase.co](https://chatbase.co)
- **Nasarawa State University, Keffi** - [nsuk.edu.ng](https://nsuk.edu.ng)

---

## 📞 **Support**

- **Email**: support@nsuk.edu.ng
- **Website**: https://nsuk.edu.ng
- **Documentation**: See docs folder

---

## 🎉 **Acknowledgments**

Built with ❤️ for **Nasarawa State University, Keffi**

Special thanks to all contributors and the NSUK community.

---

<p align="center">
  <strong>NSUK AI Chatbot</strong> - Intelligent Assistance for NSUK Students and Staff
</p>
