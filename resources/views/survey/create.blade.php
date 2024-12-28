<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Survey') }}
        </h2>
    </x-slot>

    <form novalidate="novalidate">
        <!-- General information -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <!-- General Information Section -->
                    <div class="row gy-3 mt-0">

                        <div class="col-12">
                            <h6>{{ __('General Information') }}</h6>
                            <hr class="mt-0">
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_name">{{ __('Company Name') }}</label>
                            <input id="company_name" name="company_name" type="text" class="form-control"
                                   placeholder="Enter company name" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_name'){{ $message }}@enderror</small>
                        </div>


                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="contact_person">{{ __('Contact Person') }}</label>
                            <input id="contact_person" name="contact_person" type="text" class="form-control"
                                   placeholder="Enter contact person's name" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('contact_person'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_website">{{ __('Company Website') }}</label>
                            <input id="company_website" name="company_website" type="text" class="form-control"
                                   placeholder="https://example.com" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_website'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_industry">{{ __('Company Industry') }}</label>
                            <input id="company_industry" name="company_industry" type="text" class="form-control"
                                   placeholder="Enter industry type (e.g., IT, Healthcare)" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_industry'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="service_request">{{ __('Service Request Type') }}</label>
                            <select id="service_request" name="service_request" class="form-control" required>
                                <option value="">{{ __('Select service request type') }}</option>
                                <option
                                    value="operations-optimization">{{ __(' Process/Operations Optimization') }}</option>
                                <option value="project-management">{{ __('Project Management') }}</option>
                                <option value="ISO-9001-2015">{{ __('ISO 9001: 2015') }}</option>
                                <option value="CMMI-for-service">{{ __('CMMI for Service (SVC)') }}</option>
                                <option value="CMMI-for-development">{{ __('CMMI for Development (DEV)') }}</option>
                                <option value="other">{{ __('Other') }}</option>
                            </select>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('service_request'){{ $message }}@enderror</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Survey from services -->
        <div class="col-12 mb-4">
            <div class="card overflow-auto" style="max-height: 500px;">
                <div class="card-body">
                    <!-- section heading -->
                    <div class="col-12">
                        <h6>{{ __('Business Intake Evaluation') }}</h6>
                        <hr class="mt-0">
                    </div>


                    <div class="row gy-3 mt-0">

                        <!----------------------------------- Question # 01 ------------------------------>
                        <!-- Organizational Purpose Section -->
                        <div class="col-12">
                            <h6><strong>01 - {{ __('Organizational Purpose') }}</strong></h6>
                        </div>
                        <!-- Organizational Purpose question -->

                        <div class="col-md-6">
                            <label
                                class="form-label">{{ __('What is your organization’s mission or purpose?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="organizational_purpose"
                                       id="best_products_services" value="best_products_services" required>
                                <label class="form-check-label" for="best_products_services">
                                    {{ __('Focused on delivering the best products/services') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="organizational_purpose"
                                       id="core_values_beyond_products" value="core_values_beyond_products" required>
                                <label class="form-check-label" for="core_values_beyond_products">
                                    {{ __('Focused on core values beyond products/services') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="organizational_purpose"
                                       id="positive_impact_ecosystem" value="positive_impact_ecosystem" required>
                                <label class="form-check-label" for="positive_impact_ecosystem">
                                    {{ __('Aims to positively impact our ecosystem (vendors, partners, employees)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="organizational_purpose"
                                       id="global_significance" value="global_significance" required>
                                <label class="form-check-label" for="global_significance">
                                    {{ __('Focused on delivering global significance and transformational change') }}
                                </label>
                            </div>
                        </div>

                        <!----------------------------------- End Question # 01 ------------------------------>

                        <!----------------------------------- Question # 2 ------------------------------>
                        <!-- Human Resources and Contracts Operations -->
                        <div class="col-12">
                            <h6><strong>02 - {{ __('Human Resources and Contracts Operations') }}</strong></h6>
                        </div>
                        <!-- Human Resources and Contracts related question -->
                        <div class="col-md-6 mt-0">

                            <label class="form-label">{{ __('How do you use employees vs contractors?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="employees_vs_contractors"
                                       id="full_time_employees" value="full_time_employees" required>
                                <label class="form-check-label" for="full_time_employees">
                                    {{ __('Only full-time employees') }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="employees_vs_contractors"
                                       id="mostly_full_time" value="mostly_full_time" required>
                                <label class="form-check-label" for="mostly_full_time">
                                    {{ __('Mostly full-time employees, with some contractors in non-critical areas (e.g., IT, events)') }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="employees_vs_contractors"
                                       id="some_contractors" value="some_contractors" required>
                                <label class="form-check-label" for="some_contractors">
                                    {{ __('Some contractors in key areas (e.g., Human Resource, operations)') }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="employees_vs_contractors"
                                       id="primarily_contractors" value="primarily_contractors" required>
                                <label class="form-check-label" for="primarily_contractors">
                                    {{ __('Primarily contractors, with a small core team') }}
                                </label>
                            </div>


                            <!-- is k andar form k question ay gay -->
                        </div>

                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('How do you use external resources for business functions?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_resources"
                                       id="mostly_internal" value="mostly_internal" required>
                                <label class="form-check-label" for="mostly_internal">
                                    {{ __('Mostly internal employees handle everything') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_resources"
                                       id="outsource_non_core" value="outsource_non_core" required>
                                <label class="form-check-label" for="outsource_non_core">
                                    {{ __('We outsource some non-core functions (e.g., accounting, IT)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_resources"
                                       id="outsource_important" value="outsource_important" required>
                                <label class="form-check-label" for="outsource_important">
                                    {{ __('We outsource important functions (e.g., manufacturing)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_resources"
                                       id="external_core" value="external_core" required>
                                <label class="form-check-label" for="external_core">
                                    {{ __('We rely on external resources even for core functions') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">{{ __('Do you own or rent your assets?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assets_ownership" id="own_assets"
                                       value="own_assets" required>
                                <label class="form-check-label" for="own_assets">
                                    {{ __('Own most assets (e.g., equipment, offices)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assets_ownership"
                                       id="access_on_demand" value="access_on_demand" required>
                                <label class="form-check-label" for="access_on_demand">
                                    {{ __('Access some assets on-demand (e.g., cloud services)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assets_ownership" id="on_demand_many"
                                       value="on_demand_many" required>
                                <label class="form-check-label" for="on_demand_many">
                                    {{ __('Use on-demand assets for many functions (e.g., shared office space)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assets_ownership"
                                       id="on_demand_critical" value="on_demand_critical" required>
                                <label class="form-check-label" for="on_demand_critical">
                                    {{ __('Use on-demand assets even for mission-critical areas (e.g., manufacturing)') }}
                                </label>
                            </div>
                        </div>
                        <!----------------------------------- End Question # 2 ------------------------------>

                        <!----------------------------------- Question # 3 ------------------------------>
                        <!-- Business Development Operations Section -->
                        <div class="col-12">
                            <h6><strong>03 - {{ __('Business Development Operations') }}</strong></h6>
                        </div>
                        <!-- Business Development Operations related question -->
                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('How do you manage your community (users, customers, partners)?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_management"
                                       id="little_interaction" value="little_interaction" required>
                                <label class="form-check-label" for="little_interaction">
                                    {{ __('Very little interaction, mostly passive (e.g., social media)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_management"
                                       id="gather_feedback" value="gather_feedback" required>
                                <label class="form-check-label" for="gather_feedback">
                                    {{ __('We gather feedback and insights from the community') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_management"
                                       id="actively_engage" value="actively_engage" required>
                                <label class="form-check-label" for="actively_engage">
                                    {{ __('We actively engage the community for outreach, support, and marketing') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_management"
                                       id="community_shapes_products" value="community_shapes_products" required>
                                <label class="form-check-label" for="community_shapes_products">
                                    {{ __('The community helps shape our products and decisions') }}
                                </label>
                            </div>

                            <!-- is k andar form k question ay gay -->
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">{{ __('How do you engage your community?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_engagement"
                                       id="customer_service" value="customer_service" required>
                                <label class="form-check-label" for="customer_service">
                                    {{ __('Only standard customer service (e.g., email, phone)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_engagement" id="one_way"
                                       value="one_way" required>
                                <label class="form-check-label" for="one_way">
                                    {{ __('We communicate one-way to the community (e.g., company website)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_engagement"
                                       id="community_platforms" value="community_platforms" required>
                                <label class="form-check-label" for="community_platforms">
                                    {{ __('We use platforms where the community communicates with each other (e.g., LinkedIn)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="community_engagement"
                                       id="peer_collaboration" value="peer_collaboration" required>
                                <label class="form-check-label" for="peer_collaboration">
                                    {{ __('We foster peer-to-peer collaboration within the community (e.g., forums, open source)') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">{{ __('Do you convert the public into your community?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="convert_public" id="pr_marketing"
                                       value="pr_marketing" required>
                                <label class="form-check-label" for="pr_marketing">
                                    {{ __('We use PR and traditional marketing') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="convert_public"
                                       id="social_media_awareness" value="social_media_awareness" required>
                                <label class="form-check-label" for="social_media_awareness">
                                    {{ __('We use social media to build awareness') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="convert_public" id="use_incentives"
                                       value="use_incentives" required>
                                <label class="form-check-label" for="use_incentives">
                                    {{ __('We use incentives (e.g., competitions, rewards) to engage the crowd') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="convert_public"
                                       id="natural_conversion" value="natural_conversion" required>
                                <label class="form-check-label" for="natural_conversion">
                                    {{ __('Our products are designed to naturally convert people into a community') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">{{ __('How do you use gamification or incentives?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gamification"
                                       id="internal_motivation" value="internal_motivation" required>
                                <label class="form-check-label" for="internal_motivation">
                                    {{ __('For internal motivation only (e.g., employee of the month)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gamification" id="simple_rewards"
                                       value="simple_rewards" required>
                                <label class="form-check-label" for="simple_rewards">
                                    {{ __('Simple rewards programs (e.g., loyalty points)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gamification"
                                       id="built_into_products" value="built_into_products" required>
                                <label class="form-check-label" for="built_into_products">
                                    {{ __('Built into our products and services (e.g., gamified apps)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gamification" id="drive_ideation"
                                       value="drive_ideation" required>
                                <label class="form-check-label" for="drive_ideation">
                                    {{ __('We use gamification to drive product development or ideation (e.g., crowdsourced solutions)') }}
                                </label>
                            </div>
                        </div>

                        <!----------------------------------- End Question # 3 ------------------------------>

                        <!----------------------------------- Question # 4 ------------------------------>
                        <!-- Marketing & Branding Operations Section -->
                        <div class="col-12">
                            <h6><strong>04 - {{ __('Marketing & Branding Operations') }}</strong></h6>
                        </div>
                        <!-- Marketing & Branding Operations related question -->
                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('Are your products/services based on information?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="product_information"
                                       id="physical_products" value="physical_products" required>
                                <label class="form-check-label" for="physical_products">
                                    {{ __('Physical products/services (e.g., retail stores, factories)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="product_information"
                                       id="physical_with_info_delivery" value="physical_with_info_delivery" required>
                                <label class="form-check-label" for="physical_with_info_delivery">
                                    {{ __('Physical products with information-based delivery (e.g., Amazon)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="product_information"
                                       id="physical_with_info_services" value="physical_with_info_services" required>
                                <label class="form-check-label" for="physical_with_info_services">
                                    {{ __('Physical products with revenue from information-based services (e.g., iPhone/Apps)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="product_information"
                                       id="info_based_products" value="info_based_products" required>
                                <label class="form-check-label" for="info_based_products">
                                    {{ __('Entirely information-based products/services (e.g., social media, streaming)') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('Do you use social features in your products/services?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_features"
                                       id="no_social_features" value="no_social_features" required>
                                <label class="form-check-label" for="no_social_features">
                                    {{ __('No social features in our products/services') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_features"
                                       id="social_links_added" value="social_links_added" required>
                                <label class="form-check-label" for="social_links_added">
                                    {{ __('Social features have been added on top of products (e.g., social media links)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_features"
                                       id="core_social_features" value="core_social_features" required>
                                <label class="form-check-label" for="core_social_features">
                                    {{ __('Social features are a core part of our offering (e.g., user reviews, collaborations)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_features"
                                       id="built_with_social_input" value="built_with_social_input" required>
                                <label class="form-check-label" for="built_with_social_input">
                                    {{ __('Our products/services are built through social input (e.g., user-generated content)') }}
                                </label>
                            </div>
                        </div>

                        <!----------------------------------- End Question # 4 ------------------------------>

                        <!----------------------------------- Question # 5 ------------------------------>
                        <!-- Data & Technology Section -->
                        <div class="col-12">
                            <h6><strong>05 - {{ __('Data & Technology') }}</strong></h6>
                        </div>
                        <!-- Data & Technology related question -->
                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('Do you use data or algorithms for decision-making?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_decision_making"
                                       id="no_data_analysis" value="no_data_analysis" required>
                                <label class="form-check-label" for="no_data_analysis">
                                    {{ __('We don’t use data analysis') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_decision_making"
                                       id="basic_data_analysis" value="basic_data_analysis" required>
                                <label class="form-check-label" for="basic_data_analysis">
                                    {{ __('We collect and analyze basic data (e.g., sales reports)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_decision_making"
                                       id="ml_decisions" value="ml_decisions" required>
                                <label class="form-check-label" for="ml_decisions">
                                    {{ __('We use machine learning to analyze data and make decisions') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_decision_making"
                                       id="algorithms_driven" value="algorithms_driven" required>
                                <label class="form-check-label" for="algorithms_driven">
                                    {{ __('Our products/services are driven by algorithms and machine learning') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('Do you share strategic data internally or externally?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_sharing" id="no_data_sharing"
                                       value="no_data_sharing" required>
                                <label class="form-check-label" for="no_data_sharing">
                                    {{ __('No data sharing') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_sharing" id="internal_sharing"
                                       value="internal_sharing" required>
                                <label class="form-check-label" for="internal_sharing">
                                    {{ __('Data is shared internally between departments') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_sharing" id="partner_sharing"
                                       value="partner_sharing" required>
                                <label class="form-check-label" for="partner_sharing">
                                    {{ __('We share some data with suppliers or partners') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="data_sharing" id="public_exposure"
                                       value="public_exposure" required>
                                <label class="form-check-label" for="public_exposure">
                                    {{ __('We expose some data to the public through various methods') }}
                                </label>
                            </div>
                        </div>

                        <!----------------------------------- End Question # 5 ------------------------------>

                        <!----------------------------------- Question # 6 ------------------------------>
                        <!-- Processes & Scalability Section -->
                        <div class="col-12">
                            <h6><strong>06 - {{ __('Processes & Scalability') }}</strong></h6>
                        </div>
                        <!-- Processes & Scalability related question -->
                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('How do you manage external factors (e.g., contractors, community, data, etc.)?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_management"
                                       id="no_management" value="no_management" required>
                                <label class="form-check-label" for="no_management">
                                    {{ __('We don’t manage external factors') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_management"
                                       id="dedicated_staff" value="dedicated_staff" required>
                                <label class="form-check-label" for="dedicated_staff">
                                    {{ __('We have dedicated staff to manage external resources') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_management"
                                       id="partial_automation" value="partial_automation" required>
                                <label class="form-check-label" for="partial_automation">
                                    {{ __('We automate processing for some external factors') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="external_management"
                                       id="full_automation" value="full_automation" required>
                                <label class="form-check-label" for="full_automation">
                                    {{ __('We automate processes for several external factors (e.g., crowdsourced data, external assets)') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">{{ __('How scalable are your key business processes?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="business_scalability"
                                       id="manual_processes" value="manual_processes" required>
                                <label class="form-check-label" for="manual_processes">
                                    {{ __('Traditional, manual processes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="business_scalability"
                                       id="repeatable_processes" value="repeatable_processes" required>
                                <label class="form-check-label" for="repeatable_processes">
                                    {{ __('Some processes are repeatable, but within the organization') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="business_scalability"
                                       id="external_scalability" value="external_scalability" required>
                                <label class="form-check-label" for="external_scalability">
                                    {{ __('Some processes are scalable outside the organization (e.g., franchises)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="business_scalability"
                                       id="self_sustaining" value="self_sustaining" required>
                                <label class="form-check-label" for="self_sustaining">
                                    {{ __('Most processes are self-sustaining through scalable platforms (e.g., Airbnb, Uber)') }}
                                </label>
                            </div>
                        </div>

                        <!----------------------------------- End Question # 6 ------------------------------>

                        <!----------------------------------- Question # 7 ------------------------------>
                        <!-- Performance & Innovation Section -->
                        <div class="col-12">
                            <h6><strong>07 - {{ __('Performance & Innovation') }}</strong></h6>
                        </div>
                        <!-- Performance & Innovation related question -->

                        <div class="col-md-6 mt-0">
                            <label class="form-label">What metrics do you track for your business and
                                innovation?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metrics_tracking"
                                       id="traditional_metrics" value="traditional_metrics" required>
                                <label class="form-check-label" for="traditional_metrics">
                                    Traditional metrics (e.g., sales, profit)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metrics_tracking"
                                       id="transactional_metrics" value="transactional_metrics" required>
                                <label class="form-check-label" for="transactional_metrics">
                                    Basic transactional metrics (e.g., inventory, Enterprise Resource Planning data)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metrics_tracking" id="lean_metrics"
                                       value="lean_metrics" required>
                                <label class="form-check-label" for="lean_metrics">
                                    Lean metrics like customer engagement and product iterations
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metrics_tracking"
                                       id="lean_realtime_metrics" value="lean_realtime_metrics" required>
                                <label class="form-check-label" for="lean_realtime_metrics">
                                    Lean metrics combined with real-time data on user behavior and satisfaction
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">Do you use OKRs (Objectives and Key Results)?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="use_okrs" id="no_okrs"
                                       value="no_okrs" required>
                                <label class="form-check-label" for="no_okrs">
                                    No, we use traditional performance reviews
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="use_okrs" id="okrs_in_specific_areas"
                                       value="okrs_in_specific_areas" required>
                                <label class="form-check-label" for="okrs_in_specific_areas">
                                    We use OKRs in specific areas like innovation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="use_okrs"
                                       id="okrs_across_organization" value="okrs_across_organization" required>
                                <label class="form-check-label" for="okrs_across_organization">
                                    OKRs are used across the organization
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="use_okrs" id="transparent_okrs"
                                       value="transparent_okrs" required>
                                <label class="form-check-label" for="transparent_okrs">
                                    OKRs are used with full transparency across the company
                                </label>
                            </div>
                        </div>

                        <!----------------------------------- End Question # 7 ------------------------------>


                        <!----------------------------------- Question # 8 ------------------------------>
                        <!-- Experimentation & Risk-Taking Section -->
                        <div class="col-12">
                            <h6><strong>08 - {{ __('Experimentation & Risk-Taking') }}</strong></h6>
                        </div>
                        <!-- Experimentation & Risk-Taking related question -->
                        <div class="col-md-6 mt-0">
                            <label
                                class="form-label">{{ __('Do you optimize processes through experimentation?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="process_experimentation"
                                       id="traditional_processes" value="traditional_processes" required>
                                <label class="form-check-label" for="traditional_processes">
                                    {{ __('We follow traditional business processes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="process_experimentation"
                                       id="customer_experimentation" value="customer_experimentation" required>
                                <label class="form-check-label" for="customer_experimentation">
                                    {{ __('We experiment in customer-facing areas (e.g., marketing)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="process_experimentation"
                                       id="product_experimentation" value="product_experimentation" required>
                                <label class="form-check-label" for="product_experimentation">
                                    {{ __('We apply experimentation to product development') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="process_experimentation"
                                       id="all_area_experimentation" value="all_area_experimentation" required>
                                <label class="form-check-label" for="all_area_experimentation">
                                    {{ __('We experiment in all areas, including human resources, sales, marketing, and legal/contracts group') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">{{ __('How do you handle failure and risk?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="failure_risk_handling"
                                       id="failure_not_acceptable" value="failure_not_acceptable" required>
                                <label class="form-check-label" for="failure_not_acceptable">
                                    {{ __('Failure is not acceptable') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="failure_risk_handling"
                                       id="risk_not_tracked" value="risk_not_tracked" required>
                                <label class="form-check-label" for="risk_not_tracked">
                                    {{ __('Risk-taking is allowed but not tracked') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="failure_risk_handling"
                                       id="measured_risk" value="measured_risk" required>
                                <label class="form-check-label" for="measured_risk">
                                    {{ __('We measure and manage risk in defined areas') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="failure_risk_handling"
                                       id="embraced_risk_failure" value="embraced_risk_failure" required>
                                <label class="form-check-label" for="embraced_risk_failure">
                                    {{ __('Risk-taking and failure are embraced and celebrated') }}
                                </label>
                            </div>
                        </div>


                        <!----------------------------------- End Question # 8 ------------------------------>


                        <!----------------------------------- Question # 9 ------------------------------>
                        <!-- Governance Section -->
                        <div class="col-12">
                            <h6><strong>09 - {{ __('Governance') }}</strong></h6>
                        </div>
                        <!-- Governance related question -->

                        <div class="col-md-6">
                            <label class="form-label">{{ __('How are teams structured in your organization?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="team_structure"
                                       id="traditional_hierarchy" value="traditional_hierarchy" required>
                                <label class="form-check-label" for="traditional_hierarchy">
                                    {{ __('Traditional hierarchy with siloed teams') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="team_structure"
                                       id="small_teams_edges" value="small_teams_edges" required>
                                <label class="form-check-label" for="small_teams_edges">
                                    {{ __('Small teams work at the edges of the organization') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="team_structure" id="small_teams_core"
                                       value="small_teams_core" required>
                                <label class="form-check-label" for="small_teams_core">
                                    {{ __('Small teams work within the core organization') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="team_structure"
                                       id="self_organizing_teams" value="self_organizing_teams" required>
                                <label class="form-check-label" for="self_organizing_teams">
                                    {{ __('Small, self-organizing teams are the main structure') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ __('How decentralized is decision-making?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="decision_making" id="top_down"
                                       value="top_down" required>
                                <label class="form-check-label" for="top_down">
                                    {{ __('Top-down, centralized decision-making') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="decision_making"
                                       id="specific_area_decisions" value="specific_area_decisions" required>
                                <label class="form-check-label" for="specific_area_decisions">
                                    {{ __('Decentralized decisions in specific areas like Research & Development') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="decision_making"
                                       id="customer_area_decisions" value="customer_area_decisions" required>
                                <label class="form-check-label" for="customer_area_decisions">
                                    {{ __('Decentralized decisions in customer-facing areas') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="decision_making"
                                       id="all_decisions_decentralized" value="all_decisions_decentralized" required>
                                <label class="form-check-label" for="all_decisions_decentralized">
                                    {{ __('All key decisions are decentralized') }}
                                </label>
                            </div>
                        </div>


                        <!----------------------------------- End Question # 9 ------------------------------>


                        <!----------------------------------- Question # 10 ------------------------------>
                        <!-- Social Technologies & Collaboration -->
                        <div class="col-12">
                            <h6><strong>10 - {{ __('Social Technologies & Collaboration') }}</strong></h6>
                        </div>
                        <!-- Social Technologies related question -->
                        <div class="col-md-6">
                            <label
                                class="form-label">{{ __('Do you use social tools for collaboration and communication?') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_tools" id="email_only"
                                       value="email_only" required>
                                <label class="form-check-label" for="email_only">
                                    {{ __('We rely on email for communication') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_tools"
                                       id="some_teams_social_tools" value="some_teams_social_tools" required>
                                <label class="form-check-label" for="some_teams_social_tools">
                                    {{ __('Some teams use social tools (e.g., Slack, Teams)') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_tools"
                                       id="most_teams_social_tools" value="most_teams_social_tools" required>
                                <label class="form-check-label" for="most_teams_social_tools">
                                    {{ __('Most teams use social tools for collaboration') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social_tools"
                                       id="mandatory_social_tools" value="mandatory_social_tools" required>
                                <label class="form-check-label" for="mandatory_social_tools">
                                    {{ __('Social tools are mandatory across the organization') }}
                                </label>
                            </div>
                        </div>
                        <!----------------------------------- End Question # 10 ------------------------------>

                    </div>

                </div>

            </div>
        </div>

        {{--action buttons--}}
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Instruction Text -->
                    <p class="mb-0">You can save your progress to resume later or submit your responses to finalize the
                        survey.</p>

                    <!-- Buttons Group -->
                    <div>
                        <button type="button" class="btn btn-secondary me-2" id="save-progress">
                            Save Progress
                        </button>
                        <button type="submit" class="btn btn-primary" id="submit-survey">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</x-app-layout>
