@pushonce('filament-scripts:key-value-component')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js" integrity="sha512-5x7t0fTAVo9dpfbp3WtE2N6bfipUwk7siViWncdDoSz2KwOqVC1N9fDxEOzk0vTThOua/mglfF8NO7uVDLRC8Q==" crossorigin="anonymous"></script>

    <script>
        function keyValue(config) {
            return {
                canAddRows: config.canAddRows,

                canDeleteRows: config.canDeleteRows,

                isSortable: config.isSortable,

                rows: [{ key: null, value: null }],

                sortable: null,

                value: config.value,

                init: function () {
                    if (! this.value) {
                        this.value = {}
                    }

                    if (this.value && Object.keys(this.value).length > 0) {
                        this.rows = []

                        Object.entries(this.value).forEach(([key, value]) => {
                            this.rows.push({ key, value })
                        })
                    }

                    this.$watch('value', (newValues) => {
                        if (newValues && typeof newValues === 'object') {
                            let index = 0

                            for (const [key, value] of Object.entries(newValues)) {
                                if (typeof this.rows['index'] === 'undefined') {
                                    this.rows[index] = { key, value }
                                } else {
                                    this.rows[index].key = key
                                    this.rows[index].value = value
                                }

                                index++
                            }
                        }
                    })

                    if (this.isSortable) {
                        this.sortable = new Sortable(this.$refs.tableBody, {
                            handle: '[data-sort-handle]',
                            animation: 250,
                            onSort: ($event) => {
                                this.moveRow($event.oldIndex, $event.newIndex)
                            }
                        })
                    }
                },

                addRow: function () {
                    if (! this.canAddRows) return

                    this.rows.push({ key: '', value: '' })
                },

                deleteRow: function (index) {
                    if (! this.canDeleteRows) return

                    this.rows.splice(index, 1)

                    if (this.rows.length <= 0) {
                        this.addRow()
                    }

                    this.updateLivewire()
                },

                moveRow: function (from, to) {
                    if (! this.isSortable) return

                    this.rows.splice(to, 0, this.rows.splice(from, 1)[0])

                    this.updateLivewire()
                },

                shouldShowDeleteButton: function () {
                    if (this.rows.length > 1) return true

                    return this.canDeleteRows && this.rows.length > 0 && !!this.rows[0].key
                },

                updateKey: function (index, key) {
                    this.rows[index].key = key

                    this.updateLivewire()
                },

                updateValue: function (index, value) {
                    this.rows[index].value = value

                    this.updateLivewire()
                },

                updateLivewire: function (index = null) {
                    const rows = this.rows.reduce((accum, { key, value }) => {
                        if (! key) return accum

                        accum[key] = value

                        return accum
                    }, {})

                    this.value = rows
                },
            }
        }
    </script>
@endpushonce

<x-forms::field-group
    :column-span="$formComponent->getColumnSpan()"
    :error-key="$formComponent->getName()"
    :for="$formComponent->getId()"
    :help-message="$formComponent->getHelpMessage()"
    :hint="$formComponent->getHint()"
    :label="$formComponent->getLabel()"
    :required="$formComponent->isRequired()"
>
    <div x-data="keyValue({
        canAddRows: {{ json_encode($formComponent->canAddRows()) }},
        canDeleteRows: {{ json_encode($formComponent->canDeleteRows()) }},
        isSortable: {{ json_encode($formComponent->isSortable()) }},
        name: {{ json_encode($formComponent->getName()) }},
        @if (Str::of($formComponent->getBindingAttribute())->startsWith('wire:model'))
            value: @entangle($formComponent->getName()){{ Str::of($formComponent->getBindingAttribute())->after('wire:model') }},
        @endif
    })"
        x-init="init"
        class="space-y-4"
        {!! Filament\format_attributes($formComponent->getExtraAttributes()) !!}
    >
        <div class="overflow-x-auto bg-white border border-gray-300 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-200">
                    <tr class="divide-x divide-gray-300">
                        @if($formComponent->isSortable() && $formComponent->getSortButtonLabel())
                            <th scope="col" x-show="isSortable">
                                <span class="sr-only">{{ __($formComponent->getSortButtonLabel()) }}</span>
                            </th>
                        @endif

                        <th class="px-6 py-3 text-left text-gray-600" scope="col">
                            <span class="text-xs font-medium tracking-wider uppercase">
                                {{ __($formComponent->getKeyLabel()) }}
                            </span>
                        </th>
                        <th class="px-6 py-3 text-left text-gray-600" scope="col">
                            <span class="text-xs font-medium tracking-wider uppercase">
                                {{ __($formComponent->getValueLabel()) }}
                            </span>
                        </th>

                        @if ($formComponent->canDeleteRows() && $formComponent->getDeleteButtonLabel())
                            <th scope="col" x-show="shouldShowDeleteButton()">
                                <span class="sr-only">{{ __($formComponent->getDeleteButtonLabel()) }}</span>
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-sm leading-tight divide-y divide-gray-200" x-ref="tableBody" wire:ignore>
                    <template x-for="(row, index, collection) in rows" x-bind:key="row.key">
                        <tr
                            x-bind:class="{ 'bg-gray-50': index % 2 }"
                            @if ($formComponent->isSortable())
                                x-bind:data-sort-index="index"
                                draggable="true"
                            @endif
                        >
                            @if ($formComponent->isSortable())
                                <td x-show="isSortable" class="w-10 border-r border-gray-300 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <button class="text-gray-600 hover:text-gray-800" data-sort-handle>
                                            <x-heroicon-o-menu-alt-4 class="w-4 h-4" />
                                        </button>
                                    </div>
                                </td>
                            @endif
                            <td class="border-r border-gray-300 whitespace-nowrap">
                                <input
                                    type="text"
                                    placeholder="{{ __($formComponent->getKeyPlaceholder()) }}"
                                    class="w-full px-6 py-4 font-mono text-sm placeholder-gray-400 placeholder-opacity-100 bg-transparent border-0 focus:placeholder-gray-500 focus:border-1 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    x-bind:value="rows[index].key"
                                    x-on:change="updateKey(index, $event.target.value)"
                                    @unless ($formComponent->canEditKeys())
                                        disabled
                                    @endunless
                                >
                            </td>
                            <td class="whitespace-nowrap">
                                <input
                                    type="text"
                                    placeholder="{{ __($formComponent->getValuePlaceholder()) }}"
                                    class="w-full px-6 py-4 font-mono text-sm placeholder-gray-400 placeholder-opacity-100 bg-transparent border-0 focus:placeholder-gray-500 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    x-bind:value="rows[index].value"
                                    x-on:change="updateValue(index, $event.target.value)"
                                >
                            </td>
                            @if ($formComponent->canDeleteRows())
                                <td x-show="shouldShowDeleteButton()" class="w-10 border-l border-gray-300 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <button
                                            type="button"
                                            x-on:click="deleteRow(index)"
                                            title="{{ __($formComponent->getDeleteButtonLabel()) }}"
                                            class="text-danger-600 hover:text-danger-700"
                                        >
                                            <x-heroicon-o-trash class="w-4 h-4" />
                                        </button>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        @if ($formComponent->canAddRows())
            <div>
                <x-filament::button
                    type="button"
                    x-on:click="addRow"
                >
                    {{ __($formComponent->getAddButtonLabel()) }}
                </x-filament::button>
            </div>
        @endif
    </div>
</x-forms::field-group>
