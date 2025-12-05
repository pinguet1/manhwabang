@props([
    'name',
    'options' => [],
])

<div
    x-data="multiselect({
        options: @js($options->toArray()),
    })"
    class="relative"
>

    <!-- CLICKABLE SELECT BOX -->
    <div
        @click="open = !open"
        class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 flex items-center justify-between cursor-pointer shadow-sm"
    >
        <div class="flex flex-wrap gap-1">

            <!-- Placeholder -->
            <template x-if="selected.length === 0">
                <span class="text-gray-400 text-sm">Select ...</span>
            </template>

            <!-- Selected badges -->
            <template x-for="(label, id) in labels" :key="id">
                <span
                    class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-medium"
                    x-text="label"
                ></span>
            </template>
        </div>

        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>

    <!-- DROPDOWN -->
    <div
        x-show="open"
        @click.outside="open = false"
        x-transition
        class="absolute z-50 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-hidden"
    >
        <!-- Search -->
        <div class="p-2 border-b bg-gray-50">
            <input
                type="text"
                class="w-full rounded-md border border-gray-300 px-2 py-1 text-sm"
                placeholder="Search..."
                x-model="search"
            >
        </div>

        <!-- Options list -->
        <div class="max-h-48 overflow-y-auto p-2">

            <template x-for="option in filtered" :key="option.id">
                <div
                    class="flex items-center justify-between px-2 py-1 rounded-md cursor-pointer hover:bg-gray-100"
                    @click="toggle(option.id, option.name)"
                >
                    <span class="text-sm text-gray-800" x-text="option.name"></span>

                    <template x-if="selected.includes(option.id)">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </template>
                </div>
            </template>

        </div>
    </div>

    <!-- Hidden Inputs sent to backend -->
    <template x-for="id in selected" :key="id">
        <input type="hidden" name="{{ $name }}[]" :value="id">
    </template>

</div>

<script>
    function multiselect({ options }) {
        return {
            open: false,
            search: '',
            selected: [],   // stores IDs
            labels: {},     // id => label
            options: options,

            toggle(id, label) {
                if (this.selected.includes(id)) {
                    this.selected = this.selected.filter(x => x !== id);
                    delete this.labels[id];
                } else {
                    this.selected.push(id);
                    this.labels[id] = label;
                }
            },

            get filtered() {
                if (this.search === '') return this.options;

                return this.options.filter(o =>
                    o.name.toLowerCase().includes(this.search.toLowerCase())
                );
            }
        };
    }
</script>

