# NSUK AI Chatbot - Complete System Overview (Chatbase Edition)

## 🎯 **System Architecture**

### **3-Step Response Flow:**
1. **Greeting Handler** → Simple greetings ("hi", "hello") → Instant response
2. **Database Search** → Smart keyword matching with scoring → Fast, accurate responses
3. **Chatbase AI** → Trained AI for questions not in database → Professional answers
4. **Fallback** → Contact information when no answer found → Helpful guidance

## ✅ **What's Working**

### **Chatbase AI Integration**
- **Professional AI responses** using trained NSUK knowledge
- **Conversation context** maintained across messages
- **60-second timeout** with 3 retry attempts
- **Type-safe parameters** and error handling
- **Comprehensive logging** for troubleshooting

### **Database Search Algorithm**
- **Intelligent scoring system** with multiple criteria:
  - Length similarity bonus (prevents partial matches)
  - Keyword match ratio (≥60% required)
  - Main keyword matching (≥2 keywords required)
  - Exact question matching (tried first)
- **Strict thresholds** prevent wrong matches
- **Detailed logging** for debugging

### **Frontend Features**
- **Loading spinner** on send button
- **Auto-disable** during submission
- **Keyboard shortcuts** (Enter to send, Shift+Enter for new line)
- **Responsive design** with mobile support
- **Chat history** with persistent storage

## 📋 **Database Content**

### **Available Knowledge Areas:**

