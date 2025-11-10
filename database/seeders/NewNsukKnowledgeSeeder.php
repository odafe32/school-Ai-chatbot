<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NsukKnowledge;

class NewNsukKnowledgeSeeder extends Seeder
{
    public function run()
    {
        $knowledgeData = [
            // Events and Important Dates - Final Syntax Dinner
            [
                'question' => 'When is the Final Syntax Dinner & Awards Night?',
                'answer' => 'The Final Syntax Dinner & Awards Night for Class of 2025 is scheduled for Friday, 17th October 2025 at the Assembly Hall, NSUK. Red Carpet starts at 5:00 PM and the Main Event begins at 6:00 PM. Features include Music Performances, Awards, Dance, Comedy, Tech Talks & more! Payment Deadline is Tuesday, 14th October 2025. For Enquiries & Payments contact: 07061683126 or 08179637612.',
                'keywords' => 'Final Syntax, Dinner & Awards Night, Class of 2025, October 17 2025, Assembly Hall, Red Carpet, Main Event, Music Performances, Awards, Dance, Comedy, Tech Talks, Payment Deadline, October 14 2025, contact',
                'category' => 'Events',
                'is_active' => true
            ],
            [
                'question' => 'What is the payment deadline for the Final Syntax Dinner?',
                'answer' => 'The payment deadline for The Final Syntax Dinner & Awards Night is Tuesday, 14th October 2025. For Enquiries & Payments contact: 07061683126 or 08179637612.',
                'keywords' => 'payment deadline, Final Syntax, Dinner, Awards Night, October 14 2025, contact',
                'category' => 'Events',
                'is_active' => true
            ],

            // Academic Events - Project Submission
            [
                'question' => 'When is the submission deadline for Project Chapters 1-5 for External Examination?',
                'answer' => 'The submission of Project Chapters 1–5 for the External Examination is scheduled for Thursday, 7th November, 2025. Students who are yet to pick up their projects from the various venues are advised to do so immediately and ensure that all corrections and recommendations made by the panel members are properly implemented. In addition, those who are yet to collect their posters and project copies currently kept in my office are kindly requested to come over as soon as possible to pick them up.',
                'keywords' => 'Project Chapters 1-5, External Examination, submission deadline, November 7 2025, final year students, project corrections, posters, project copies',
                'category' => 'Academic Events',
                'is_active' => true
            ],

            // Security and Contacts
            [
                'question' => 'What is the official security unit of NSUK?',
                'answer' => 'The official security personnel are referred to as the NSUK Security Unit. The \'Lion Guard\' is not an official security unit of the university but an informal or colloquial name used by some students or student groups (likely a vigilante group) within the Nasarawa State University, Keffi (NSUK) community.',
                'keywords' => 'NSUK Security Unit, Lion Guard, official security, informal security, vigilante group',
                'category' => 'Administration',
                'is_active' => true
            ],
            [
                'question' => 'What is the contact for NSUK Security?',
                'answer' => 'The contact for NSUK Security is 0706 487 9465 or 0804 576 6474.',
                'keywords' => 'NSUK Security, contact, phone number, 07064879465, 08045766474',
                'category' => 'Administration',
                'is_active' => true
            ],
            [
                'question' => 'What is the contact for Angwan Lambu Police Station Outpost?',
                'answer' => 'The contact for Angwan Lambu Police Station Outpost is 0905 931 1018.',
                'keywords' => 'Angwan Lambu Police Station Outpost, contact, phone number, 09059311018',
                'category' => 'Emergency Contacts',
                'is_active' => true
            ],

            // CMP422 - Algorithm & Structured Programming
            [
                'question' => 'Who teaches CMP422 (Algorithm & Structured Programming)?',
                'answer' => 'CMP422 (Algorithm & Structured Programming) is taught by Dr. Yunana Kefas.',
                'keywords' => 'CMP422, Algorithm & Structured Programming, lecturer, Dr. Yunana Kefas',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Introduction to Algorithms in CMP422?',
                'answer' => 'By the end of the Introduction to Algorithms section in CMP422, students should be able to: Define an algorithm and explain its importance in computing; Identify the characteristics of a good algorithm; Write algorithms using pseudocode and represent them with flowcharts; Apply basic design methodologies like Divide & Conquer and Greedy; Understand why algorithm analysis is necessary and the basics of Big-O notation.',
                'keywords' => 'CMP422, Introduction to Algorithms, learning outcomes, define algorithm, characteristics, pseudocode, flowcharts, Divide & Conquer, Greedy, algorithm analysis, Big-O notation',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What is an algorithm and why is it important (CMP422)?',
                'answer' => 'An algorithm is a finite, well-defined sequence of steps or instructions designed to perform a specific task or solve a problem. It’s the \'recipe\' a computer follows to solve a problem. Its importance lies in forming the foundation of all computer programs, ensuring efficiency, improving accuracy, aiding optimization (saving time, memory, resources), and allowing language-independent solutions before coding.',
                'keywords' => 'CMP422, algorithm definition, importance of algorithms, recipe, efficiency, accuracy, optimization, language-independent',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the characteristics of a good algorithm (CMP422)?',
                'answer' => 'A well-designed algorithm should have: Finiteness (must end after a finite number of steps); Definiteness (each step must be clear and unambiguous); Input (zero or more inputs clearly specified); Output (at least one output produced); Effectiveness (steps simple enough to be carried out in a reasonable time); Generality (should work for a range of input values).',
                'keywords' => 'CMP422, characteristics of algorithm, good algorithm, finiteness, definiteness, input, output, effectiveness, generality',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'How are algorithms specified (CMP422)?',
                'answer' => 'Before writing code, algorithms should be specified clearly, language-independent, and easy to understand using Pseudocode (plain language mixed with programming constructs) and Flowcharts (visual representation using symbols and arrows).',
                'keywords' => 'CMP422, algorithm specification, pseudocode, flowcharts, language-independent',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the algorithm design methodologies taught in CMP422?',
                'answer' => 'CMP422 covers two main algorithm design methodologies: Divide and Conquer (breaking problems into smaller subproblems, solving, then combining results, e.g., Merge Sort, Quick Sort, Binary Search) and Greedy Method (building a solution step-by-step, choosing the best option at each stage without reconsidering past choices, e.g., Coin change, Minimum spanning tree, Huffman coding).',
                'keywords' => 'CMP422, algorithm design methodologies, Divide and Conquer, Greedy Method, Merge Sort, Quick Sort, Binary Search, Coin change, Minimum spanning tree, Huffman coding',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Why is algorithm analysis necessary (CMP422)?',
                'answer' => 'Algorithm analysis is necessary to compare performance of different algorithms, predict execution time and memory usage, choose the best approach for large-scale problems, and understand scalability. Key metrics include Time Complexity (Big-O notation) and Space Complexity.',
                'keywords' => 'CMP422, algorithm analysis, why analyze algorithms, time complexity, space complexity, Big-O notation, scalability',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Algorithm Analysis & Complexity in CMP422?',
                'answer' => 'By the end of the Algorithm Analysis & Complexity module in CMP422, students should be able to: Explain why algorithm analysis is essential; Distinguish between O, Ω, and Θ notations; Determine time and space complexity for simple algorithms; Differentiate between best, average, and worst case scenarios; Compare algorithms based on their growth rates.',
                'keywords' => 'CMP422, Algorithm Analysis & Complexity, learning outcomes, O notation, Omega notation, Theta notation, time complexity, space complexity, best case, average case, worst case, growth rates',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Asymptotic Notations (Big-O, Omega, Theta) in CMP422.',
                'answer' => 'Asymptotic notations describe how an algorithm’s resource requirements grow as input size increases. Big-O Notation (O) describes the worst-case (upper bound), Omega Notation (Ω) describes the best-case (lower bound), and Theta Notation (Θ) describes the tight bound when best and worst cases are the same order.',
                'keywords' => 'CMP422, Asymptotic Notations, Big-O, Omega, Theta, upper bound, lower bound, tight bound, worst case, best case, growth rate',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are Time and Space Complexity in CMP422?',
                'answer' => 'Time Complexity measures the number of operations an algorithm performs as input size nnn grows (e.g., O(1), O(log n), O(n), O(n log n), O(n²), O(2ⁿ), O(n!)). Space Complexity measures the amount of memory required, including fixed and variable parts.',
                'keywords' => 'CMP422, Time Complexity, Space Complexity, O(1), O(log n), O(n), O(n log n), O(n²), O(2ⁿ), O(n!), fixed part, variable part',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Describe Best, Average, and Worst-Case Analysis in CMP422.',
                'answer' => 'Algorithms behave differently depending on input. Best Case is the minimum time for optimal input (e.g., O(1) for linear search). Worst Case is the maximum time for the most difficult input (e.g., O(n) for linear search). Average Case is the expected time over all possible inputs (e.g., O(n) for linear search).',
                'keywords' => 'CMP422, Best Case, Average Case, Worst Case, algorithm analysis, linear search, binary search',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Introduction to Programming & Structured Programming in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Distinguish between various programming language classifications; Describe the steps of the program development cycle; Apply top-down design and modularity in program design; Understand Python’s role as a structured programming language.',
                'keywords' => 'CMP422, Introduction to Programming, Structured Programming, learning outcomes, language classifications, program development cycle, top-down design, modularity, Python',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'How are programming languages classified (CMP422)?',
                'answer' => 'Programming languages are classified by Level of Abstraction (Low-level like Assembly/Machine code, High-level like Python/Java/C++), Paradigm (Procedural, Object-Oriented, Functional, Logic-based), and Execution (Compiled, Interpreted, Hybrid).',
                'keywords' => 'CMP422, programming language classifications, low-level, high-level, procedural, object-oriented, functional, logic-based, compiled, interpreted, hybrid',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the steps in the Program Development Cycle (CMP422)?',
                'answer' => 'The Program Development Cycle includes: Problem Definition, Algorithm Design, Coding, Compilation/Interpretation, Testing and Debugging, Documentation, and Maintenance.',
                'keywords' => 'CMP422, Program Development Cycle, problem definition, algorithm design, coding, compilation, interpretation, testing, debugging, documentation, maintenance',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Top-Down Design, Modularity, and Structured Coding (CMP422).',
                'answer' => 'Top-Down Design breaks large problems into smaller sub-problems. Modularity divides programs into independent, reusable modules. Structured Coding follows clear control structures: Sequence, Selection (if-else), and Iteration (loops), avoiding `go to` statements.',
                'keywords' => 'CMP422, Top-Down Design, Modularity, Structured Coding, sequence, selection, iteration, if-else, loops',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Why is Python used for Structured Programming in CMP422?',
                'answer' => 'Python is a high-level, interpreted, general-purpose language known for simplicity and readability. It supports modular development (functions, modules, packages), enforces indentation for clarity, and has a large community and extensive documentation, making it suitable for structured programming.',
                'keywords' => 'CMP422, Python, structured programming, modular development, indentation, readability, interpreted, dynamic typing',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Core Programming Concepts in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Identify and use Python’s basic data types; Declare variables and apply arithmetic, logical, and bitwise operators; Perform user input and output operations; Implement basic error handling with try-except.',
                'keywords' => 'CMP422, Core Programming Concepts, learning outcomes, data types, variables, operators, input/output, error handling, try-except',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the basic data types in Python (CMP422)?',
                'answer' => 'Python\'s basic data types include: Integer (int) for whole numbers, Floating-Point (float) for numbers with decimals, String (str) for sequences of characters, and Boolean (bool) for True/False values.',
                'keywords' => 'CMP422, Python data types, integer, float, string, boolean, int, str, bool',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Variables and Operators in Python (CMP422).',
                'answer' => 'Variables are named storage for data in Python, created by assignment. Operators perform actions on values, including Arithmetic (+, -, *, /, //, %, **), Logical (and, or, not), and Bitwise (&, |) operators.',
                'keywords' => 'CMP422, Python variables, Python operators, arithmetic operators, logical operators, bitwise operators',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'How is Input/Output handled in Python (CMP422)?',
                'answer' => 'User input is obtained using `input()` (always returns a string), and results are displayed using `print()` (supports f-string formatting).',
                'keywords' => 'CMP422, Python input, Python output, input() function, print() function, f-string',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'How is Error Handling done in Python (CMP422)?',
                'answer' => 'Python uses `try-except` blocks to catch and handle runtime errors, preventing crashes and providing user-friendly messages. Specific exceptions like `ValueError` and `ZeroDivisionError` can be handled.',
                'keywords' => 'CMP422, Python error handling, try-except, ValueError, ZeroDivisionError, runtime errors',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Control Structures in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Write conditional logic using if, elif, and else; Use for and while loops effectively; Apply break and continue to control loop execution; Combine decision-making and loops to solve practical problems.',
                'keywords' => 'CMP422, Control Structures, learning outcomes, if-elif-else, for loop, while loop, break, continue, conditional logic',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Decision-Making (if-elif-else) in Python (CMP422).',
                'answer' => 'Decision-making in Python uses `if`, `elif`, and `else` statements to execute different code blocks based on conditions that evaluate to True or False. Indentation defines code blocks.',
                'keywords' => 'CMP422, Python decision-making, if statement, elif statement, else statement, conditional logic, indentation',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Loops (for, while, break, continue) in Python (CMP422).',
                'answer' => 'Python uses `for` loops for iterating over sequences and `while` loops for repeating code while a condition is True. `break` exits a loop immediately, and `continue` skips the current iteration.',
                'keywords' => 'CMP422, Python loops, for loop, while loop, break statement, continue statement, iteration',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Functions & Modular Programming in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Define and call functions effectively; Use different types of parameters; Understand return values and variable scope; Apply recursion to solve problems; Organize code into reusable, modular components.',
                'keywords' => 'CMP422, Functions, Modular Programming, learning outcomes, define functions, parameters, return values, variable scope, recursion, modular components',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Function Definition & Calling in Python (CMP422).',
                'answer' => 'Functions are defined using the `def` keyword, followed by the function name and parameters. They are called by their name followed by parentheses. Key benefits include reusability, organization, and maintainability.',
                'keywords' => 'CMP422, Python functions, def keyword, calling functions, reusability, organization, maintainability',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What types of parameters are used in Python functions (CMP422)?',
                'answer' => 'Python functions use Positional Parameters (matched by order), Keyword Parameters (assigned by name), Default Parameters (provide a default value), and Variable-length Parameters (`*args` for positional, `**kwargs` for keyword).',
                'keywords' => 'CMP422, Python function parameters, positional parameters, keyword parameters, default parameters, variable-length parameters, *args, **kwargs',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Return Values & Variable Scope in Python (CMP422).',
                'answer' => 'Functions return data using `return`. Variable scope defines accessibility: Local variables are defined inside a function and accessible only there; Global variables are defined outside all functions and accessible anywhere.',
                'keywords' => 'CMP422, Python return values, variable scope, local variables, global variables, return statement',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What is Recursion in Python (CMP422)?',
                'answer' => 'Recursion is when a function calls itself to solve smaller instances of a problem, requiring a Base Case to stop and a Recursive Case where the function calls itself. Without a base case, it leads to infinite loops.',
                'keywords' => 'CMP422, Python recursion, base case, recursive case, factorial, infinite loop',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Searching & Sorting Algorithms in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Implement and use common searching algorithms; Implement and compare multiple sorting algorithms; Understand and analyze time and space complexity; Choose the most suitable algorithm for a given problem.',
                'keywords' => 'CMP422, Searching Algorithms, Sorting Algorithms, learning outcomes, time complexity, space complexity, algorithm comparison',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Linear Search and Binary Search (CMP422).',
                'answer' => 'Linear Search checks each element sequentially (O(1) best, O(n) worst) and is best for small or unsorted data. Binary Search works on sorted lists by repeatedly halving the search range (O(log n)) and is best for large, sorted datasets.',
                'keywords' => 'CMP422, Linear Search, Binary Search, searching algorithms, sorted data, unsorted data, O(1), O(n), O(log n)',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Describe common Sorting Algorithms taught in CMP422.',
                'answer' => 'CMP422 covers: Bubble Sort (repeatedly swaps adjacent elements if in wrong order, O(n²)), Selection Sort (repeatedly finds smallest, swaps to front, O(n²)), Insertion Sort (builds sorted list one element at a time, O(n²) worst, O(n) best), Merge Sort (Divide and Conquer, O(n log n)), Quick Sort (Divide and Conquer, average O(n log n), worst O(n²)), and Heap Sort (builds a heap and repeatedly extracts largest, O(n log n)).',
                'keywords' => 'CMP422, Sorting Algorithms, Bubble Sort, Selection Sort, Insertion Sort, Merge Sort, Quick Sort, Heap Sort, O(n²), O(n log n), O(n)',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for Basic Data Structures in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Use Python’s built-in collections effectively (lists, tuples, sets, dictionaries); Implement stack and queue operations; Understand the basic idea of hashing and hash tables; Choose appropriate data structures for different problems.',
                'keywords' => 'CMP422, Basic Data Structures, learning outcomes, Python collections, lists, tuples, sets, dictionaries, stacks, queues, hash tables',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Python\'s built-in data structures: Lists, Tuples, Sets, Dictionaries (CMP422).',
                'answer' => 'Python\'s built-in data structures include: Lists (mutable, ordered, allows duplicates), Tuples (immutable, ordered, allows duplicates), Sets (mutable, but elements must be unique, unordered), and Dictionaries (key-value pairs for fast lookups, mutable and unordered).',
                'keywords' => 'CMP422, Python data structures, lists, tuples, sets, dictionaries, mutable, immutable, ordered, unordered, duplicates, unique, key-value pairs',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Explain Stacks and Queues (CMP422).',
                'answer' => 'Stacks are LIFO (Last In, First Out) data structures, where the last element added is the first removed. They are used in undo features, function calls, and expression evaluation. Queues are FIFO (First In, First Out) data structures, where the first element added is the first removed. They are used in scheduling, printing tasks, and message queues.',
                'keywords' => 'CMP422, Stacks, Queues, LIFO, FIFO, data structures, append, pop, popleft',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are Hash Tables (CMP422)?',
                'answer' => 'Hash Tables store data using a key that’s mapped to an index via a hash function. Python dictionaries use hash tables internally. Advantages include fast lookups (average O(1) time). Possible issues like hash collisions are handled using techniques like chaining or open addressing.',
                'keywords' => 'CMP422, Hash Tables, hashing, hash function, O(1) lookup, hash collisions, Python dictionaries',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the learning outcomes for File Handling and Algorithm Optimization in CMP422?',
                'answer' => 'By the end of this module in CMP422, students should be able to: Read and write data to text and CSV files; Handle file-related errors safely; Apply algorithm optimization techniques to improve performance.',
                'keywords' => 'CMP422, File Handling, Algorithm Optimization, learning outcomes, text files, CSV files, error handling, performance improvement',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'How is Reading/Writing Files (text, CSV) done in Python (CMP422)?',
                'answer' => 'Python uses its built-in `open()` function with modes like "r" (read), "w" (write, overwrites), "a" (append), "rb"/"wb" (binary mode) for text files. For CSV files, Python’s `csv` module is used.',
                'keywords' => 'CMP422, Python file handling, text files, CSV files, open() function, csv module, read, write, append',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are common Algorithm Optimization Techniques (CMP422)?',
                'answer' => 'Common optimization techniques include: Choosing Better Algorithms (e.g., binary search over linear search), Avoiding Repetition (memoization), Using Built-in Functions (Python’s built-ins are optimized in C), Reducing Memory Usage (using generators), and Early Exits (breaking loops early).',
                'keywords' => 'CMP422, Algorithm Optimization, optimization techniques, better algorithms, memoization, built-in functions, generators, early exits',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],

            // CMP421 - Artificial Intelligence
            [
                'question' => 'Who teaches CMP421 (Artificial Intelligence)?',
                'answer' => 'CMP421 (Artificial Intelligence) is taught by Prof Hajjah Rashidah.',
                'keywords' => 'CMP421, Artificial Intelligence, lecturer, Prof Hajjah Rashidah',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What is Artificial Intelligence (AI)?',
                'answer' => 'Artificial intelligence (AI) is the intelligence of a machine or computer that enables it to imitate or mimic human capabilities. AI uses multiple technologies that equip machines to sense, comprehend, plan, act, and learn with human-like levels of intelligence. Fundamentally, AI systems perceive environments, recognize objects, contribute to decision making, solve complex problems, learn from past experiences, and imitate patterns.',
                'keywords' => 'Artificial Intelligence, AI definition, machine intelligence, human capabilities, sense, comprehend, plan, act, learn, machine learning, natural language processing, computer vision',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are the components of AI?',
                'answer' => 'Research in AI has focused chiefly on the following components of intelligence: learning, reasoning, problem solving, perception, and using language.',
                'keywords' => 'AI components, learning, reasoning, problem solving, perception, language',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Learning in AI.',
                'answer' => 'Learning in AI includes trial and error (simple memorizing or rote learning) and generalization (applying past experience to analogous new situations, e.g., learning grammar rules).',
                'keywords' => 'AI learning, trial and error, rote learning, generalization, past experience',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Reasoning in AI.',
                'answer' => 'Reasoning in AI involves drawing inferences (deductive or inductive) appropriate to the situation. Deductive reasoning guarantees truth from premises, while inductive reasoning lends support without absolute assurance. The most significant challenge is drawing *relevant* inferences.',
                'keywords' => 'AI reasoning, inferences, deductive reasoning, inductive reasoning, problem solving',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Problem Solving in AI.',
                'answer' => 'Problem solving in AI is a systematic search through a range of possible actions to reach some predefined goal or solution. Methods include special-purpose (tailor-made for a particular problem) and general-purpose (applicable to a wide variety, e.g., means-end analysis with actions like PICKUP, MOVEFORWARD).',
                'keywords' => 'AI problem solving, systematic search, special-purpose methods, general-purpose methods, means-end analysis',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Perception in AI.',
                'answer' => 'Perception in AI involves scanning the environment by means of various sensory organs (real or artificial) and decomposing the scene into separate objects in various spatial relationships. It is sufficiently advanced to enable optical sensors to identify individuals and autonomous vehicles to drive.',
                'keywords' => 'AI perception, sensory organs, object recognition, autonomous vehicles, scene decomposition',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Language in AI.',
                'answer' => 'Language in AI refers to systems of signs having meaning by convention (e.g., human languages, traffic signs). Full-fledged human languages are productive, formulating an unlimited variety of sentences. Large language models like ChatGPT select probable words, mimicking human language command without genuine understanding.',
                'keywords' => 'AI language, system of signs, linguistic meaning, natural meaning, productivity, large language models, ChatGPT, human language',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are the types of Artificial Intelligence based on capabilities?',
                'answer' => 'AI is mainly categorized into Narrow AI (Weak AI), which performs specific tasks within limitations (e.g., Apple Siri, IBM Watson), and General AI, which could perform any intellectual task with efficiency like a human. Currently, there is no system that comes under General AI.',
                'keywords' => 'Types of AI, Narrow AI, Weak AI, General AI, specific tasks, human-like intelligence, Apple Siri, IBM Watson',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are Agents and Environment in AI?',
                'answer' => 'An agent is anything that can perceive its environment through sensors and acts upon that environment through effectors. An environment is everything in the world which surrounds the agent, but it is not a part of an agent itself, providing something to sense and act upon.',
                'keywords' => 'AI agents, AI environment, sensors, effectors, perceive, act, robotic agent, human agent, software agent',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are the different types of AI Agents?',
                'answer' => 'Types of AI agents include: Simple Reflex Agent (takes decisions based on current percepts), Model-based Reflex Agent (can work in partially observable environments, tracks situation), Goal-based Agents (needs to know its goal), Utility-based Agents (provides a measure of success at a given state, chooses best action), and Learning Agents (can learn from past experiences).',
                'keywords' => 'Types of AI agents, Simple Reflex agent, Model-based reflex agent, Goal-based agents, Utility-based agents, Learning agents, percepts, model, goal, utility measurement, learning capabilities',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are the features of an AI Environment?',
                'answer' => 'Environment features include: Fully observable vs Partially Observable, Static vs Dynamic, Discrete vs Continuous, Deterministic vs Stochastic, Single-agent vs Multi-agent, Episodic vs Sequential, Known vs Unknown, and Accessible vs Inaccessible.',
                'keywords' => 'AI environment features, fully observable, partially observable, static, dynamic, discrete, continuous, deterministic, stochastic, single-agent, multi-agent, episodic, sequential, known, unknown, accessible, inaccessible',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Fully observable vs Partially Observable environments in AI.',
                'answer' => 'If an agent\'s sensor can sense the complete state of an environment at each point in time, it is a Fully Observable environment (e.g., Chess). If it cannot see everything, it is Partially Observable (e.g., Self-driving car). An Unobservable environment means the agent has no sensors.',
                'keywords' => 'AI environment, fully observable, partially observable, unobservable, chess, self-driving car',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Deterministic vs Stochastic environments in AI.',
                'answer' => 'If an agent\'s current state and selected action can completely determine the next state, it is a Deterministic environment (e.g., Chess). A Stochastic environment is random and cannot be completely determined by an agent (e.g., Stock Market).',
                'keywords' => 'AI environment, deterministic, stochastic, chess, stock market, random',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Episodic vs Sequential environments in AI.',
                'answer' => 'In an Episodic environment, there is a series of one-shot actions, and only the current percept is required (e.g., Tic-Tac-Toe). In a Sequential environment, an agent requires memory of past actions to determine the next best actions (e.g., Chess).',
                'keywords' => 'AI environment, episodic, sequential, Tic-Tac-Toe, chess, past actions, memory',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Single-agent vs Multi-agent environments in AI.',
                'answer' => 'If only one agent is involved and operating by itself, it is a Single-agent environment (e.g., Solitaire). If multiple agents are operating and interacting, it is a Multi-agent environment (e.g., Soccer Match).',
                'keywords' => 'AI environment, single-agent, multi-agent, solitaire, soccer match, interaction',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Static vs Dynamic environments in AI.',
                'answer' => 'If the environment does not change while an agent is deliberating, it is a Static environment (e.g., Crossword Puzzle). If it can change itself while an agent is deliberating, it is a Dynamic environment, requiring continuous observation (e.g., Taxi Driving).',
                'keywords' => 'AI environment, static, dynamic, crossword puzzle, taxi driving, changing environment',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Discrete vs Continuous environments in AI.',
                'answer' => 'If there are a finite number of percepts and actions, it is a Discrete environment (e.g., Chess). If percepts and actions can exist along a continuous spectrum, it is a Continuous environment (e.g., Controlling a robotic arm).',
                'keywords' => 'AI environment, discrete, continuous, chess, robotic arm, finite, continuous spectrum',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Known vs Unknown environments in AI.',
                'answer' => 'Known vs Unknown refers to an agent\'s state of knowledge. In a Known environment, the results of all actions are known (e.g., Chess opening theory). In an Unknown environment, an agent needs to learn how it works (e.g., Rover exploring an alien planet).',
                'keywords' => 'AI environment, known, unknown, agent knowledge, chess opening theory, alien planet exploration',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Accessible vs Inaccessible environments in AI.',
                'answer' => 'If an agent can obtain complete and accurate information about the state, it is an Accessible environment (e.g., Room with accurate temperature sensors). If it cannot access fine-grained information, it is Inaccessible (e.g., Satellite monitoring Earth).',
                'keywords' => 'AI environment, accessible, inaccessible, complete information, accurate information, temperature sensors, satellite monitoring',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are the current trends and applications of AI?',
                'answer' => 'Current trends and applications of AI include: Expert Systems, Natural Language Processing (NLP), Neural Networks, Robotics, Fuzzy Logic Systems, and applications in Astronomy, Healthcare, Gaming, Finance, Data Security, Social Media, Travel & Transport, Automotive Industry, Agriculture, E-commerce, and Education.',
                'keywords' => 'AI trends, AI applications, Expert Systems, NLP, Neural Networks, Robotics, Fuzzy Logic, Astronomy, Healthcare, Gaming, Finance, Data Security, Social Media, Travel, Transport, Automotive, Agriculture, E-commerce, Education',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Natural Language Processing (NLP) in AI.',
                'answer' => 'NLP is an AI tool that allows computers to comprehend, recognize, interpret, and produce human language and speech. It involves analyzing how computers process language using computational linguistics, statistics, machine learning, and deep-learning models. Components include Natural Language Understanding (NLU) and Natural Language Generation (NLG).',
                'keywords' => 'AI NLP, Natural Language Processing, human language, speech, NLU, NLG, computational linguistics, machine learning, deep learning',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Robotics in AI.',
                'answer' => 'Robotics is a branch of AI combining Electrical Engineering, Mechanical Engineering, and Computer Science for designing, construction, and application of robots. Robots are artificial agents acting in the real world, aimed at manipulating objects and freeing manpower from repetitive tasks. They have mechanical construction, electrical components, and computer programs.',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Fuzzy Logic in AI.',
                'answer' => 'Fuzzy Logic (FL) is a method of reasoning that resembles human reasoning, imitating decision-making that involves intermediate possibilities between YES and NO (e.g., \'CERTAINLY YES\', \'POSSIBLY YES\'). It works on levels of possibilities to achieve definite output.',
                'keywords' => 'AI Fuzzy Logic, FL, human reasoning, decision-making, intermediate possibilities, YES, NO',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'Explain Neural Networks (ANNs) in AI.',
                'answer' => 'Neural Networks (ANNs) are a research area in AI inspired by the human nervous system. They are computing systems made of simple, highly interconnected processing elements that process information by their dynamic state response to external inputs, mimicking how human brain neurons connect and transmit impulses.',
                'keywords' => 'AI Neural Networks, ANNs, Artificial Neural Networks, human nervous system, neurons, processing elements, dynamic state response',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],
            [
                'question' => 'What are the challenges in AI?',
                'answer' => 'Challenges in AI include: Threat to Privacy (AI understanding conversations), Threat to Human Dignity (AI replacing humans in dignified roles), and Threat to Safety (self-improving AI becoming too mighty, leading to unintended consequences).',
                'keywords' => 'AI challenges, privacy threat, human dignity threat, safety threat, self-improving AI, unintended consequences',
                'category' => 'Artificial Intelligence',
                'is_active' => true
            ],

            // CMP425 - Modelling and Simulation
            [
                'question' => 'Who teaches CMP425 (Modelling and Simulation)?',
                'answer' => 'CMP425 (Modelling and Simulation) is taught by Dr. Gilbert.',
                'keywords' => 'CMP425, Modelling and Simulation, lecturer, Dr. Gilbert',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What are the definitions of Modelling, Model, and Simulation (CMP425)?',
                'answer' => 'Modelling is the process of generating abstract, conceptual, graphical, and/or mathematical models to understand system behavior. A Model is a pattern, plan, representation, or description designed to show the main object or workings of an object, system, or concept. Simulation is the manipulation of a model in such a way that it operates on time or space to compress it, thus enabling one to perceive the interactions that would not otherwise be apparent.',
                'keywords' => 'CMP425, Modelling definition, Model definition, Simulation definition, abstract models, conceptual models, mathematical models, representation, manipulation',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What is Modelling and Simulation as a discipline (CMP425)?',
                'answer' => 'Modelling and Simulation (M&S) is a discipline for developing a level of understanding of the interaction of the parts of a system, and of the system as a whole. The level of understanding which may be developed via this discipline is seldom achievable via any other discipline. It is also very much an art form, where skill and talent are developed through active engagement in building models and simulating them.',
                'keywords' => 'CMP425, Modelling and Simulation discipline, system understanding, interaction, art form, skill development',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What are the types of Models in CMP425?',
                'answer' => 'CMP425 discusses several types of models: Physical (iconic, e.g., model cars), Mathematical (abstract, predictive, e.g., equations), Analogue (other entities represent real-world, e.g., electrical currents), Simulation (emulate behavior using random numbers), Heuristic (intuitive rules, e.g., communications satellite forerunner), Deterministic (contain certain known and fixed constants), and Stochastic (involve one or more uncertain variables, subject to probabilities).',
                'keywords' => 'CMP425, types of models, Physical Models, Mathematical Models, Analogue Models, Simulation Models, Heuristic Models, Deterministic Models, Stochastic Models, iconic, predictive, emulate, intuitive rules, fixed constants, uncertain variables',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What are the advantages of using Models (CMP425)?',
                'answer' => 'Advantages of using models include: they are safer, less expensive (e.g., Practical Simulators are used to train pilots), and easier to control than their real-world counterparts.',
                'keywords' => 'CMP425, advantages of models, safer, less expensive, easier to control, pilot simulators',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What is the Modelling Procedure (CMP425)?',
                'answer' => 'The modelling procedure involves: 1. Examine the real-world situation. 2. Extract essential features. 3. Construct a model. 4. Solve and experiment with the model. 5. Draw conclusions. 6. If further refinement is necessary, re-examine and readjust parameters, otherwise proceed with implementation. This is an iterative process.',
                'keywords' => 'CMP425, modelling procedure, real-world situation, essential features, construct model, experiment, conclusions, refine, implement, iterative process',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What is a Random Number (CMP425)?',
                'answer' => 'Random numbers are numbers that show no consistent pattern, with each number in a series neither affected in any way by the preceding number, nor predictable from it. They appear randomly distributed as though generated by throwing a die or spinning a wheel.',
                'keywords' => 'CMP425, random number definition, no consistent pattern, unpredictable, uniformly distributed',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'Explain Pseudorandom Number Generation (CMP425).',
                'answer' => 'Pseudorandom Number Generation involves mathematical processes for generating digits that yield sequences satisfying many of the statistical properties of a truly random process, but are deterministic. Examples include the congruential generator method (multiplying a seed by a constant and taking digits) or using computer system clocks/keystroke intervals for seeds.',
                'keywords' => 'CMP425, pseudorandom number generation, deterministic, congruential generator, seed, statistical properties, system clock, keystroke intervals',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'How do computers generate random numbers (CMP425)?',
                'answer' => 'Computers generate random numbers using pseudorandom number generators, which are mathematical processes that yield sequences satisfying statistical properties of truly random processes. These can be built-in functions (like BASIC\'s RND) or custom-written generators. True random number generators extract random numbers from physical phenomena.',
                'keywords' => 'CMP425, computer random numbers, pseudorandom number generator, RND function, BASIC, true random number generators, physical phenomena',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What are the properties of a Good Random Number Generator (CMP425)?',
                'answer' => 'A good random number generator should: have as nearly as possible a uniform distribution, be fast, not require large amounts of memory, have a long period, not degenerate, and be able to generate a different set of random numbers or a series of numbers.',
                'keywords' => 'CMP425, good random number generator, properties, uniform distribution, fast, low memory, long period, non-degenerate, different sequences',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'Explain the Congruential Method for generating random numbers (CMP425).',
                'answer' => 'The Congruential Method is widely used and based on modulus arithmetic, using the formula Xn+1 = (aXn + c)(modulo m), where X0 is the seed, and a, c, m are carefully chosen positive integer constants. If c is zero, it\'s the Multiplicative Congruential Method; if c is not zero, it\'s the Mixed Congruential Method.',
                'keywords' => 'CMP425, Congruential Method, modulus arithmetic, Xn+1 = (aXn + c)(modulo m), seed, Multiplicative Congruential Method, Mixed Congruential Method',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],
            [
                'question' => 'What are other methods of generating random numbers (CMP425)?',
                'answer' => 'Other methods include: Quadratic Congruential Method (Xn=1 = (dX² + cX + a) modulo mn), Mid-square method (squaring seed, taking middle digits), Mid-product method (multiplying by constant, taking middle digits), and Fibonacci method (Xn+1 = (Xn + Xn-1) modulo m). The last three are generally less satisfactory due to degeneration or poor randomness.',
                'keywords' => 'CMP425, other random number generation methods, Quadratic Congruential Method, Mid-square method, Mid-product method, Fibonacci method, degeneration, randomness tests',
                'category' => 'Modelling and Simulation',
                'is_active' => true
            ],

            // CMP426 - Distributed Computing System
            [
                'question' => 'Who teaches CMP426 (Distributed Computing System)?',
                'answer' => 'CMP426 (Distributed Computing System) is taught by Dr. M. Olalere.',
                'keywords' => 'CMP426, Distributed Computing System, lecturer, Dr. M. Olalere',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What is Distributed Computing?',
                'answer' => 'Distributed Computing refers to a model in which components of a software system are shared among multiple computers to improve efficiency and performance. Different parts of a task are processed simultaneously on multiple computers that are part of a network, and the results are then combined to achieve a common goal.',
                'keywords' => 'Distributed Computing, definition, multiple computers, network, efficiency, performance, concurrent processing',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are the characteristics of Distributed Computing?',
                'answer' => 'Characteristics of Distributed Computing include: Multiple Machines (multiple autonomous computers), Resource Sharing (sharing hardware, software, or data), Concurrent Processing (tasks executed simultaneously on different nodes), Scalability (systems can be scaled horizontally), and Fault Tolerance (systems continue operating even if some components fail).',
                'keywords' => 'Distributed Computing characteristics, multiple machines, resource sharing, concurrent processing, scalability, fault tolerance',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are examples of Distributed Systems?',
                'answer' => 'Examples of Distributed Systems include: Google Search Engine, Amazon Web Services (AWS), Blockchain Networks (e.g., Bitcoin), and Content Delivery Networks (CDNs).',
                'keywords' => 'Distributed Systems examples, Google Search Engine, AWS, Amazon Web Services, Blockchain, Bitcoin, CDNs, Content Delivery Networks',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is the historical context and evolution of Distributed Computing?',
                'answer' => 'Initially, computing was performed on large, centralized mainframe computers. The advent of personal computers (PCs) in the 1980s allowed for decentralized computing and networking. The rise of the internet in the 1990s and early 2000s facilitated the growth of distributed systems, and today it\'s central to cloud computing, big data analytics, IoT, and blockchain.',
                'keywords' => 'Distributed Computing history, evolution, centralized computing, mainframes, personal computers, PCs, internet, cloud computing, big data, IoT, blockchain',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are the key concepts in Distributed Computing?',
                'answer' => 'Key concepts in Distributed Computing include: Concurrency (processing multiple tasks simultaneously), Latency (time delay in data transmission), Fault Tolerance (system continues functioning despite failures), Scalability (handling increasing work by adding resources), and Consistency (all nodes see the same data at the same time).',
                'keywords' => 'Distributed Computing concepts, concurrency, latency, fault tolerance, scalability, consistency, shared resources, data transmission',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are the challenges in Distributed Computing?',
                'answer' => 'Challenges in Distributed Computing include: Concurrency Control (managing shared resources), Data Replication and Consistency (ensuring consistent replicated data), Fault Tolerance (designing systems that can handle failures), Security (vulnerabilities to threats), Synchronization (coordinating actions across nodes), and Network Communication (reliability issues).',
                'keywords' => 'Distributed Computing challenges, concurrency control, data replication, consistency, fault tolerance, security, synchronization, network communication',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are Common Distributed System Architectures (CMP426)?',
                'answer' => 'Common Distributed System Architectures include: Client-Server, Peer-to-Peer (P2P), Multi-Tier, Microservices, and Middleware-Based Architecture.',
                'keywords' => 'CMP426, Distributed System Architectures, Client-Server, Peer-to-Peer, P2P, Multi-Tier, Microservices, Middleware-Based',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Client-Server Architecture (CMP426).',
                'answer' => 'Client-Server architecture is a model where multiple clients request and receive services from a centralized server. It features centralized control, client requests, and can face scalability issues as the number of clients increases. Examples include web applications and database systems.',
                'keywords' => 'CMP426, Client-Server Architecture, centralized control, client requests, server, web applications, database systems',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Peer-to-Peer (P2P) Architecture (CMP426).',
                'answer' => 'In Peer-to-Peer (P2P) architecture, each node in the network acts as both a client and a server, communicating directly without relying on a central server. It features decentralized control, high scalability, and fault tolerance. Examples include file sharing networks (BitTorrent) and Blockchain.',
                'keywords' => 'CMP426, Peer-to-Peer Architecture, P2P, decentralized control, scalability, fault tolerance, file sharing, BitTorrent, Blockchain',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Multi-Tier Architecture (CMP426).',
                'answer' => 'Multi-Tier architecture divides the system into layers or tiers (e.g., presentation, logic, data tiers), each responsible for a specific function. It promotes separation of concerns and independent scalability. Examples include web applications and enterprise applications.',
                'keywords' => 'CMP426, Multi-Tier Architecture, N-Tier, presentation tier, logic tier, data tier, separation of concerns, scalability, web applications, enterprise applications',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Microservices Architecture (CMP426).',
                'answer' => 'Microservices architecture breaks down a system into small, independent services that communicate with each other over a network, each focused on a specific business function. It promotes independence, modularity, and independent scalability. Examples include e-commerce systems and streaming services.',
                'keywords' => 'CMP426, Microservices Architecture, independent services, modularity, scalability, API Gateway, Service Registry, e-commerce, streaming services',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Middleware-Based Architecture (CMP426).',
                'answer' => 'Middleware-Based architecture involves using middleware as an intermediary layer between client and server, facilitating communication and hiding network complexities. It provides abstraction, interoperability, and standardization. Examples include Message-Oriented Middleware (MOM) like RabbitMQ and application servers.',
                'keywords' => 'CMP426, Middleware-Based Architecture, middleware, intermediary layer, abstraction, interoperability, standardization, Message-Oriented Middleware, MOM, RabbitMQ',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is Inter-Process Communication (IPC) in Distributed Systems (CMP426)?',
                'answer' => 'Inter-Process Communication (IPC) refers to a set of methods and protocols that enable processes to exchange data and coordinate actions across a network in a distributed system. It ensures efficient data exchange and synchronization, supporting scalable, reliable, and fault-tolerant applications. Types include Sockets, RPC, Message-Oriented Communication, and Serialization/Deserialization.',
                'keywords' => 'CMP426, Inter-Process Communication, IPC, data exchange, coordinate actions, sockets, RPC, Message-Oriented Communication, Serialization, Deserialization',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Sockets in Distributed Systems (CMP426).',
                'answer' => 'Sockets are endpoints for communication between two machines, providing a low-level mechanism for data exchange. They can operate over TCP (reliable, connection-oriented) or UDP (connectionless, fast). They provide direct, point-to-point communication but require explicit management.',
                'keywords' => 'CMP426, Sockets, TCP, UDP, stream sockets, datagram sockets, client socket, server socket, direct communication',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Remote Procedure Calls (RPC) in Distributed Systems (CMP426).',
                'answer' => 'Remote Procedure Call (RPC) is a protocol that allows a program to execute a procedure (function) on a remote machine as if it were a local procedure call. It uses client stubs (marshals parameters) and server stubs (unmarshals, invokes procedure) over a transport protocol like TCP/IP. It simplifies distributed programming but adds overhead.',
                'keywords' => 'CMP426, Remote Procedure Calls, RPC, client stub, server stub, marshalling, unmarshalling, TCP/IP, distributed programming',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Message-Oriented Communication (Queues, Pub/Sub) in Distributed Systems (CMP426).',
                'answer' => 'Message-Oriented Communication involves exchanging discrete messages, decoupling sender and receiver for asynchronous communication. Message Queues store messages until processed (e.g., RabbitMQ, Apache Kafka). Publish/Subscribe (Pub/Sub) sends messages to a topic for multiple subscribers (e.g., Google Cloud Pub/Sub, Apache Kafka).',
                'keywords' => 'CMP426, Message-Oriented Communication, Message Queues, Publish/Subscribe, Pub/Sub, asynchronous communication, decoupling, RabbitMQ, Apache Kafka, Google Cloud Pub/Sub',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Serialization and Deserialization in Distributed Systems (CMP426).',
                'answer' => 'Serialization is the process of converting an object or data structure into a format that can be easily stored or transmitted over a network. Deserialization is the process of converting serialized data back into its original format. Common formats include JSON, XML, and Protocol Buffers (Protobuf). It enables interoperability and efficiency but adds overhead and security risks.',
                'keywords' => 'CMP426, Serialization, Deserialization, JSON, XML, Protocol Buffers, Protobuf, data format, storage, transmission, interoperability, efficiency',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is Distributed Synchronization (CMP426)?',
                'answer' => 'Distributed Synchronization refers to the techniques and mechanisms used to coordinate processes running on different machines in a distributed system. It ensures consistent ordering of events, data consistency, mutual exclusion, and coordination among distributed processes, despite the absence of a global clock.',
                'keywords' => 'CMP426, Distributed Synchronization, coordinate processes, event ordering, data consistency, mutual exclusion, global clock',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Time and Global States in Distributed Systems (CMP426).',
                'answer' => 'In a distributed system, there is no global clock; each node has its own local clock. The Global State of a distributed system is a collection of local states of all processes and the state of communication channels. Challenges include achieving consistent time and event ordering due to network latency and clock drift.',
                'keywords' => 'CMP426, Time in Distributed Systems, Global State, local clock, consistent time, event ordering, causal relationships, clock drift',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Logical Clocks (Lamport, Vector) in Distributed Systems (CMP426).',
                'answer' => 'Logical Clocks provide event ordering. Lamport Clocks assign a number (timestamp) to each event for partial ordering (if event a happens before event b, then L(a) < L(b)). Vector Clocks use a vector of counters for more accurate causal ordering (if V(a) < V(b), then event a causally happened before event b).',
                'keywords' => 'CMP426, Logical Clocks, Lamport Clocks, Vector Clocks, event ordering, partial ordering, causal ordering, timestamps, counters',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Mutual Exclusion Algorithms (Ricart-Agrawala, Lamport\'s) in Distributed Systems (CMP426).',
                'answer' => 'Mutual Exclusion Algorithms ensure only one process enters a critical section. Ricart-Agrawala Algorithm uses a fully connected network and timestamped request-reply messages (O(N) messages). Lamport\'s Mutual Exclusion Algorithm uses Lamport\'s logical clocks, timestamped requests, and queues, ensuring fair ordering.',
                'keywords' => 'CMP426, Mutual Exclusion Algorithms, Ricart-Agrawala Algorithm, Lamport\'s Mutual Exclusion Algorithm, critical section, timestamped requests, queues',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Election Algorithms (Bully, Ring) in Distributed Systems (CMP426).',
                'answer' => 'Election Algorithms choose a leader among distributed processes. The Bully Algorithm selects the process with the highest ID by sending election messages to higher ID processes. The Ring Algorithm uses a logical ring structure, circulating an election message around the ring to determine the leader.',
                'keywords' => 'CMP426, Election Algorithms, Bully Algorithm, Ring Algorithm, leader election, highest ID, logical ring',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is Distributed Consensus (CMP426)?',
                'answer' => 'Distributed Consensus refers to the process of reaching an agreement among a group of distributed processes or systems on a single data value or a course of action, despite the presence of failures or delays. It ensures consistency, fault tolerance, and coordination, handling challenges like network failures and node failures.',
                'keywords' => 'CMP426, Distributed Consensus, agreement, single data value, failures, delays, consistency, fault tolerance, coordination',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain the Consensus Problem and its importance (CMP426).',
                'answer' => 'The Consensus Problem ensures that all non-faulty processes in a distributed system agree on a single value or decision, which is challenging with node failures, malicious behavior, or message issues. Key requirements are Agreement, Validity, and Termination. It\'s crucial for consistency, fault tolerance, and coordination in distributed systems.',
                'keywords' => 'CMP426, Consensus Problem, agreement, validity, termination, non-faulty processes, consistency, fault tolerance, coordination',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Paxos Algorithm (CMP426).',
                'answer' => 'Paxos is a family of consensus algorithms designed to achieve agreement among a group of nodes in the presence of failures, involving Proposers (propose values), Acceptors (accept/reject), and Learners (learn outcome). It has Prepare, Accept, and Learn phases, ensuring safety and liveness but is complex to implement.',
                'keywords' => 'CMP426, Paxos Algorithm, consensus algorithm, Proposers, Acceptors, Learners, Prepare Phase, Accept Phase, Learn Phase, safety, liveness',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Raft Algorithm (CMP426).',
                'answer' => 'Raft is an alternative consensus algorithm to Paxos, designed to be easier to understand and implement while providing the same safety and liveness guarantees, primarily used for managing replicated logs. It involves Leader Election (followers, candidates, leader) and Log Replication (leader appends, sends to followers), ensuring safety and commitment.',
                'keywords' => 'CMP426, Raft Algorithm, consensus algorithm, replicated logs, Leader Election, Log Replication, safety, commitment, followers, candidates, leader',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Byzantine Fault Tolerance (BFT) and PBFT (CMP426).',
                'answer' => 'Byzantine Fault Tolerance (BFT) is a consensus mechanism designed to handle Byzantine faults (where nodes may fail or behave maliciously). The Byzantine Generals Problem describes this. PBFT (Practical Byzantine Fault Tolerance) is a widely used BFT algorithm with Request, Pre-Prepare, Prepare, Commit, and Execution phases, tolerating up to (n-1)/3 faulty nodes, ensuring safety and liveness.',
                'keywords' => 'CMP426, Byzantine Fault Tolerance, BFT, Byzantine faults, malicious nodes, Byzantine Generals Problem, PBFT, Practical Byzantine Fault Tolerance, safety, liveness',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is Distributed File Systems and Storage (CMP426)?',
                'answer' => 'Distributed File Systems (DFS) allow files to be stored and accessed across multiple servers or locations as if they are on a single local disk. Distributed Storage Systems encompass both file systems and databases that manage and store data across multiple nodes to provide high availability, scalability, and fault tolerance.',
                'keywords' => 'CMP426, Distributed File Systems, DFS, Distributed Storage Systems, multiple servers, local disk, high availability, scalability, fault tolerance',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Google File System (GFS) (CMP426).',
                'answer' => 'Google File System (GFS) was developed by Google to handle large-scale data storage across commodity hardware, designed to support large, distributed applications. It features scalability, fault tolerance (data replication), and high throughput for reading and writing large files sequentially. Its architecture includes a Master Server, Chunk Servers, and Clients.',
                'keywords' => 'CMP426, Google File System, GFS, large-scale data, commodity hardware, scalability, fault tolerance, high throughput, Master Server, Chunk Servers, Clients',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Hadoop Distributed File System (HDFS) (CMP426).',
                'answer' => 'Hadoop Distributed File System (HDFS) is a core component of the Apache Hadoop ecosystem designed to store large data sets across clusters of commodity hardware, providing high throughput access for big data analytics. It features scalability, fault tolerance (data replication), and is optimized for batch processing. Its architecture includes a NameNode, DataNodes, and Clients.',
                'keywords' => 'CMP426, Hadoop Distributed File System, HDFS, Apache Hadoop, large datasets, commodity hardware, high throughput, big data analytics, NameNode, DataNodes, Clients',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Data Replication and Consistency in Distributed Systems (CMP426).',
                'answer' => 'Data Replication is the process of storing copies of data on multiple nodes or locations to ensure reliability, availability, and fault tolerance. Strategies include Synchronous Replication (strong consistency, high latency) and Asynchronous Replication (better performance, eventual consistency). Consistency models include Strong, Eventual, and Causal Consistency. Challenges involve network partitions, latency, and CAP theorem trade-offs.',
                'keywords' => 'CMP426, Data Replication, Consistency, Synchronous Replication, Asynchronous Replication, Strong Consistency, Eventual Consistency, Causal Consistency, CAP theorem, network partitions',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Cassandra (Distributed Database) (CMP426).',
                'answer' => 'Apache Cassandra is a distributed NoSQL database designed to handle large amounts of data across many commodity servers, using a peer-to-peer architecture to provide high availability with no single point of failure. It features linear scalability, a flexible data model (wide-column), and tunable consistency (allowing choice between strong and eventual consistency).',
                'keywords' => 'CMP426, Cassandra, Apache Cassandra, NoSQL database, large data, commodity servers, peer-to-peer, high availability, scalability, flexible data model, tunable consistency',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain MongoDB (Distributed Database) (CMP426).',
                'answer' => 'MongoDB is a popular document-based NoSQL database that provides high performance, high availability, and scalability, designed to store semi-structured data in JSON-like format (BSON). It features a flexible schema, horizontal scalability (sharding), and replica sets for automatic failover and data redundancy. It uses eventual consistency, tunable for strong consistency.',
                'keywords' => 'CMP426, MongoDB, NoSQL database, document-based, BSON, flexible schema, horizontal scalability, sharding, replica sets, failover, eventual consistency',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is Fault Tolerance in Distributed Systems (CMP426)?',
                'answer' => 'Fault Tolerance refers to the ability of a distributed system to continue functioning correctly even in the presence of faults (failures of some of its components). It is essential for achieving high availability, reliability, and resilience in distributed environments, especially where downtime or data loss can have significant consequences.',
                'keywords' => 'CMP426, Fault Tolerance, definition, component failures, high availability, reliability, resilience, downtime, data loss',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are Fault Models and Types in Distributed Systems (CMP426)?',
                'answer' => 'A fault model categorizes the types of faults that can occur in a system. Common types include: Crash Faults (node stops functioning), Omission Faults (node fails to send or receive messages), Timing Faults (component responds late), Byzantine Faults (node behaves arbitrarily or maliciously), and Network Partitions (network split into unreachable segments).',
                'keywords' => 'CMP426, Fault Models, Fault Types, Crash Faults, Omission Faults, Timing Faults, Byzantine Faults, Network Partitions, node failure, message loss, malicious behavior',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Redundancy and Replication Strategies in Distributed Systems (CMP426).',
                'answer' => 'Redundancy is the inclusion of extra components for backup. Replication is storing copies of data or services across multiple nodes for availability and fault tolerance. Strategies include Data Replication (Synchronous/Asynchronous), Service Redundancy (Active-Active/Active-Passive), and Erasure Coding (data split, encoded for recovery).',
                'keywords' => 'CMP426, Redundancy, Replication Strategies, Data Replication, Service Redundancy, Erasure Coding, Synchronous Replication, Asynchronous Replication, Active-Active, Active-Passive',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Checkpointing and Rollback Recovery in Distributed Systems (CMP426).',
                'answer' => 'Checkpointing is a technique where the state of a system is periodically saved to stable storage, creating "checkpoints," allowing restart from a checkpoint after failure. Types include Coordinated, Uncoordinated, and Incremental. Rollback Recovery restores the system to a consistent state using checkpoints and logs (Backward or Forward Recovery).',
                'keywords' => 'CMP426, Checkpointing, Rollback Recovery, system state, stable storage, checkpoints, Coordinated Checkpointing, Uncoordinated Checkpointing, Incremental Checkpointing, Backward Recovery, Forward Recovery',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Leader Election in Distributed Systems (CMP426).',
                'answer' => 'Leader Election is a process in distributed systems where nodes or processes decide on a unique leader to coordinate actions or manage resources. Algorithms include the Bully Algorithm (selects highest ID), Ring Algorithm (circulates election message in a logical ring), and Paxos Leader Election (part of Paxos consensus).',
                'keywords' => 'CMP426, Leader Election, Bully Algorithm, Ring Algorithm, Paxos Leader Election, coordinator, highest ID, logical ring',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are Distributed Algorithms (CMP426)?',
                'answer' => 'Distributed Algorithms are algorithms designed to run on a network of interconnected nodes, where each node has its own local memory and processes information independently. They leverage communication and coordination among nodes to solve complex problems in a distributed manner, essential for efficient computation in clusters, grids, and cloud environments.',
                'keywords' => 'CMP426, Distributed Algorithms, definition, interconnected nodes, network, communication, coordination, complex problems, efficient computation',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Distributed Graph Algorithms (CMP426).',
                'answer' => 'Distributed Graph Algorithms are used to solve problems related to graphs (nodes and edges) across multiple nodes, where each node may only have a partial view of the entire graph. Common algorithms include Shortest Path Algorithms (Dijkstra\'s, Bellman-Ford), Minimum Spanning Tree (MST) algorithms (Gallager-Humblet-Spira - GHS), and Graph Coloring (Distributed Greedy Algorithm).',
                'keywords' => 'CMP426, Distributed Graph Algorithms, shortest path, Minimum Spanning Tree, MST, graph coloring, Dijkstra\'s Algorithm, Bellman-Ford Algorithm, GHS Algorithm, Gallager-Humblet-Spira Algorithm',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Distributed Search Algorithms (CMP426).',
                'answer' => 'Distributed Search Algorithms are used to locate data or resources in a distributed environment efficiently. Common algorithms include Flooding Search (broadcasts query to all neighbors), Depth-First Search (DFS) (explores as far as possible along each branch), Breadth-First Search (BFS) (explores all neighbors of a node before moving to the next level), and Random Walk (forwards query to a randomly selected neighbor).',
                'keywords' => 'CMP426, Distributed Search Algorithms, locate data, Flooding Search, Depth-First Search, DFS, Breadth-First Search, BFS, Random Walk, peer-to-peer networks',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Distributed Sorting Algorithms (CMP426).',
                'answer' => 'Distributed Sorting Algorithms are designed to sort data that is spread across multiple nodes or machines, essential for large-scale data processing. Common algorithms include Distributed Merge Sort (each node sorts local data, then merges), Bitonic Sort (parallel comparisons and exchanges), and Quicksort-based Algorithms (selects pivot, partitions data, recursively sorts).',
                'keywords' => 'CMP426, Distributed Sorting Algorithms, large-scale data, Distributed Merge Sort, Bitonic Sort, Quicksort-based Algorithms, parallel sorting',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Load Balancing in Distributed Systems (CMP426).',
                'answer' => 'Load Balancing is the process of distributing workloads across multiple nodes or servers to optimize resource utilization, improve response times, and prevent any single node from being overwhelmed. Key techniques include Round-Robin, Randomized, Weighted Round-Robin, Dynamic Load Balancing, and Load Balancing Using Consistent Hashing.',
                'keywords' => 'CMP426, Load Balancing, workloads, resource utilization, response times, Round-Robin, Randomized, Weighted Round-Robin, Dynamic Load Balancing, Consistent Hashing',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What is Security in Distributed Systems (CMP426)?',
                'answer' => 'Security in Distributed Systems involves protecting data, applications, and infrastructure in a networked environment where multiple nodes communicate and share resources. It is crucial due to inherent vulnerabilities, ensuring integrity, confidentiality, and availability, and preventing disruptions caused by malicious activities.',
                'keywords' => 'CMP426, Security in Distributed Systems, data protection, applications, infrastructure, networked environment, vulnerabilities, integrity, confidentiality, availability',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'What are Security Challenges in Distributed Systems (CMP426)?',
                'answer' => 'Security challenges include: Multiple Points of Attack, Lack of Centralized Control, Data Exposure and Interception, Authentication and Trust Issues, Malicious Insider Threats, and Resource Exhaustion Attacks (e.g., Distributed Denial of Service - DDoS).',
                'keywords' => 'CMP426, Security Challenges, Multiple Points of Attack, Lack of Centralized Control, Data Exposure, Interception, Authentication Issues, Trust Issues, Malicious Insider Threats, Resource Exhaustion Attacks, DDoS',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Authentication and Authorization in Distributed Systems (CMP426).',
                'answer' => 'Authentication is the process of verifying the identity of a user, device, or node before granting access. Authorization determines the level of access or permissions an authenticated user or node has within the system. Techniques include Password-Based, PKI, MFA, OAuth (Authentication); and Role-Based (RBAC), Attribute-Based (ABAC), Capability-Based Security (Authorization).',
                'keywords' => 'CMP426, Authentication, Authorization, identity verification, access control, Password-Based, PKI, MFA, OAuth, RBAC, ABAC, Capability-Based Security',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Data Integrity and Confidentiality in Distributed Systems (CMP426).',
                'answer' => 'Data Integrity ensures that data is accurate, consistent, and has not been tampered with during transmission or storage. Data Confidentiality ensures that sensitive information is not disclosed to unauthorized entities. Techniques include Encryption (Symmetric/Asymmetric), Hash Functions, Digital Signatures, Secure Hash Algorithms (SHA), Data Masking, and Anonymization.',
                'keywords' => 'CMP426, Data Integrity, Data Confidentiality, accuracy, consistency, untampered, Encryption, Symmetric Encryption, Asymmetric Encryption, Hash Functions, Digital Signatures, SHA, Data Masking, Anonymization',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],
            [
                'question' => 'Explain Secure Communication Protocols in Distributed Systems (CMP426).',
                'answer' => 'Secure Communication Protocols are designed to protect data transmitted over a network by providing authentication, encryption, and data integrity mechanisms. Common protocols include Transport Layer Security (TLS) (e.g., HTTPS), Secure Shell (SSH), Internet Protocol Security (IPsec), Kerberos, and Pretty Good Privacy (PGP) / GNU Privacy Guard (GPG).',
                'keywords' => 'CMP426, Secure Communication Protocols, authentication, encryption, data integrity, TLS, HTTPS, SSH, IPsec, Kerberos, PGP, GPG',
                'category' => 'Distributed Systems',
                'is_active' => true
            ],

            // CMP424 - Cloud Computing
            [
                'question' => 'Who teaches CMP424 (Cloud Computing)?',
                'answer' => 'CMP424 (Cloud Computing) is taught by Dr. Kene.',
                'keywords' => 'CMP424, Cloud Computing, lecturer, Dr. Kene',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'What is Cloud Computing?',
                'answer' => 'Cloud Computing is a technology that allows users to access and store data, applications, and resources over the internet rather than on local servers or personal devices. It offers on-demand delivery of computing services, including servers, storage, databases, networking, software, and analytics.',
                'keywords' => 'Cloud Computing, definition, on-demand, internet, servers, storage, databases, networking, software, analytics',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Key Characteristics of Cloud Computing?',
                'answer' => 'Key Characteristics of Cloud Computing include: On-Demand Self-Service (users provision resources automatically), Broad Network Access (services available over the network), Resource Pooling (provider’s resources pooled for multiple users), Rapid Elasticity (resources scale up/down quickly), and Measured Service (usage monitored, controlled, reported).',
                'keywords' => 'Cloud Computing characteristics, On-Demand Self-Service, Broad Network Access, Resource Pooling, Rapid Elasticity, Measured Service, scalability, flexibility',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Cloud Service Models?',
                'answer' => 'Cloud Service Models include: Infrastructure as a Service (IaaS) (virtualized computing resources, e.g., VMs, storage), Platform as a Service (PaaS) (platform for developing/running apps, e.g., App Engine), Software as a Service (SaaS) (delivers software over internet, e.g., Office 365), and Serverless (users run code without managing servers).',
                'keywords' => 'Cloud Service Models, IaaS, PaaS, SaaS, Serverless, Infrastructure as a Service, Platform as a Service, Software as a Service, virtual machines, app development, software delivery',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Cloud Deployment Models?',
                'answer' => 'Cloud Deployment Models include: Public Cloud (services delivered over the public internet), Private Cloud (infrastructure operated solely for a single organization), Hybrid Cloud (combines public and private clouds), and Multi-Cloud (uses multiple cloud services from different providers).',
                'keywords' => 'Cloud Deployment Models, Public Cloud, Private Cloud, Hybrid Cloud, Multi-Cloud, public internet, single organization, combines clouds, multiple providers',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Benefits of Cloud Computing?',
                'answer' => 'Benefits of Cloud Computing include: Cost Efficiency (reduces capital expenditure), Scalability (easily scale resources), Flexibility (access wide range of services), Disaster Recovery (built-in backup/recovery), Global Reach (deploy apps closer to users), and Security (advanced features, compliance).',
                'keywords' => 'Cloud Computing benefits, Cost Efficiency, Scalability, Flexibility, Disaster Recovery, Global Reach, Security, reduced capital expenditure',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Challenges and Considerations in Cloud Computing?',
                'answer' => 'Challenges and Considerations in Cloud Computing include: Security and Privacy (data breaches, regulations like GDPR), Downtime (reliance on internet connectivity and provider uptime), Vendor Lock-in (difficulty migrating between cloud providers), and Cost Management (unexpected costs if resources are not monitored).',
                'keywords' => 'Cloud Computing challenges, Security and Privacy, Downtime, Vendor Lock-in, Cost Management, data breaches, GDPR, internet connectivity, provider uptime',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'Who are the Major Cloud Providers?',
                'answer' => 'Major Cloud Providers include: Amazon Web Services (AWS), Microsoft Azure, Google Cloud Platform (GCP), IBM Cloud, Oracle Cloud, and Alibaba Cloud.',
                'keywords' => 'Major Cloud Providers, AWS, Amazon Web Services, Microsoft Azure, Google Cloud Platform, GCP, IBM Cloud, Oracle Cloud, Alibaba Cloud',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Use Cases of Cloud Computing?',
                'answer' => 'Use Cases of Cloud Computing include: Data Storage and Backup, Big Data Analytics, Machine Learning and AI, Disaster Recovery, Web and Mobile Applications, and IoT (Internet of Things).',
                'keywords' => 'Cloud Computing use cases, Data Storage, Backup, Big Data Analytics, Machine Learning, AI, Disaster Recovery, Web Applications, Mobile Applications, IoT, Internet of Things',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'What are the Future Trends in Cloud Computing?',
                'answer' => 'Future Trends in Cloud Computing include: Edge Computing (processing data closer to where it is generated), Quantum Computing (leveraging quantum mechanics for faster processing), AI and Machine Learning Integration (enhanced automation and predictive analytics), and Sustainable Cloud (green data centers and energy-efficient infrastructure).',
                'keywords' => 'Cloud Computing future trends, Edge Computing, Quantum Computing, AI Integration, Machine Learning Integration, Sustainable Cloud, green data centers, energy-efficient infrastructure',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'Explain Virtualization and Containerization in Cloud Computing (CMP424).',
                'answer' => 'Virtualization creates a virtual version of a resource (e.g., servers, storage, networks) allowing multiple operating systems or applications to run simultaneously on a single physical machine (e.g., VMs with hypervisors). Containerization packages applications and their dependencies into lightweight, isolated containers sharing the host OS kernel (e.g., Docker, Kubernetes). Both enable efficient resource use and workload isolation.',
                'keywords' => 'CMP424, Virtualization, Containerization, virtual machines, VMs, hypervisors, Docker, Kubernetes, resource utilization, workload isolation, server virtualization, storage virtualization, network virtualization',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
            [
                'question' => 'Explain Distributed Computing Frameworks (MapReduce, Apache Spark) in Cloud Computing (CMP424).',
                'answer' => 'Distributed Computing Frameworks process large datasets across clusters. MapReduce is a programming model for processing and generating large data sets with a distributed algorithm on a cluster, dividing tasks into "map" and "reduce" phases. Apache Spark is an open-source distributed computing system using Resilient Distributed Datasets (RDDs) for in-memory computation, supporting multiple languages and libraries for SQL, machine learning (MLlib), graph processing (GraphX), and stream processing (Spark Streaming).',
                'keywords' => 'CMP424, Distributed Computing Frameworks, MapReduce, Apache Spark, large datasets, clusters, map phase, reduce phase, RDDs, Resilient Distributed Datasets, in-memory computation, SQL, MLlib, GraphX, Spark Streaming',
                'category' => 'Cloud Computing',
                'is_active' => true
            ],
        ];

        foreach ($knowledgeData as $data) {
            NsukKnowledge::updateOrCreate(
                ['question' => $data['question']], // Check if question exists
                $data // Update or create with this data
            );
        }
    }
}
