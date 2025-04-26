<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h2 fw-bold text-dark m-0">
                    {{ __('Welcome,') }} {{ Auth::user()->name }}
                </h2>
                <p class="text-muted small mt-1 mb-0">
                    Manage your account, subscription, and explore new assessments.
                </p>
            </div>

            <div>
                <a href="{{ route('survey.create') }}" class="btn btn-primary btn-sm">
                    + New Assessment
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container">
        <div class="row">

            <!-- Plan Overview Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-dark mb-3">Subscription Overview</h5>

                            <div class="mb-3">
                                <h6 class="text-primary mb-1">Professional Plan</h6>
                                <p class="text-muted small mb-0">Access to premium features and unlimited
                                    assessments.</p>
                            </div>

                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Renews On:</span>
                                    <span class="fw-bold text-dark">November 30, 2024</span>
                                </li>
                                <li class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Last Payment:</span>
                                    <span class="fw-bold text-dark">$199.00</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span class="text-muted">Status:</span>
                                    <span class="badge bg-success">Active</span>
                                </li>
                            </ul>
                        </div>

                        <div class="text-center mt-auto">
                            <a href="#" class="btn btn-outline-primary btn-sm w-100">
                                Manage Subscription
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="d-flex align-items-center justify-content-between p-3">
                        <div>
                            <h5 class="card-title text-dark mb-2">Congratulations 🎉</h5>
                            <p class="mb-3 text-muted small">
                                You have achieved <strong>72% more</strong> sales this week! Keep up the great work.
                            </p>
                            <a href="javascript:" class="btn btn-sm btn-primary">View Achievements</a>
                        </div>
                        <div class="text-end">
                            <img
                                src="../assets/img/illustrations/man-with-laptop-light.png"
                                alt="User Achievement"
                                height="120"
                            />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- You can also add more sections below like Usage Analytics, Notifications, Upcoming Payments etc. -->

    </div>
</x-app-layout>
