# Database Seeding Instructions

## New Knowledge Added

I've created a new seeder file `AdditionalNsukKnowledgeSeeder.php` that contains:

### Events & Important Dates
- **Dinner Night** - Final Syntax Dinner & Awards Night (Oct 17, 2025)
- **Project Defense** - Chapter 4-5 Defense (Oct 13, 2025)

### Course Information
- **CMP422** - Algorithm & Structured Programming
- **CMP421** - Artificial Intelligence  
- **CMP425** - Modelling and Simulation

## How to Seed the Database

### Option 1: Seed Everything (Recommended)
Run this command to seed all knowledge including the new additions:

```bash
php artisan db:seed
```

### Option 2: Seed Only New Knowledge
If you want to add only the new knowledge without re-seeding everything:

```bash
php artisan db:seed --class=AdditionalNsukKnowledgeSeeder
```

### Option 3: Fresh Database with All Data
To completely reset and reseed the database:

```bash
php artisan migrate:fresh --seed
```

## What Happens When You Seed

The seeder uses `updateOrCreate()` which means:
- If a question already exists in the database, it will be **updated**
- If a question doesn't exist, it will be **created**
- No duplicate entries will be created

## Verify the Data

After seeding, you can verify the data was added by:

1. Checking the database directly
2. Asking the chatbot questions like:
   - "When is dinner night?"
   - "Details on CMP422?"
   - "What is the date for chapter 4-5 defense?"

## Files Modified

1. **Created**: `database/seeders/AdditionalNsukKnowledgeSeeder.php`
2. **Modified**: `database/seeders/DatabaseSeeder.php` (added new seeder to call list)

## Note

The AI chatbot will now:
1. Search the database first for these questions
2. If found, return the answer from the database
3. If not found, search online using AI
4. If still not found, show fallback message with contact info
