<div x-data="{ duration: '1_year' }">
    <!-- Toggle Switch for Plan Duration -->
    <div class="text-center mb-5">
        <span class="fw-bold">1 Year</span>
        <label class="form-switch">
            <input type="checkbox"
                   x-on:click="duration = (duration === '1_year') ? '2_year' : '1_year';"
                   class="form-check-input">
            <span class="slider round"></span>
        </label>
        <span class="fw-bold">2 Years</span>

    </div>
    <!-- Subscription Plans -->
    <div class="row justify-content-center">
        <!-- Basic Plan -->
        <div class="col-md-4 mb-4">
            <div class="card text-left ">
                <div class="card-body">
                    <template x-if="duration === '1_year'">
                        <div>
                            <h2 class="fw-bold">{{ $plans['1_year']['basic']['title'] }}</h2>
                            <p class="card-text display-3">$ {{ $plans['1_year']['basic']['price'] }}</p>

                            <ul class="list-group list-group-flush">
                                @foreach ($plans['1_year']['basic']['features'] as $feature)
                                    <li class="list-group-item"><i class="bx bx-check-circle"></i>{{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </template>
                    <template x-if="duration === '2_year'">
                        <div>
                            <h2 class="fw-bold">{{ $plans['2_year']['basic']['title'] }}</h2>
                            <p class="card-text display-3">$ {{ $plans['2_year']['basic']['price'] }}</p>
                            <ul class="list-group list-group-flush">
                                @foreach ($plans['2_year']['basic']['features'] as $feature)
                                    <li class="list-group-item"><i class="bx bx-check-circle"></i>{{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </template>
                    <form action="{{ route('subscription.subscribe') }}" method="POST" x-data>
                        @csrf
                        <input type="hidden" name="plan_name" value="basic">
                        <input type="hidden" name="duration" :value="duration">

                        <template x-if="duration === '1_year'">
                            <input type="hidden" name="price" value="{{ $plans['1_year']['basic']['price'] }}">
                        </template>
                        <template x-if="duration === '2_year'">
                            <input type="hidden" name="price" value="{{ $plans['2_year']['basic']['price'] }}">
                        </template>

                        <x-primary-button class="btn btn-primary d-grid w-100">
                            <div data-i18n="Analytics">Subscribe Now</div>
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
        <!-- Platinum Plan -->
        <div class="col-md-4 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <template x-if="duration === '1_year'">
                        <div>
                            <h2 class="fw-bold">{{ $plans['1_year']['platinum']['title'] }}</h2>
                            <p class="card-text display-3">$ {{ $plans['1_year']['platinum']['price'] }}</p>
                            <ul class="list-group list-group-flush">
                                @foreach ($plans['1_year']['platinum']['features'] as $feature)
                                    <li class="list-group-item"><i class="bx bx-check-circle"></i> <span
                                            class="ml-1">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </template>
                    <template x-if="duration === '2_year'">
                        <div>
                            <h2 class="fw-bold">{{ $plans['2_year']['platinum']['title'] }}</h2>
                            <p class="card-text display-3">$ {{ $plans['2_year']['platinum']['price'] }}</p>
                            <ul class="list-group list-group-flush">
                                @foreach ($plans['2_year']['platinum']['features'] as $feature)
                                    <li class="list-group-item"><i class="bx bx-check-circle"></i> <span
                                            class="ml-1">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </template>
                    <form action="{{ route('subscription.subscribe') }}" method="POST" x-data>
                        @csrf
                        <input type="hidden" name="plan_name" value="platinum">
                        <input type="hidden" name="duration" :value="duration">

                        <template x-if="duration === '1_year'">
                            <input type="hidden" name="price" value="{{ $plans['1_year']['platinum']['price'] }}">
                        </template>
                        <template x-if="duration === '2_year'">
                            <input type="hidden" name="price" value="{{ $plans['2_year']['platinum']['price'] }}">
                        </template>

                        <x-primary-button class="btn btn-primary d-grid w-100">
                            <div data-i18n="Analytics">Subscribe Now</div>
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
