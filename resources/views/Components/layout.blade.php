<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body x-data="{ addManhwaModal: false, addReviewModal: false }" class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                        @auth
                            <x-nav-link href="/">Manhwas</x-nav-link>
                            <x-nav-link href="#" >My Collection</x-nav-link>
                            <button
                                @click="addManhwaModal = true"
                                class="text-gray-300 hover:bg-white/5 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            >
                                + Add Manhwa
                            </button>
                            <button
                                @click="addReviewModal = true"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg"
                            >
                                Thoughts?
                            </button>
                        @endauth
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest

                        @auth
                            <form method="Post" action="/logout">
                                @csrf
                                <x-form-button>Log Out</x-form-button>
                            </form>
                        @endauth
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="block md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                <a href="/" aria-current="page" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Manhwas</a>
                <a href="/jobs" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">My Collection</a>
                <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Add Manhwa</a>
            </div>
            <div class="border-t border-white/10 pt-4 pb-3">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img src="https://scontent.fmnl31-1.fna.fbcdn.net/v/t39.30808-6/369846941_7355702707778635_261329942025438108_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeHbCzHD0zQiSNGfXdEXQDI6jDFcds7kOI2MMVx2zuQ4jfPVrEO64zoS6jR3zANRE55aAIXVKy485tU-OSm_Cqkl&_nc_ohc=ftX0H26eHmwQ7kNvwFiWRw6&_nc_oc=AdmWWadlv0dCOrJu1NQU6yPtjmfX_YKwcVbcY9pFeHg_-NQV5eT5JtskMEjLoj7y4Ws&_nc_zt=23&_nc_ht=scontent.fmnl31-1.fna&_nc_gid=obXTZLPI9JDoEdtIJe9eqA&oh=00_AfdfJ4oyflyUL9NrMIlzSEfUCGm2XLiKMIobdDSx70RWqw&oe=6908FF50" alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">Akira Menudo</div>
                        <div class="text-sm font-medium text-gray-400">deangellovelarde@gmail.com</div>
                    </div>
                    <button type="button" class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </el-disclosure>
    </nav>

    <header class="relative bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>

@auth
<div
    x-show="addManhwaModal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
>
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl">

        <h2 class="text-xl font-bold mb-4">Add Manhwa</h2>

        <!-- FORM WILL GO HERE -->
        <form action="/manhwas" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form-field>
                <x-form-label for="cover_image"> Cover Image </x-form-label>
                <x-form-file name="cover_image" />
                <x-form-error name ="cover_image" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="title"> Title </x-form-label>
                <x-form-input
                    name="title" id="title" type="text" required />
                <x-form-error name="title" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="author"> Author </x-form-label>
                <x-form-input
                    name="author" id="author" type="text" required />
                <x-form-error name="author" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="description"> Description </x-form-label>
                <x-form-input
                    name="description" id="description" type="text" required />
                <x-form-error name="description" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="published_at"> Published At </x-form-label>
                <x-form-input
                    name="published_at" id="published_at" type="date" required />
                <x-form-error name="published_at" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="status"> Status</x-form-label>
                <x-form-select name="status" id="status" required>
                    <option value="">Select a status</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="finished">Finished</option>
                </x-form-select>
                <x-form-error name="status" />
            </x-form-field>

            <x-form-field>
                <x-form-label>Genre</x-form-label>

                @if(isset($genres))
                    <x-form-multiselect
                        name="genres"
                        :options="$genres"
                    />
                @endif
            </x-form-field>


            <div class="flex justify-between mt-6">
                <button
                    @click="addManhwaModal = false"
                    type="button"
                    class="px-4 py-2 bg-gray-300 rounded"
                >
                    Close
                </button>

                <x-form-button>
                    Save
                </x-form-button>
            </div>

        </form>

    </div>

</div>
@endauth

