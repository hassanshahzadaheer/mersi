@php use Carbon\Carbon; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center px-3 mb-4">
            <!-- Left: Heading and Subheading -->
            <div>
                <h2 class="h2 fw-bold text-dark m-0">
                    Business Intake Evaluation
                </h2>
                <p class="text-muted small mt-1 mb-0">
                    Evaluation results for Organization <strong>{{ $businessProfile->company_name }}</strong> |
                    Submitted on {{ Carbon::parse($businessProfile->created_at)->format('F d, Y') }}
                </p>
            </div>

            <!-- Right: Back to Dashboard Button -->
            <div>
                <a href="{{ route('dashboard') }}"
                   class="btn btn-primary btn-sm">
                    ️Back to Dashboard
                </a>
            </div>
        </div>

    </x-slot>

    <div class="container mx-auto mt-6">
        <div class="card shadow-sm border-0 mb-4"
             style="background: linear-gradient(to bottom right, #ffffff, #f0f4f8);">
            <div class="card-body">
                <!-- Header -->
                <h3 class="h5 fw-bold text-dark mb-1">Overall Compliance Score</h3>
                <p class="text-muted small mb-4">Based on your business intake survey responses.</p>


                <!-- Compliance Percentage, Score, Status -->
                <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap">
                    <!-- Circle Score Badge -->

                    <div>
                        <div class="fw-bold h1 text-primary m-0">{{ number_format($compliancePercentage, 0) }}%
                        </div>
                        <small class="text-muted">Readiness</small>
                    </div>
                    <div class="">

                        <p class="me-3 mb-1">
                            Total Score:
                            <span class="fw-bold text-dark">{{ $totalScore }}</span>
                        </p>
                        <p class="me-3 mb-1">
                            Compliance Percentage:
                            <span class="fw-bold text-primary">{{ number_format($compliancePercentage, 2) }}%</span>
                        </p>
                        <p class="mb-1">
                            Final Status:
                            @if($compliancePercentage >= 80)
                                <span class="text-success fw-bold">Fully Compliant</span>
                            @elseif($compliancePercentage >= 50)
                                <span class="text-warning fw-bold">Partially Compliant</span>
                            @else
                                <span class="text-danger fw-bold">Non-Compliant</span>
                            @endif
                        </p>
                    </div>

                </div>

                <!-- Digital Readiness Scale -->
                <div>
                    <h6 class="text-muted text-uppercase small fw-semibold mb-2">Digital Readiness Scale</h6>

                    <!-- Labels Row -->
                    <div class="d-flex justify-content-between text-muted small mb-1">
                        <span>0%</span>
                        <span>Traditional</span>
                        <span>Digital Native</span>
                        <span>100%</span>
                    </div>

                    <!-- Progress Bar -->
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar
                    @if($compliancePercentage >= 80) bg-success
                    @elseif($compliancePercentage >= 50) bg-warning
                    @else bg-danger
                    @endif"
                             role="progressbar"
                             style="width: {{ $compliancePercentage }}%;"
                             aria-valuenow="{{ $compliancePercentage }}" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-2"></div>

        <div class="card mt-2">

            <div class="card-body justify-content-between align-items-center">
                <div class="table-responsive text-nowrap">

                    <div class="card shadow-sm border-0 mb-4">
                        @foreach($categoryData as $category => $data)
                            @php
                                $percentage = $data['percentage'];
                                $status = $data['status'];
                                $totalScore = $data['totalScore'];
                                $maxScore = $data['maxScore'];

                                if ($percentage >= 80) {
                                    $progressColor = 'bg-success';
                                    $recommendation = "Excellent performance! Focus on maintaining best practices, continual monitoring, and innovation to stay ahead.";
                                } elseif ($percentage >= 50) {
                                    $progressColor = 'bg-warning';
                                    $recommendation = "Good effort! Strengthen weak areas, conduct targeted training, and establish regular internal reviews to improve further.";
                                } else {
                                    $progressColor = 'bg-danger';
                                    $recommendation = "Needs immediate action! Reassess current processes, provide focused coaching, and implement corrective actions to rebuild compliance.";
                                }
                            @endphp

                                <!-- Category Card -->
                            <div class="card mb-3 p-0 border rounded-lg shadow-md"
                            >
                                <div class="card-body">
                                    <!-- Header -->
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="fw-bold mb-0 text-black">{{ $category }}</h4>
                                        <div class="d-flex align-items-center gap-2">
                                            <span
                                                class="badge bg-light text-dark border">{{ $totalScore }} / {{ $maxScore }}</span>
                                            <span class="badge
                            {{ $percentage >= 80 ? 'bg-success' : ($percentage >= 50 ? 'bg-warning text-dark' : 'bg-danger') }}">
                            {{ $percentage }}%
                        </span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="progress mb-4" style="height: 4px; background-color: #e9ecef;">
                                        <div class="progress-bar {{ $progressColor }}" role="progressbar"
                                             style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>

                                    <!-- Status and Recommendation -->
                                    <div class="row">
                                        <!-- Status -->
                                        <div class="col-md-6 mb-3">
                                            <h6 class="text-uppercase text-muted small mb-2">Current Status</h6>
                                            <div class="d-flex align-items-center gap-2">
                            <span class="d-inline-block rounded-circle {{ $progressColor }}"
                                  style="width: 10px; height: 10px;"></span>
                                                <span class="fw-medium">{{ $status }}</span>
                                            </div>
                                        </div>

                                        <!-- Recommendation -->
                                        <div class="col-md-6 mb-3">
                                            <h6 class="text-uppercase text-muted small mb-2">Recommended Action</h6>

                                            <p class="mb-0 small text-black lh-lg text-black text-wrap">
                                                {{ $recommendation }}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
