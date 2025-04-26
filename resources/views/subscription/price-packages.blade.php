<div x-data="{ duration: '1_year' }" class="container py-5">
    <!-- Toggle -->
    <div class="d-flex justify-content-center align-items-center mb-5 gap-3">
        <span :class="duration === '1_year' ? 'fw-bold text-primary' : 'text-muted'">1 Year</span>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="planToggle"
                   @change="duration = duration === '1_year' ? '2_year' : '1_year'">
        </div>

        <span :class="duration === '2_year' ? 'fw-bold text-primary' : 'text-muted'">2 Years</span>
    </div>

    <!-- Plans -->
    <div class="row justify-content-center g-4">

        <!-- Basic Plan -->
        <div class="col-md-5 col-lg-4">
            <div class="card plan-card text-center p-4 shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column">

                    <!-- Title and Price -->
                    <div class="mb-4">
                        <h4 class="mb-2 text-primary"
                            x-text="duration === '1_year' ? '{{ $plans['1_year']['basic']['title'] }}' : '{{ $plans['2_year']['basic']['title'] }}'"></h4>
                        <h1 class="display-5 fw-bold">
                            $<span
                                x-text="duration === '1_year' ? '{{ $plans['1_year']['basic']['price'] }}' : '{{ $plans['2_year']['basic']['price'] }}'"></span>
                        </h1>
                        <p class="text-muted small" x-text="duration === '1_year' ? 'per year' : 'for 2 years'"></p>
                    </div>

                    <!-- Features -->
                    <ul class="list-unstyled text-start mb-5">
                        <template x-if="duration === '1_year'">
                            <div>
                                @foreach ($plans['1_year']['basic']['features'] as $feature)
                                    <li class="mb-3"><i class="bx bx-check-circle text-success me-2"></i> {{ $feature }}
                                    </li>
                                @endforeach
                            </div>
                        </template>
                        <template x-if="duration === '2_year'">
                            <div>
                                @foreach ($plans['2_year']['basic']['features'] as $feature)
                                    <li class="mb-3"><i class="bx bx-check-circle text-success me-2"></i> {{ $feature }}
                                    </li>
                                @endforeach
                            </div>
                        </template>
                    </ul>

                    <!-- Button -->
                    <form action="{{ route('subscription.subscribe') }}" method="POST" class="mt-auto">
                        @csrf
                        <input type="hidden" name="plan_name" value="basic">
                        <input type="hidden" name="duration" :value="duration">
                        <input type="hidden" name="price"
                               :value="duration === '1_year' ? '{{ $plans['1_year']['basic']['price'] }}' : '{{ $plans['2_year']['basic']['price'] }}'">

                        <button type="submit" class="btn btn-outline-primary w-100 rounded-pill">
                            Get Started
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <!-- Platinum Plan -->
        <div class="col-md-5 col-lg-4">
            <div class="card plan-card text-center p-4 shadow-sm border-primary h-100 position-relative">

                <div class="badge bg-primary position-absolute top-0 end-0 m-3">Popular</div>

                <div class="card-body d-flex flex-column">

                    <!-- Title and Price -->
                    <div class="mb-4">
                        <h4 class="mb-2 text-primary"
                            x-text="duration === '1_year' ? '{{ $plans['1_year']['platinum']['title'] }}' : '{{ $plans['2_year']['platinum']['title'] }}'"></h4>
                        <h1 class="display-5 fw-bold">
                            $<span
                                x-text="duration === '1_year' ? '{{ $plans['1_year']['platinum']['price'] }}' : '{{ $plans['2_year']['platinum']['price'] }}'"></span>
                        </h1>
                        <p class="text-muted small" x-text="duration === '1_year' ? 'per year' : 'for 2 years'"></p>
                    </div>

                    <!-- Features -->
                    <ul class="list-unstyled text-start mb-5">
                        <template x-if="duration === '1_year'">
                            <div>
                                @foreach ($plans['1_year']['platinum']['features'] as $feature)
                                    <li class="mb-3"><i class="bx bx-check-circle text-success me-2"></i> {{ $feature }}
                                    </li>
                                @endforeach
                            </div>
                        </template>
                        <template x-if="duration === '2_year'">
                            <div>
                                @foreach ($plans['2_year']['platinum']['features'] as $feature)
                                    <li class="mb-3"><i class="bx bx-check-circle text-success me-2"></i> {{ $feature }}
                                    </li>
                                @endforeach
                            </div>
                        </template>
                    </ul>

                    <!-- Button -->
                    <form action="{{ route('subscription.subscribe') }}" method="POST" class="mt-auto">
                        @csrf
                        <input type="hidden" name="plan_name" value="platinum">
                        <input type="hidden" name="duration" :value="duration">
                        <input type="hidden" name="price"
                               :value="duration === '1_year' ? '{{ $plans['1_year']['platinum']['price'] }}' : '{{ $plans['2_year']['platinum']['price'] }}'">

                        <button type="submit" class="btn btn-primary w-100 rounded-pill">
                            Upgrade Now
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modern Styles -->
<style>
    .plan-card {
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .plan-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    }

    .badge {
        font-size: 0.75rem;
        padding: 6px 12px;
        border-radius: 50px;
    }
</style>