<div
    x-show="addReviewModal"
    x-cloak
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    @click.self="addReviewModal = false"
>
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">

        <h2 class="text-xl font-bold mb-4">Share Your Thoughts</h2>

        <!-- REVIEW FORM -->
        <form action="{{route('thoughts.store')}}" method="POST">
            @csrf

            <!-- Searchable Manhwa Select -->
            <x-form-field>
                <x-form-label for="manhwa_id">Manhwa <span class="text-red-500">*</span></x-form-label>

                <div x-data="{
                    search: '',
                    open: false,
                    selected: null,
                    manhwas: @js($manhwas ?? []),
                    get filteredManhwas() {
                        if (this.search === '') return this.manhwas;
                        return this.manhwas.filter(m =>
                            m.title.toLowerCase().includes(this.search.toLowerCase())
                        );
                    }
                }"
                     class="relative"
                     @click.away="open = false"
                >
                    <!-- Search Input -->
                    <input
                        type="text"
                        x-model="search"
                        @focus="open = true"
                        @input="open = true"
                        placeholder="Search for a manhwa..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />

                    <!-- Hidden input for form submission -->
                    <input type="hidden" name="manhwa_id" x-model="selected" required>

                    <!-- Dropdown List -->
                    <div
                        x-show="open && filteredManhwas.length > 0"
                        class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto"
                    >
                        <template x-for="manhwa in filteredManhwas" :key="manhwa.id">
                            <button
                                type="button"
                                @click="selected = manhwa.id; search = manhwa.title; open = false"
                                class="w-full px-4 py-3 text-left hover:bg-blue-50 border-b border-gray-100 last:border-b-0 flex items-center gap-3"
                                :class="{ 'bg-blue-100': selected === manhwa.id }"
                            >
                                <!-- Manhwa Cover Thumbnail -->
                                <img
                                    :src="'/storage/' + manhwa.cover_image"
                                    :alt="manhwa.title"
                                    class="w-10 h-14 object-cover rounded"
                                />

                                <!-- Manhwa Info -->
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800" x-text="manhwa.title"></div>
                                    <div class="text-sm text-gray-500" x-text="manhwa.author"></div>
                                </div>
                            </button>
                        </template>
                    </div>

                    <!-- No results message -->
                    <div
                        x-show="open && filteredManhwas.length === 0 && search !== ''"
                        class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg p-4 text-center text-gray-500"
                    >
                        No manhwa found matching "<span x-text="search"></span>"
                    </div>
                </div>

                <x-form-error name="manhwa_id" />
            </x-form-field>

            <!-- Rating Section -->
            <x-form-field>
                <x-form-label>Rating <span class="text-red-500">*</span></x-form-label>

                <div x-data="{ rating: 0, hoverRating: 0 }">
                    <!-- Star Rating -->
                    <div class="flex items-center gap-2 mb-2">
                        <template x-for="star in 10" :key="star">
                            <button
                                type="button"
                                @click="rating = star"
                                @mouseenter="hoverRating = star"
                                @mouseleave="hoverRating = 0"
                                class="text-3xl transition-all transform hover:scale-110 focus:outline-none"
                                :class="star <= (hoverRating || rating) ? 'text-yellow-400' : 'text-gray-300'"
                            >
                                ★
                            </button>
                        </template>
                    </div>

                    <!-- Rating Display -->
                    <div
                        class="text-sm font-semibold text-gray-700"
                        x-show="rating > 0"
                    >
                        <span x-text="rating"></span> out of 10 stars
                    </div>

                    <!-- Hidden input for rating -->
                    <input type="hidden" name="rating" x-model="rating" required>
                </div>

                <x-form-error name="rating" />
            </x-form-field>

            <!-- Review Text -->
            <x-form-field>
                <x-form-label for="review">Your Review <span class="text-red-500">*</span></x-form-label>
                <textarea
                    name="review"
                    id="review"
                    rows="6"
                    required
                    placeholder="Share your thoughts... What did you love? What could be better?"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                ></textarea>
                <p class="text-gray-500 text-xs mt-1">Minimum 10 characters</p>
                <x-form-error name="review" />
            </x-form-field>

            <!-- Spoiler Warning Checkbox -->
            <x-form-field>
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
            </x-form-field>

            <!-- Action Buttons -->
            <div class="flex justify-between mt-6">
                <button
                    @click="addReviewModal = false"
                    type="button"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition-colors"
                >
                    Cancel
                </button>

                <x-form-button>
                    Submit Review
                </x-form-button>
            </div>

        </form>

    </div>
</div>

</body>
</html>

