# 🚀 START HERE - NSUK AI Chatbot

Welcome! This is your starting point for the NSUK AI Chatbot project.

---

## ⚡ **Quick Setup (5 Minutes)**

### **Step 1: Configure Environment**

Open your `.env` file and add these credentials:

```env
CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2
```

### **Step 2: Run Setup Commands**

```bash
php artisan config:clear
php artisan cache:clear
php artisan migrate
php artisan db:seed
```

### **Step 3: Start the Application**

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

### **Step 4: Test It**

Open `http://localhost:8000` and try:
- "hello" → Greeting
- "when was nsuk established" → Database answer
- "what are the admission requirements" → AI answer

---

## 📚 **What to Read Next**

### **If you're new to the project:**
→ Read **[README_NSUK.md](README_NSUK.md)** for project overview

### **If you want to understand how it works:**
→ Read **[UPDATED_SYSTEM_OVERVIEW.md](UPDATED_SYSTEM_OVERVIEW.md)**

### **If you're a developer:**
→ Read **[IMPLEMENTATION_SUMMARY.md](IMPLEMENTATION_SUMMARY.md)**

### **If you're deploying to production:**
→ Read **[DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)**

### **If you need API details:**
→ Read **[API_DOCUMENTATION.md](API_DOCUMENTATION.md)**

### **If you want to see all documentation:**
→ Read **[DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md)**

---

## 🎯 **What Is This?**

An intelligent chatbot for Nasarawa State University, Keffi that:

✅ **Answers questions** about NSUK using local database + Chatbase AI  
✅ **Maintains context** across conversations  
✅ **Authenticates users** for personalized experience  
✅ **Saves chat history** for future reference  
✅ **Works on all devices** - desktop, tablet, mobile  

---

## 🏗️ **How It Works**

```
Your Question
    ↓
1. Check if greeting → Instant response
    ↓
2. Search database → Fast answer if found
    ↓
3. Ask Chatbase AI → Intelligent response
    ↓
4. Fallback → Contact information
```

---

## 🔑 **Your Credentials**

- **API Key**: `0bad557c-187f-482d-a5c4-a208f5fa6497`
- **Chatbot ID**: `n0-Qe4suEVbJZBZYU4zG2`
- **Chatbase Dashboard**: https://www.chatbase.co
- **Iframe URL**: `https://www.chatbase.co/chatbot-iframe/n0-Qe4suEVbJZBZYU4zG2`

---

## 📁 **Key Files**

```
app/Services/
├── ChatbaseService.php      # Chatbase API integration
└── NsukChatService.php      # Main chat logic

app/Http/Controllers/
└── ChatController.php       # Chat endpoints

config/
└── services.php             # Configuration

.env                         # Your credentials
```

---

## 🧪 **Test Questions**

Try these to see different response types:

**Greetings:**
- "hello"
- "hi"
- "good morning"

**Database Questions:**
- "when was nsuk established"
- "who is the vice chancellor"
- "tell me about cmp courses"

**AI Questions:**
- "what are the admission requirements"
- "tell me about the library"
- "how do I apply for scholarships"

---

## 🆘 **Need Help?**

### **Something not working?**
1. Check logs: `storage/logs/laravel.log`
2. Verify credentials in `.env`
3. Clear caches: `php artisan config:clear`

### **Want to learn more?**
1. See **[DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md)** for all docs
2. Read **[QUICK_START.md](QUICK_START.md)** for detailed setup

### **Ready to deploy?**
1. Follow **[DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)**

---

## ✅ **Success Checklist**

- [ ] `.env` configured with Chatbase credentials
- [ ] Database migrated and seeded
- [ ] Laravel server running
- [ ] Vite running (for assets)
- [ ] Tested with sample questions
- [ ] All responses working correctly

---

## 🎉 **You're Ready!**

The NSUK AI Chatbot is now set up and ready to use.

**Next Steps:**
1. ✅ Test all features
2. ✅ Add more knowledge to database
3. ✅ Customize for your needs
4. ✅ Deploy to production

---

## 📞 **Support**

- **Technical**: Check documentation in this folder
- **Chatbase**: support@chatbase.co
- **NSUK**: support@nsuk.edu.ng

---

**Built with ❤️ for Nasarawa State University, Keffi**

**Happy Chatting! 🚀**
