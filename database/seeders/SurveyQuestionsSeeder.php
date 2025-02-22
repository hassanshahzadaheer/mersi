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
                    "Focused on delivering the best products/services",
                    "Focused on core values beyond products/services",
                    "Aims to positively impact our ecosystem (vendors, partners, employees)",
                    "Focused on delivering global significance and transformational change"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Category 2: Human Resources and Contracts Operations
            [
                'category_id' => 2,
                'text' => "How do you use employees vs contractors?",
                'options' => json_encode([
                    "Only full-time employees",
                    "Mostly full-time employees, with some contractors in non-critical areas (e.g., IT, events)",
                    "Some contractors in key areas (e.g., Human Resource, operations)",
                    "Primarily contractors, with a small core team"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'text' => "How do you use external resources for business functions?",
                'options' => json_encode([
                    "Mostly internal employees handle everything",
                    "We outsource some non-core functions (e.g., accounting, IT)",
                    "We outsource important functions (e.g., manufacturing)",
                    "We rely on external resources even for core functions"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'text' => "Do you own or rent your assets?",
                'options' => json_encode([
                    "Own most assets (e.g., equipment, offices)",
                    "Access some assets on-demand (e.g., cloud services)",
                    "Use on-demand assets for many functions (e.g., shared office space)",
                    "Use on-demand assets even for mission-critical areas (e.g., manufacturing)"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Category 3: Business Development Operations
            [
                'category_id' => 3,
                'text' => "How do you manage your community (users, customers, partners)?",
                'options' => json_encode([
                    "Very little interaction, mostly passive (e.g., social media)",
                    "We gather feedback and insights from the community",
                    "We actively engage the community for outreach, support, and marketing",
                    "The community helps shape our products and decisions"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'text' => "How do you engage your community?",
                'options' => json_encode([
                    "Only standard customer service (e.g., email, phone)",
                    "We communicate one-way to the community (e.g., company website)",
                    "We use platforms where the community communicates with each other (e.g., LinkedIn)",
                    "We foster peer-to-peer collaboration within the community (e.g., forums, open source)"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'text' => "Do you convert the public into your community?",
                'options' => json_encode([
                    "We use PR and traditional marketing",
                    "We use social media to build awareness",
                    "We use incentives (e.g., competitions, rewards) to engage the crowd",
                    "Our products are designed to naturally convert people into a community"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'text' => "How do you use gamification or incentives?",
                'options' => json_encode([
                    "For internal motivation only (e.g., employee of the month)",
                    "Simple rewards programs (e.g., loyalty points)",
                    "Built into our products and services (e.g., gamified apps)",
                    "We use gamification to drive product development or ideation (e.g., crowdsourced solutions)"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Category 4: Marketing & Branding Operations
            [
                'category_id' => 4,
                'text' => "Are your products/services based on information?",
                'options' => json_encode([
                    "Physical products/services (e.g., retail stores, factories)",
                    "Physical products with information-based delivery (e.g., Amazon)",
                    "Physical products with revenue from information-based services (e.g., iPhone/Apps)",
                    "Entirely information-based products/services (e.g., social media, streaming)"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 4,
                'text' => "Do you use social features in your products/services?",
                'options' => json_encode([
                    "No social features in our products/services",
                    "Social features have been added on top of products (e.g., social media links)",
                    "Social features are a core part of our offering (e.g., user reviews, collaborations)",
                    "Our products/services are built through social input (e.g., user-generated content)"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Data & Technology
            [
                'category_id' => 5,
                'text' => "Do you use data or algorithms for decision-making?",
                'options' => json_encode([
                    "We don’t use data analysis",
                    "We collect and analyze basic data (e.g., sales reports)",
                    "We use machine learning to analyze data and make decisions",
                    "Our products/services are driven by algorithms and machine learning"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 5,
                'text' => "Do you share strategic data internally or externally?",
                'options' => json_encode([
                    "No data sharing",
                    "Data is shared internally between departments",
                    "We share some data with suppliers or partners",
                    "We expose some data to the public through various methods"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 6 - Processes & Scalability
            [
                'category_id' => 6,
                'text' => "How do you manage external factors (e.g., contractors, community, data, etc.)?",
                'options' => json_encode([
                    "We don’t manage external factors",
                    "We have dedicated staff to manage external resources",
                    "We automate processing for some external factors",
                    "We automate processes for several external factors (e.g., crowdsourced data, external assets)"
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
                    "Traditional metrics (e.g., sales, profit)",
                    "Basic transactional metrics (e.g., inventory, Enterprise Resource Planning data)",
                    "Lean metrics like customer engagement and product iterations",
                    "Lean metrics combined with real-time data on user behavior and satisfaction"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 7,
                'text' => "Do you use OKRs (Objectives and Key Results)?",
                'options' => json_encode([
                    "No, we use traditional performance reviews",
                    "We use OKRs in specific areas like innovation",
                    "OKRs are used across the organization",
                    "OKRs are used with full transparency across the company"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 8 - Experimentation & Risk-Taking
            [
                'category_id' => 8,
                'text' => "Do you optimize processes through experimentation?",
                'options' => json_encode([
                    "We follow traditional business processes",
                    "We experiment in customer-facing areas (e.g., marketing)",
                    "We apply experimentation to product development",
                    "We experiment in all areas, including human resources, sales, marketing, and legal/contracts group"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 8,
                'text' => "How do you handle failure and risk?",
                'options' => json_encode([
                    "Failure is not acceptable",
                    "Risk-taking is allowed but not tracked",
                    "We measure and manage risk in defined areas",
                    "Risk-taking and failure are embraced and celebrated"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 9 - Governance
            [
                'category_id' => 9,
                'text' => "How are teams structured in your organization?",
                'options' => json_encode([
                    "Traditional hierarchy with siloed teams",
                    "Small teams work at the edges of the organization",
                    "Small teams work within the core organization",
                    "Small, self-organizing teams are the main structure"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 9,
                'text' => "How decentralized is decision-making?",
                'options' => json_encode([
                    "Top-down, centralized decision-making",
                    "Decentralized decisions in specific areas like Research & Development",
                    "Decentralized decisions in customer-facing areas",
                    "All key decisions are decentralized"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Category 10 - Social Technologies & Collaboration
            [
                'category_id' => 10,
                'text' => "Do you use social tools for collaboration and communication?",
                'options' => json_encode([
                    "We rely on email for communication",
                    "Some teams use social tools (e.g., Slack, Teams)",
                    "Most teams use social tools for collaboration",
                    "Social tools are mandatory across the organization"
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        DB::table('survey_questions')->insert($questions);
    }
}
