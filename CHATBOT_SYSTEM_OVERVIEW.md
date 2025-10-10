# NSUK AI Chatbot - Complete System Overview

## 🎯 **System Architecture**

### **3-Step Response Flow:**
1. **Greeting Handler** → Simple greetings ("hi", "hello") → Instant response
2. **Database Search** → Smart keyword matching with scoring → Fast, accurate responses
3. **Online AI Search** → Groq API for questions not in database → Comprehensive answers
4. **Fallback** → Contact information when no answer found → Helpful guidance

## ✅ **What's Working**

### **Database Search Algorithm**
- **Intelligent scoring system** with multiple criteria:
  - Length similarity bonus (prevents partial matches)
  - Keyword match ratio (≥60% required)
  - Main keyword matching (≥2 keywords required)
  - Exact question matching (tried first)
- **Strict thresholds** prevent wrong matches
- **Detailed logging** for debugging

### **Online AI Search**
- **Groq API integration** with proper error handling
- **60-second timeout** with 3 retry attempts
- **Type-safe parameters** (integer/float casting)
- **Comprehensive logging** for troubleshooting

### **Frontend Features**
- **Loading spinner** on send button
- **Auto-disable** during submission
- **Keyboard shortcuts** (Enter to send, Shift+Enter for new line)
- **Responsive design** with mobile support

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

## 🚀 **How to Test**

### **Step 1: Set Up Environment**
```bash
# 1. Update .env file with your Groq API key
GROQ_API_KEY=your_actual_api_key_here
GROQ_MODEL=llama3-8b-8192

# 2. Clear caches
php artisan config:clear
php artisan cache:clear

# 3. Seed database (if not done already)
php artisan db:seed
```

### **Step 2: Test Database Questions**
```text
"when was nsuk created"
→ Should return: "Nasarawa State University, Keffi (NSUK) was established under Nasarawa State Law No. 2 of 2001..."

"tell me about cmp courses"
→ Should return: "CMP courses at NSUK include: CMP421 (Artificial Intelligence)..."

"how many courses do we have"
→ Should return: "NSUK offers courses across 11 Faculties and 60 Departments..."
```

### **Step 3: Test Online Search**
```text
"what is a human"
→ Should search online and return AI-generated answer

"five plus four"
→ Should search online and return "9"

"explain quantum physics"
→ Should search online and return explanation
```

### **Step 4: Test Edge Cases**
```text
"hi"
→ Should return greeting message instantly

"hello"
→ Should return greeting message instantly

"unknown topic"
→ Should return fallback with contact info
```

## 🔧 **Configuration Files**

### **Environment Variables (.env)**
```env
# Required for online search
GROQ_API_KEY=your_api_key_here
GROQ_MODEL=llama3-8b-8192
GROQ_MAX_TOKENS=1000
GROQ_TEMPERATURE=0.7

# NSUK Contact Information
NSUK_CONTACT_NUMBER="+234-XXX-XXX-XXXX"
NSUK_SUPPORT_EMAIL="support@nsuk.edu.ng"
NSUK_WEBSITE="https://nsuk.edu.ng"
```

### **Service Configuration (config/services.php)**
```php
'groq' => [
    'api_key' => env('GROQ_API_KEY'),
    'model' => env('GROQ_MODEL', 'llama3-8b-8192'),
    'max_tokens' => env('GROQ_MAX_TOKENS', 1000),
    'temperature' => env('GROQ_TEMPERATURE', 0.7),
],
```

## 📊 **Performance & Logging**

### **Detailed Logging Available**
- Database search attempts and results
- Online search attempts and errors
- Greeting detection
- Fallback usage

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

## 🚨 **Troubleshooting**

### **Common Issues & Solutions**

#### **1. "No answer found" for known questions**
- Check database seeding: `php artisan db:seed`
- Verify question matches database entries
- Check logs for scoring details

#### **2. Online search not working**
- Verify Groq API key in `.env`
- Check model name (use `llama3-8b-8192`)
- Ensure internet connection
- Check Laravel logs for detailed errors

#### **3. Wrong answers**
- Database matching might be too strict
- Add more specific question entries
- Check keyword scoring in logs

#### **4. Performance issues**
- Database queries are optimized
- Online search has timeout/retry logic
- Frontend has loading indicators

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

3. Online AI Search
    ├── Send to Groq API
    ├── Parse Response
    ├── Return Answer
    └── Continue ↓

4. Fallback Response
    └── Show Contact Info
```

## 🎉 **Ready to Use!**

The AI chatbot is now **fully functional** with:
- ✅ Smart database search
- ✅ Online AI search fallback
- ✅ Loading indicators
- ✅ Comprehensive error handling
- ✅ Detailed logging
- ✅ Mobile-responsive design

**Test it with various questions and enjoy the intelligent responses!** 🚀
