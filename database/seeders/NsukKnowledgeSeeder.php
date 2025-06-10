<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NsukKnowledge;

class NsukKnowledgeSeeder extends Seeder
{
    public function run()
    {
        $knowledgeData = [
            // University History and Establishment
            [
                'question' => 'When was NSUK established?',
                'answer' => 'Nasarawa State University, Keffi (NSUK) was established under Nasarawa State Law No. 2 of 2001. It was created during the administration of Governor (Dr.) Abdullahi Adamu, the first democratically elected governor of Nasarawa State. The university officially began academic activities in February 2002.',
                'keywords' => 'establishment, founded, history, 2001, 2002, Governor Abdullahi Adamu',
                'category' => 'History'
            ],
            [
                'question' => 'Where did NSUK start its academic activities?',
                'answer' => 'NSUK officially began academic activities in February 2002, initially situated at the former College of Arts, Science, and Technology (CAST) in Keffi.',
                'keywords' => 'CAST, College of Arts Science Technology, beginning, first location',
                'category' => 'History'
            ],

            // Current Leadership
            [
                'question' => 'Who is the current Vice-Chancellor of NSUK?',
                'answer' => 'Prof. Sa\'adatu Hassan Liman is the 6th and current Vice-Chancellor of Nasarawa State University, Keffi. She is a Professor of Islamic Studies who started working in NSUK in 2002. She is the first female Vice Chancellor of the university and was appointed as substantive Vice Chancellor in 2024. Previously, she served as Deputy Vice Chancellor Administration (DVC Admin).',
                'keywords' => 'Vice Chancellor, Prof Sa\'adatu Hassan Liman, female VC, Islamic Studies, 2024, DVC Admin',
                'category' => 'Leadership'
            ],
            [
                'question' => 'Tell me about Prof. Sa\'adatu Hassan Liman',
                'answer' => 'Prof. Sa\'adatu Hassan Liman is a Professor of Islamic Studies and the current Vice-Chancellor of NSUK. She is a member of many learned societies including Nigeria Association of Teachers of Arabic and Islamic Studies (NATAIS) and the American Academy of Religion (AAR). She has attended and presented papers in many National/International Conferences, including a presentation at the 60th Women Assembly of United Nations on the Status of Women in New York.',
                'keywords' => 'Prof Sa\'adatu Hassan Liman, NATAIS, AAR, UN Women Assembly, conferences, Islamic Studies',
                'category' => 'Leadership'
            ],

            // Mission and Vision
            [
                'question' => 'What is NSUK\'s mission?',
                'answer' => 'NSUK\'s mission is to provide a qualitative, innovative, and stimulating teaching, learning, and research environment. The university seeks to develop individuals\' full potential for efficient and selfless service to the state, nation, and humanity.',
                'keywords' => 'mission, teaching, learning, research, qualitative education, service',
                'category' => 'About NSUK'
            ],
            [
                'question' => 'What is NSUK\'s vision?',
                'answer' => 'NSUK is committed to offering a broad and balanced curriculum that prepares students for successful social and cultural lives. The university\'s motto "knowledge for development" reflects its dedication to advancing social, economic, and technological development.',
                'keywords' => 'vision, curriculum, knowledge for development, motto, social development',
                'category' => 'About NSUK'
            ],
            [
                'question' => 'What is NSUK\'s motto?',
                'answer' => 'NSUK\'s motto is "Knowledge for Development", which reflects the university\'s dedication to advancing social, economic, and technological development.',
                'keywords' => 'motto, knowledge for development, social development, economic development',
                'category' => 'About NSUK'
            ],

            // Location and Campuses
            [
                'question' => 'Where is NSUK located?',
                'answer' => 'NSUK has multiple campuses, with the main campus located in Keffi, Nasarawa State, Nigeria. Another significant campus is situated in Lafia, the state capital. Keffi is a traditional town in north-central Nigeria, known for its rich history and engagement in activities like tin and columbite mining and farming.',
                'keywords' => 'location, Keffi, Lafia, Nasarawa State, campuses, north-central Nigeria',
                'category' => 'Location'
            ],
            [
                'question' => 'How many campuses does NSUK have?',
                'answer' => 'NSUK has multiple campuses. The main campus is located in Keffi, and another significant campus is situated in Lafia, the state capital of Nasarawa State.',
                'keywords' => 'campuses, main campus, Keffi campus, Lafia campus',
                'category' => 'Location'
            ],

            // Academic Structure Overview
            [
                'question' => 'How many faculties does NSUK have?',
                'answer' => 'NSUK has a total of 11 Faculties offering diverse academic programs across various disciplines including Administration, Agriculture, Arts, Medicine & Health Sciences, Communication, Education, Engineering, Environmental Sciences, Law, Natural & Applied Sciences, and Social Sciences.',
                'keywords' => '11 faculties, academic structure, diverse programs',
                'category' => 'Academics'
            ],
            [
                'question' => 'How many departments does NSUK have?',
                'answer' => 'NSUK has a total of 60 Departments spread across its 11 Faculties, offering comprehensive academic programs in various fields of study.',
                'keywords' => '60 departments, academic departments, comprehensive programs',
                'category' => 'Academics'
            ],

            // Faculty of Administration
            [
                'question' => 'What departments are in the Faculty of Administration?',
                'answer' => 'The Faculty of Administration at NSUK comprises 8 departments: Accounting, Banking and Finance, Business Administration, Entrepreneurship Studies, Marketing, Public Administration, and Taxation.',
                'keywords' => 'Faculty of Administration, Accounting, Banking, Finance, Business Administration, Entrepreneurship, Marketing, Public Administration, Taxation',
                'category' => 'Faculties'
            ],

            // Faculty of Agriculture
            [
                'question' => 'What departments are in the Faculty of Agriculture?',
                'answer' => 'The Faculty of Agriculture at NSUK has 7 departments: Agricultural Economics and Extension, Agronomy (Crop and Soil Science), Animal Science, Aquaculture and Fisheries Management, Forestry Wildlife and Ecotourism, Home Science Management, and Nutrition and Dietetics.',
                'keywords' => 'Faculty of Agriculture, Agricultural Economics, Agronomy, Animal Science, Aquaculture, Forestry, Home Science, Nutrition, Dietetics',
                'category' => 'Faculties'
            ],

            // Faculty of Arts
            [
                'question' => 'What departments are in the Faculty of Arts?',
                'answer' => 'The Faculty of Arts at NSUK consists of 9 departments: Arabic Studies, English, French, Hausa, History, Islamic Studies, Linguistics, Philosophy and Religious Studies, and Theatre and Cultural Studies.',
                'keywords' => 'Faculty of Arts, Arabic Studies, English, French, Hausa, History, Islamic Studies, Linguistics, Philosophy, Theatre, Cultural Studies',
                'category' => 'Faculties'
            ],

            // College of Medicine & Health Sciences
            [
                'question' => 'What departments are in the College of Medicine & Health Sciences?',
                'answer' => 'The College of Medicine & Health Sciences at NSUK has 2 departments: Community Health Science and Health Information Management.',
                'keywords' => 'College of Medicine, Health Sciences, Community Health Science, Health Information Management',
                'category' => 'Faculties'
            ],

            // Faculty of Communication and Media Studies
            [
                'question' => 'What departments are in Communication and Media Studies?',
                'answer' => 'The Faculty of Communication and Media Studies at NSUK comprises 3 departments: Broadcasting, Journalism and Media Studies, and Public Relations.',
                'keywords' => 'Communication, Media Studies, Broadcasting, Journalism, Public Relations',
                'category' => 'Faculties'
            ],

            // Faculty of Education
            [
                'question' => 'What departments are in the Faculty of Education?',
                'answer' => 'The Faculty of Education at NSUK has 6 departments: Arts and Social Sciences, Educational Foundation, Educational Management, Guidance & Counselling, Science Technology and Mathematics, and Special Education.',
                'keywords' => 'Faculty of Education, Arts Social Sciences, Educational Foundation, Educational Management, Guidance Counselling, Science Technology Mathematics, Special Education',
                'category' => 'Faculties'
            ],

            // Faculty of Engineering
            [
                'question' => 'What departments are in the Faculty of Engineering?',
                'answer' => 'The Faculty of Engineering at NSUK consists of 3 departments: Civil Engineering, Chemical Engineering, and Electrical & Electronic Engineering.',
                'keywords' => 'Faculty of Engineering, Civil Engineering, Chemical Engineering, Electrical Engineering, Electronic Engineering',
                'category' => 'Faculties'
            ],

            // Faculty of Environmental Sciences
            [
                'question' => 'What departments are in the Faculty of Environmental Sciences?',
                'answer' => 'The Faculty of Environmental Sciences at NSUK has 4 departments: Architecture, Environmental Management, Geography, and Urban and Regional Planning.',
                'keywords' => 'Faculty of Environmental Sciences, Architecture, Environmental Management, Geography, Urban Planning, Regional Planning',
                'category' => 'Faculties'
            ],

            // Faculty of Law
            [
                'question' => 'What departments are in the Faculty of Law?',
                'answer' => 'The Faculty of Law at NSUK comprises 3 departments: Islamic Law and Jurisprudence, Public and International Law, and Private and Business Law.',
                'keywords' => 'Faculty of Law, Islamic Law, Jurisprudence, Public Law, International Law, Private Law, Business Law',
                'category' => 'Faculties'
            ],

            // Faculty of Natural and Applied Sciences
            [
                'question' => 'What departments are in the Faculty of Natural and Applied Sciences?',
                'answer' => 'The Faculty of Natural and Applied Sciences at NSUK has 11 departments: Biochemistry, Chemistry, Computer Science, Geology, Mathematics, Microbiology, Physics, Plant Science and Biotechnology, Science Laboratory Technology, Statistics, and Zoology.',
                'keywords' => 'Faculty of Natural Applied Sciences, Biochemistry, Chemistry, Computer Science, Geology, Mathematics, Microbiology, Physics, Plant Science, Biotechnology, Science Laboratory Technology, Statistics, Zoology',
                'category' => 'Faculties'
            ],

            // Faculty of Social Sciences
            [
                'question' => 'What departments are in the Faculty of Social Sciences?',
                'answer' => 'The Faculty of Social Sciences at NSUK consists of 5 departments: Economics, Mass Communication, Political Science, Psychology, and Sociology.',
                'keywords' => 'Faculty of Social Sciences, Economics, Mass Communication, Political Science, Psychology, Sociology',
                'category' => 'Faculties'
            ],

            // Computer Science Specific
            [
                'question' => 'Does NSUK have Computer Science?',
                'answer' => 'Yes! NSUK has a Department of Computer Science under the Faculty of Natural and Applied Sciences. The department offers comprehensive programs in computer science, programming, software development, and related technology fields.',
                'keywords' => 'Computer Science, programming, software development, technology, Natural Applied Sciences',
                'category' => 'Computer Science'
            ],
            [
                'question' => 'Which faculty is Computer Science under?',
                'answer' => 'The Department of Computer Science at NSUK is under the Faculty of Natural and Applied Sciences, alongside other science and technology departments.',
                'keywords' => 'Computer Science, Faculty of Natural Applied Sciences, science, technology',
                'category' => 'Computer Science'
            ],

            // General Academic Information
            [
                'question' => 'What programs does NSUK offer?',
                'answer' => 'NSUK offers a wide range of undergraduate and graduate programs across 11 faculties and 60 departments. These include programs in Administration, Agriculture, Arts, Medicine & Health Sciences, Communication, Education, Engineering, Environmental Sciences, Law, Natural & Applied Sciences, and Social Sciences.',
                'keywords' => 'programs, undergraduate, graduate, 11 faculties, 60 departments, diverse fields',
                'category' => 'Academics'
            ],

            // Student Life and Services
            [
                'question' => 'What student services does NSUK provide?',
                'answer' => 'NSUK offers various student services including orientation programs, student affairs divisions, and extracurricular activities aimed at enriching student life and fostering a supportive learning environment.',
                'keywords' => 'student services, orientation, student affairs, extracurricular activities, supportive environment',
                'category' => 'Student Life'
            ],

            // Recognition and Rankings
            [
                'question' => 'Is NSUK recognized?',
                'answer' => 'Yes, NSUK is recognized for its commitment to quality education and has been featured in various rankings, reflecting its growing reputation in the academic community. The university plays a crucial role in the local community by providing educational opportunities and contributing to regional development.',
                'keywords' => 'recognition, rankings, quality education, academic reputation, community development',
                'category' => 'Recognition'
            ],

            // Governance
            [
                'question' => 'How is NSUK governed?',
                'answer' => 'NSUK is governed by a senate and a governing body, with the vice-chancellor and senior members of the senate based at the Keffi campus.',
                'keywords' => 'governance, senate, governing body, vice-chancellor, Keffi campus',
                'category' => 'Administration'
            ],

            // General Information
            [
                'question' => 'Tell me about NSUK',
                'answer' => 'Nasarawa State University, Keffi (NSUK) is a prominent tertiary institution established in 2001 in Nasarawa State, Nigeria. With 11 faculties and 60 departments, NSUK offers diverse academic programs from undergraduate to graduate levels. The university is committed to providing quality education with its motto "Knowledge for Development" and is led by Prof. Sa\'adatu Hassan Liman, the first female Vice-Chancellor.',
                'keywords' => 'NSUK, Nasarawa State University, tertiary institution, 2001, 11 faculties, 60 departments, quality education, Knowledge for Development',
                'category' => 'About NSUK'
            ],
            [
                'question' => 'What makes NSUK special?',
                'answer' => 'NSUK is special for several reasons: it\'s the first state university in Nasarawa State, has the first female Vice-Chancellor (Prof. Sa\'adatu Hassan Liman), offers comprehensive programs across 11 faculties and 60 departments, maintains a strong commitment to quality education, and actively contributes to regional development. The university\'s motto "Knowledge for Development" reflects its dedication to societal advancement.',
                'keywords' => 'special, first state university, female Vice-Chancellor, comprehensive programs, quality education, regional development, societal advancement',
                'category' => 'About NSUK'
            ]
        ];

        foreach ($knowledgeData as $data) {
            NsukKnowledge::create($data);
        }
    }
}