#### **University Information**
- ✅ Establishment date (2001, activities started 2002)
- ✅ Leadership (Vice-Chancellor Prof. Sa'adatu Hassan Liman)
- ✅ Campuses (Keffi main, Lafia campus)
- ✅ Mission, vision, motto
- ✅ Academic structure (11 faculties, 60 departments)

#### **Events & Important Dates**
- ✅ Dinner Night (Final Syntax - Oct 17, 2025)
- ✅ Project Defense (Chapter 4-5 - Oct 13, 2025)

#### **Course Information**
- ✅ CMP421 (Artificial Intelligence)
- ✅ CMP422 (Algorithm & Structured Programming)
- ✅ CMP425 (Modelling and Simulation)
- ✅ General CS course overview

#### **Administration**
- ✅ Staff information (when available)
- ✅ Course counts and faculty structure

## 🚀 **How to Set Up**

### **Step 1: Environment Configuration**

Update your `.env` file:

```env
# Chatbase AI Configuration (Primary AI System)
CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2

# NSUK Contact Information
NSUK_CONTACT_NUMBER="+234-XXX-XXX-XXXX"
NSUK_SUPPORT_EMAIL="support@nsuk.edu.ng"
NSUK_WEBSITE="https://nsuk.edu.ng"
```

### **Step 2: Install & Setup**

```bash
# 1. Install dependencies
composer install
npm install

# 2. Generate application key (if needed)
php artisan key:generate

# 3. Run migrations
php artisan migrate

# 4. Seed database with NSUK knowledge
php artisan db:seed

# 5. Clear caches
php artisan config:clear
php artisan cache:clear

# 6. Start servers
php artisan serve
# In another terminal:
npm run dev
```

## 🧪 **Testing the System**

### **Test 1: Database Questions**
```text
"when was nsuk created"
→ Should return: "Nasarawa State University, Keffi (NSUK) was established under Nasarawa State Law No. 2 of 2001..."

"tell me about cmp courses"
→ Should return: "CMP courses at NSUK include: CMP421 (Artificial Intelligence)..."

"how many courses do we have"
→ Should return: "NSUK offers courses across 11 Faculties and 60 Departments..."
```

### **Test 2: Chatbase AI Questions**
```text
"what are the admission requirements"
→ Should return Chatbase AI-generated answer based on trained knowledge

"tell me about the library facilities"
→ Should return Chatbase AI-generated answer

"explain the grading system"
→ Should return Chatbase AI-generated answer
```

### **Test 3: Greetings**
```text
"hi"
→ Should return greeting message instantly

"hello"
→ Should return greeting message instantly
```

### **Test 4: Fallback**
```text
"unknown topic that's not in database or Chatbase"
→ Should return fallback with contact info
```

## 🔧 **Configuration Files**

### **Environment Variables (.env)**
```env
# Chatbase AI Configuration
CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2

# NSUK Contact Information
NSUK_CONTACT_NUMBER="+234-XXX-XXX-XXXX"
NSUK_SUPPORT_EMAIL="support@nsuk.edu.ng"
NSUK_WEBSITE="https://nsuk.edu.ng"
```

### **Service Configuration (config/services.php)**
```php
'chatbase' => [
    'api_key' => env('CHATBASE_API_KEY'),
    'chatbot_id' => env('CHATBASE_CHATBOT_ID'),
],
```

## 📊 **Performance & Logging**

### **Detailed Logging Available**
- Database search attempts and results
- Chatbase API calls and responses
- Greeting detection
- Fallback usage
- Error tracking

### **Error Handling**
- Network timeouts (60s with retries)
- API authentication errors
- Database connection issues
- Invalid responses

## 🎨 **Frontend Features**

### **Send Button States**
- **Normal**: Paper plane icon, clickable
- **Loading**: Spinning spinner, disabled
- **Error**: Auto-reset after 10 seconds

### **User Experience**
- Auto-focus on input field
- Real-time button state updates
- Keyboard shortcuts
- Mobile-responsive design
- Persistent chat history

## 🚨 **Troubleshooting**

### **Common Issues & Solutions**

#### **1. "No answer found" for known questions**
- Check database seeding: `php artisan db:seed`
- Verify question matches database entries
- Check logs for scoring details

#### **2. Chatbase not responding**
- Verify API key in `.env`: `CHATBASE_API_KEY`
- Verify chatbot ID: `CHATBASE_CHATBOT_ID`
- Ensure internet connection
- Check Laravel logs for detailed errors: `storage/logs/laravel.log`

#### **3. Wrong answers**
- Database matching might be too strict
- Add more specific question entries
- Check keyword scoring in logs
- Update Chatbase training data

#### **4. Performance issues**
- Database queries are optimized
- Chatbase has timeout/retry logic
- Frontend has loading indicators
- Check network latency

## 📈 **System Flow Diagram**

```
User Input
    ↓
1. Check for Greeting
    ├── "hi", "hello" → Instant Response
    └── Continue ↓

2. Database Search
    ├── Extract Keywords
    ├── Score Matches (Length, Ratio, Main Keywords)
    ├── Return if Score ≥4
    └── Continue ↓

3. Chatbase AI Search
    ├── Send to Chatbase API
    ├── Maintain Conversation Context
    ├── Parse Response
    ├── Return Answer
    └── Continue ↓

4. Fallback Response
    └── Show Contact Info
```

## 🔄 **Migration from Groq to Chatbase**

### **What Changed**
- ❌ **Removed**: Groq AI integration
- ✅ **Added**: Chatbase AI integration
- ✅ **Improved**: Conversation context tracking
- ✅ **Enhanced**: NSUK-specific training

### **Why Chatbase?**
- **Trained Knowledge**: Specifically trained on NSUK data
- **Better Accuracy**: More relevant responses
- **Context Awareness**: Maintains conversation history
- **Professional**: Designed for institutional use

## 📁 **Key Files**

```
app/
├── Services/
│   ├── ChatbaseService.php      # NEW: Chatbase API integration
│   └── NsukChatService.php      # UPDATED: Uses Chatbase
├── Http/Controllers/
│   └── ChatController.php       # Chat endpoints
└── Models/
    ├── Chat.php                 # Chat sessions
    ├── ChatMessage.php          # Messages
    └── NsukKnowledge.php        # Database knowledge

config/
└── services.php                 # UPDATED: Chatbase config

.env.example                     # UPDATED: Chatbase credentials
```

## 🎉 **Ready to Use!**

The AI chatbot is now **fully functional** with:
- ✅ Smart database search
- ✅ Chatbase AI integration
- ✅ Conversation context
- ✅ Loading indicators
- ✅ Comprehensive error handling
- ✅ Detailed logging
- ✅ Mobile-responsive design
- ✅ User authentication
- ✅ Chat history

## 📞 **Support**

### **Chatbase Dashboard**
- URL: https://www.chatbase.co
- Chatbot ID: `n0-Qe4suEVbJZBZYU4zG2`
- Update training data anytime

### **Technical Support**
- Check logs: `storage/logs/laravel.log`
- Review documentation: `CHATBASE_INTEGRATION.md`
- Test API: Use provided credentials

**Test it with various questions and enjoy the intelligent responses!** 🚀

---

**Built with ❤️ for Nasarawa State University, Keffi**
