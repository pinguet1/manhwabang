<!--
=================================================================
FILE: resources/views/components/review-modal.blade.php
=================================================================
This is your Blade component file
-->

@props(['manhwaId', 'manhwaTitle'])

<!-- Review Modal -->
<div
    x-data="{
        open: false,
        manhwaId: {{ $manhwaId }},
        manhwaTitle: '{{ $manhwaTitle }}',
        rating: 0,
        hoverRating: 0
    }"
    @open-review-modal.window="
        open = true;
        manhwaId = $event.detail.manhwaId;
        manhwaTitle = $event.detail.manhwaTitle;
    "
    x-show="open"
    x-cloak
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    @click.self="open = false"
    style="display: none;"
>
    <!-- Modal Content -->
    <div
        class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 overflow-hidden"
        @click.stop
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
    >
        <form action="{{ route('thoughts.store') }}" method="POST">
            @csrf

            <!-- Hidden Input for Manhwa ID -->
            <input type="hidden" name="manhwa_id" x-model="manhwaId">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white">Share Your Thoughts</h2>
                    <p class="text-blue-100 text-sm mt-1" x-text="manhwaTitle"></p>
                </div>
                <button
                    type="button"
                    @click="open = false"
                    class="text-white hover:text-gray-200 transition-colors"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-6">

                <!-- Rating Section -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-3">
                        Your Rating <span class="text-red-500">*</span>
                    </label>

                    <!-- Star Rating -->
                    <div class="flex items-center gap-2">
                        <template x-for="star in 10" :key="star">
                            <button
                                type="button"
                                @click="rating = star"
                                @mouseenter="hoverRating = star"
                                @mouseleave="hoverRating = 0"
                                class="text-3xl transition-all transform hover:scale-110"
                                :class="star <= (hoverRating || rating) ? 'text-yellow-400' : 'text-gray-300'"
                            >
                                ★
                            </button>
                        </template>
                        <span
                            class="ml-3 text-lg font-semibold text-gray-700"
                            x-show="rating > 0"
                            x-text="rating + '/10'"
                        ></span>
                    </div>

                    <!-- Hidden input for rating -->
                    <input type="hidden" name="rating" x-model="rating" required>

                    @error('rating')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Review Text -->
                <div>
                    <label for="review" class="block text-gray-700 font-semibold mb-2">
                        Your Review <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        name="review"
                        id="review"
                        rows="6"
                        required
                        placeholder="Share your thoughts about this manhwa... What did you love? What could be better?"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                    ></textarea>
                    <p class="text-gray-500 text-sm mt-2">Minimum 10 characters</p>

                    @error('review')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Spoiler Warning Checkbox -->
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        name="is_spoiler"
                        id="is_spoiler"
                        value="1"
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    >
                    <label for="is_spoiler" class="ml-2 text-gray-700">
                        This review contains spoilers
                    </label>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3">
                <button
                    type="button"
                    @click="open = false"
                    class="px-6 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors font-medium"
                >
                    Submit Review
                </button>
            </div>

        </form>
    </div>
</div>
