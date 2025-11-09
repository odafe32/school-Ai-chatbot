# NSUK AI Chatbot - Quick Start Guide

## ⚡ **Get Started in 5 Minutes**

### **1. Configure Environment**

Open your `.env` file and add these lines (or update if they exist):

```env
CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2
```

### **2. Run Setup Commands**

```bash
# Clear caches
php artisan config:clear
php artisan cache:clear

# Ensure database is set up
php artisan migrate
php artisan db:seed
```

### **3. Start the Application**

```bash
# Terminal 1: Start Laravel
php artisan serve

# Terminal 2: Start Vite (for assets)
npm run dev
```

### **4. Test It!**

Open your browser to `http://localhost:8000` and try these questions:

- "Hello" → Should get instant greeting
- "When was NSUK established?" → Database answer
- "What are the admission requirements?" → Chatbase AI answer

---

## 🎯 **How It Works**

```
Your Question
    ↓
Database Search (Fast) → Found? → Return Answer
    ↓ Not Found
Chatbase AI (Smart) → Found? → Return Answer
    ↓ Not Found
Fallback (Helpful) → Contact Information
```

---

## 🔑 **Your Credentials**

- **API Key**: `0bad557c-187f-482d-a5c4-a208f5fa6497`
- **Chatbot ID**: `n0-Qe4suEVbJZBZYU4zG2`
- **Iframe URL**: `https://www.chatbase.co/chatbot-iframe/n0-Qe4suEVbJZBZYU4zG2`

---

## 📚 **Need More Help?**

- **Full Documentation**: See `CHATBASE_INTEGRATION.md`
- **System Overview**: See `UPDATED_SYSTEM_OVERVIEW.md`
- **Logs**: Check `storage/logs/laravel.log`

---

## ✅ **Success Checklist**

- [ ] `.env` file updated with Chatbase credentials
- [ ] Caches cleared (`php artisan config:clear`)
- [ ] Database migrated and seeded
- [ ] Laravel server running (`php artisan serve`)
- [ ] Vite running (`npm run dev`)
- [ ] Tested with sample questions

---

**That's it! You're ready to chat! 🚀**
