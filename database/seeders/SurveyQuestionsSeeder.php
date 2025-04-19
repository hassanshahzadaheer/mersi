<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'category_id' => 1, // Organizational Purpose
                'text' => "What is your organization’s mission or purpose?",
                'options' => json_encode([
                    [
                        "text" => "Focused on delivering the best products/services",
                        "score" => 2.5,
                    ],
                    [
                        "text" => "Focused on core values beyond products/services",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Aims to positively impact our ecosystem (vendors, partners, employees)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Focused on delivering global significance and transformational change",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 2: Human Resources and Contracts Operations
            [
                'category_id' => 2,
                'text' => "How do you use employees vs contractors?",
                'options' => json_encode([
                    [
                        "text" => "Only full-time employees",
                        "score" => 4.0,
                    ],
                    [
                        "text" => "Mostly full-time employees, with some contractors in non-critical areas (e.g., IT, events)",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Some contractors in key areas (e.g., Human Resource, operations)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Primarily contractors, with a small core team",
                        "score" => 2.5,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'text' => "How do you use external resources for business functions?",
                'options' => json_encode([
                    [
                        "text" => "Mostly internal employees handle everything",
                        "score" => 4.5,
                    ],
                    [
                        "text" => "We outsource some non-core functions (e.g., accounting, IT)",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "We outsource important functions (e.g., manufacturing)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We rely on external resources even for core functions",
                        "score" => 2.5,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'text' => "Do you own or rent your assets?",
                'options' => json_encode([
                    [
                        "text" => "Own most assets (e.g., equipment, offices)",
                        "score" => 4.5,
                    ],
                    [
                        "text" => "Access some assets on-demand (e.g., cloud services)",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Use on-demand assets for many functions (e.g., shared office space)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Use on-demand assets even for mission-critical areas (e.g., manufacturing)",
                        "score" => 2.5,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 3: Business Development Operations
            [
                'category_id' => 3,
                'text' => "How do you manage your community (users, customers, partners)?",
                'options' => json_encode([
                    [
                        "text" => "Very little interaction, mostly passive (e.g., social media)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We gather feedback and insights from the community",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We actively engage the community for outreach, support, and marketing",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "The community helps shape our products and decisions",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'text' => "How do you engage your community?",
                'options' => json_encode([
                    [
                        "text" => "Only standard customer service (e.g., email, phone)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We communicate one-way to the community (e.g., company website)",
                        "score" => 2.5,
                    ],
                    [
                        "text" => "We use platforms where the community communicates with each other (e.g., LinkedIn)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We foster peer-to-peer collaboration within the community (e.g., forums, open source)",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'text' => "Do you convert the public into your community?",
                'options' => json_encode([
                    [
                        "text" => "We use PR and traditional marketing",
                        "score" => 2.5,
                    ],
                    [
                        "text" => "We use social media to build awareness",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We use incentives (e.g., competitions, rewards) to engage the crowd",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Our products are designed to naturally convert people into a community",
                        "score" => 4.0,
                    ]
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'text' => "How do you use gamification or incentives?",
                'options' => json_encode([
                    [
                        "text" => "For internal motivation only (e.g., employee of the month)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "Simple rewards programs (e.g., loyalty points)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Built into our products and services (e.g., gamified apps)",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "We use gamification to drive product development or ideation (e.g., crowdsourced solutions)",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 4: Marketing & Branding Operations
            [
                'category_id' => 4,
                'text' => "Are your products/services based on information?",
                'options' => json_encode([
                    [
                        "text" => "Physical products/services (e.g., retail stores, factories)",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Physical products with information-based delivery (e.g., Amazon)",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Physical products with revenue from information-based services (e.g., iPhone/Apps)",
                        "score" => 4.0,
                    ],
                    [
                        "text" => "Entirely information-based products/services (e.g., social media, streaming)",
                        "score" => 4.5,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 4,
                'text' => "Do you use social features in your products/services?",
                'options' => json_encode([
                    [
                        "text" => "No social features in our products/services",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Social features have been added on top of products (e.g., social media links)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "Social features are a core part of our offering (e.g., user reviews, collaborations)",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Our products/services are built through social input (e.g., user-generated content)",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Data & Technology
            [
                'category_id' => 5,
                'text' => "Do you use data or algorithms for decision-making?",
                'options' => json_encode([
                    [
                        "text" => "We don’t use data analysis",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "We collect and analyze basic data (e.g., sales reports)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We use machine learning to analyze data and make decisions",
                        "score" => 3.5,
                    ],
                    [
                        "text" => "Our products/services are driven by algorithms and machine learning",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 5,
                'text' => "Do you share strategic data internally or externally?",
                'options' => json_encode([
                    [
                        "text" => "No data sharing",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Data is shared internally between departments",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We share some data with suppliers or partners",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We expose some data to the public through various methods",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 6 - Processes & Scalability
            [
                'category_id' => 6,
                'text' => "How do you manage external factors (e.g., contractors, community, data, etc.)?",
                'options' => json_encode([
                    [
                        "text" => "We don’t manage external factors",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "We have dedicated staff to manage external resources",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We automate processing for some external factors",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We automate processes for several external factors (e.g., crowdsourced data, external assets)",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 6,
                'text' => "How scalable are your key business processes?",
                'options' => json_encode([
                    "Traditional, manual processes",
                    "Some processes are repeatable, but within the organization",
                    "Some processes are scalable outside the organization (e.g., franchises)",
                    "Most processes are self-sustaining through scalable platforms (e.g., Airbnb, Uber)"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 7 - Performance & Innovation
            [
                'category_id' => 7,
                'text' => "What metrics do you track for your business and innovation?",
                'options' => json_encode([
                    [
                        "text" => "Traditional metrics (e.g., sales, profit)",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Basic transactional metrics (e.g., inventory, Enterprise Resource Planning data)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "Lean metrics like customer engagement and product iterations",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Lean metrics combined with real-time data on user behavior and satisfaction",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 7,
                'text' => "Do you use OKRs (Objectives and Key Results)?",
                'options' => json_encode([
                    [
                        "text" => "No, we use traditional performance reviews",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "We use OKRs in specific areas like innovation",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "OKRs are used across the organization",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "OKRs are used with full transparency across the company",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 8 - Experimentation & Risk-Taking
            [
                'category_id' => 8,
                'text' => "Do you optimize processes through experimentation?",
                'options' => json_encode([
                    [
                        "text" => "We follow traditional business processes",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "We experiment in customer-facing areas (e.g., marketing)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We apply experimentation to product development",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "We experiment in all areas, including human resources, sales, marketing, and legal/contracts group",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 8,
                'text' => "How do you handle failure and risk?",
                'options' => json_encode([
                    [
                        "text" => "Failure is not acceptable",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Risk-taking is allowed but not tracked",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "We measure and manage risk in defined areas",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Risk-taking and failure are embraced and celebrated",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 9 - Governance
            [
                'category_id' => 9,
                'text' => "How are teams structured in your organization?",
                'options' => json_encode([
                    [
                        "text" => "Traditional hierarchy with siloed teams",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Small teams work at the edges of the organization",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "Small teams work within the core organization",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Small, self-organizing teams are the main structure",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 9,
                'text' => "How decentralized is decision-making?",
                'options' => json_encode([
                    [
                        "text" => "Top-down, centralized decision-making",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Decentralized decisions in specific areas like Research & Development",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "Decentralized decisions in customer-facing areas",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "All key decisions are decentralized",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 10 - Social Technologies & Collaboration
            [
                'category_id' => 10,
                'text' => "Do you use social tools for collaboration and communication?",
                'options' => json_encode([
                    [
                        "text" => "We rely on email for communication",
                        "score" => 1.0,
                    ],
                    [
                        "text" => "Some teams use social tools (e.g., Slack, Teams)",
                        "score" => 2.0,
                    ],
                    [
                        "text" => "Most teams use social tools for collaboration",
                        "score" => 3.0,
                    ],
                    [
                        "text" => "Social tools are mandatory across the organization",
                        "score" => 4.0,
                    ]
                ]),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];


        DB::table('survey_questions')->insert($questions);
    }
}
