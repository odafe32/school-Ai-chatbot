<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NsukKnowledge;

class AdditionalNsukKnowledgeSeeder extends Seeder
{
    public function run()
    {
        $knowledgeData = [
            // Events and Important Dates
            [
                'question' => 'When is the dinner night coming up?',
                'answer' => 'The Final Syntax Dinner & Awards Night for Class of 2025 is scheduled for Friday, 17th October 2025 at the Assembly Hall, NSUK. Red Carpet starts at 5:00 PM and the Main Event begins at 6:00 PM. Features include Music Performances, Awards, Dance, Comedy, Tech Talks & more! Payment Deadline is Tuesday, 14th October 2025. For Enquiries & Payments contact: 07061683126 or 08179637612.',
                'keywords' => 'dinner night, Final Syntax, Class of 2025, October 17 2025, Assembly Hall, awards night, payment deadline',
                'category' => 'Events',
                'is_active' => true
            ],
            [
                'question' => 'When is dinner night?',
                'answer' => 'The Final Syntax Dinner & Awards Night for Class of 2025 is on Friday, 17th October 2025 at the Assembly Hall, NSUK. Red Carpet: 5:00 PM, Main Event: 6:00 PM. Payment deadline is Tuesday, 14th October 2025. Contact: 07061683126 or 08179637612.',
                'keywords' => 'dinner night, October 17, Class of 2025, Final Syntax, Assembly Hall',
                'category' => 'Events',
                'is_active' => true
            ],
            [
                'question' => 'What is the date for chapter 4-5 defense?',
                'answer' => 'Due to the lingering ASUU ultimatum for a warning strike which may commence on Tuesday, 14th October 2025, the project defense (Chapter 4-5) will take place on Monday, 13th October 2025 at 8:00 AM. The deadline for submission remains Friday, 10th October 2025. Failure to submit your project at the stipulated time means your details will not be captured for the defense. Contact: Bako Halilu Egga (Project Coordinator).',
                'keywords' => 'project defense, chapter 4-5, October 13 2025, ASUU strike, submission deadline, Bako Halilu Egga',
                'category' => 'Academic Events',
                'is_active' => true
            ],

            // Course Information - CMP422
            [
                'question' => 'Details on the course CMP422 (Algorithm & Structured Programming)?',
                'answer' => 'CMP422 - Algorithm & Structured Programming covers: 1) Introduction to Algorithms (definition, characteristics, pseudocode, flowcharts, design methodologies like Divide & Conquer and Greedy), 2) Algorithm Analysis & Complexity (Big-O, Omega, Theta notations, time & space complexity), 3) Programming & Structured Programming (language classifications, program development cycle, top-down design, Python overview), 4) Core Programming Concepts (data types, variables, operators, I/O, error handling), 5) Control Structures (if-elif-else, loops, break/continue), 6) Functions & Modular Programming (parameters, return values, scope, recursion), 7) Searching & Sorting Algorithms (Linear/Binary Search, Bubble/Selection/Insertion/Merge/Quick/Heap Sort), 8) Basic Data Structures (lists, tuples, sets, dictionaries, stacks, queues, hash tables), and 9) File Handling & Algorithm Optimization.',
                'keywords' => 'CMP422, Algorithm, Structured Programming, Python, data structures, sorting, searching, Big-O notation, recursion, file handling',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Details on CMP422?',
                'answer' => 'CMP422 (Algorithm & Structured Programming) teaches algorithms, complexity analysis, Python programming, control structures, functions, data structures (lists, stacks, queues), searching/sorting algorithms, and file handling. Key topics include Big-O notation, recursion, and algorithm optimization.',
                'keywords' => 'CMP422, algorithms, Python, data structures, Big-O, recursion',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],

            // Course Information - CMP421
            [
                'question' => 'Details on the course CMP421 (Artificial Intelligence)?',
                'answer' => 'CMP421 - Artificial Intelligence covers: What is AI (definition, components like learning, reasoning, problem solving, perception, language), Types of AI (Narrow AI vs General AI), Agents and Environment (agent types: Simple Reflex, Model-based, Goal-based, Utility-based, Learning Agents), Environment Features (fully/partially observable, deterministic/stochastic, episodic/sequential, single/multi-agent, static/dynamic, discrete/continuous), Current Trends in AI (Expert Systems, NLP, Neural Networks, Robotics, Fuzzy Logic), Applications of AI (Astronomy, Healthcare, Gaming, Finance, Data Security, Social Media, Travel, Automotive, Robotics, Entertainment, Agriculture, E-commerce, Education), Speech & Voice Recognition, Expert Systems, and Challenges in AI (privacy, human dignity, safety threats).',
                'keywords' => 'CMP421, Artificial Intelligence, AI agents, machine learning, NLP, neural networks, expert systems, robotics, fuzzy logic',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Details on CMP421?',
                'answer' => 'CMP421 (Artificial Intelligence) covers AI fundamentals, agent types, environment characteristics, machine learning, NLP, neural networks, robotics, expert systems, and AI applications across various industries including healthcare, finance, gaming, and education.',
                'keywords' => 'CMP421, AI, machine learning, agents, NLP, robotics',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],

            // Course Information - CMP425
            [
                'question' => 'Details on the course CMP425 (Modelling and Simulation)?',
                'answer' => 'CMP425 - Modelling and Simulation covers: Modelling and Simulation Concepts (definitions, what is M&S, discipline and art form), Types of Models (Physical/Iconic, Mathematical, Analogue, Simulation, Heuristic, Stochastic, Deterministic models), advantages of using models, simulation techniques, representing dynamic real-world systems, model development iterations, and computer-based simulation methods. The course emphasizes developing understanding of system interactions through abstract, conceptual, graphical and mathematical models.',
                'keywords' => 'CMP425, Modelling, Simulation, computer models, mathematical models, system analysis, dynamic systems, stochastic, deterministic',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Details on CMP425?',
                'answer' => 'CMP425 (Modelling and Simulation) teaches how to create and use models to understand system behavior. Topics include types of models (physical, mathematical, simulation), model development, simulation techniques, and computer-based modeling methods.',
                'keywords' => 'CMP425, modelling, simulation, systems, mathematical models',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],

            // General Computer Science Course Information
            [
                'question' => 'What computer science courses are available?',
                'answer' => 'NSUK offers various Computer Science courses including: CMP421 (Artificial Intelligence) - covers AI fundamentals, agents, machine learning, NLP, neural networks, and robotics. CMP422 (Algorithm & Structured Programming) - covers algorithms, data structures, Python programming, sorting/searching, and Big-O notation. CMP425 (Modelling and Simulation) - covers modeling concepts, types of models, and simulation techniques. For specific details on any course, please ask about the course code (e.g., "Details on CMP422").',
                'keywords' => 'computer science courses, CMP courses, CS courses, programming courses, AI courses, algorithm courses',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'Tell me about CMP courses',
                'answer' => 'CMP courses at NSUK include: CMP421 (Artificial Intelligence), CMP422 (Algorithm & Structured Programming), and CMP425 (Modelling and Simulation). These courses cover essential topics in computer science including AI, algorithms, data structures, programming, and modeling. Ask about specific course codes for detailed information.',
                'keywords' => 'CMP courses, computer science, programming, AI, algorithms',
                'category' => 'Computer Science Courses',
                'is_active' => true
            ],
            [
                'question' => 'How many courses do we have?',
                'answer' => 'NSUK offers courses across 11 Faculties and 60 Departments. For Computer Science specifically, we have documented courses including CMP421 (Artificial Intelligence), CMP422 (Algorithm & Structured Programming), and CMP425 (Modelling and Simulation). The university offers comprehensive programs from undergraduate to graduate levels across various disciplines.',
                'keywords' => 'how many courses, number of courses, total courses, course count',
                'category' => 'Academics',
                'is_active' => true
            ],
            [
                'question' => 'How many staff do we have?',
                'answer' => 'I don\'t have specific information about the exact number of staff at NSUK at the moment. For current staffing information, please contact the university administration directly.',
                'keywords' => 'how many staff, staff count, number of staff, employees, faculty count',
                'category' => 'Administration',
                'is_active' => true
            ]
        ];

        foreach ($knowledgeData as $data) {
            NsukKnowledge::updateOrCreate(
                ['question' => $data['question']], // Check if question exists
                $data // Update or create with this data
            );
        }
    }
}
