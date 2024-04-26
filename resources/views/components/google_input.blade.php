<div class="bg-white rounded-sm">
    <div class="relative bg-inherit">
        @if($isTextArea)
            <textarea
                type="{{ $type ?? 'text' }}"
                name="{{ $name }}"
                onchange="{{ $onChanged }}"
                value="{{ $value }}"
                class="{{ $classString }}"
                placeholder="{{ $placeholder }}"
            ></textarea>
        @else
            <input
                type="{{ $type ?? 'text' }}"
                name="{{ $name }}"
                onchange="{{ $onChanged }}"
                value="{{ $value }}"
                class="{{ $classString }}"
                placeholder="{{ $placeholder }}"
            />
        @endif

        <label
            class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 {{ $bg ?? 'bg-inherit' }} mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all"
        >
            {{ $placeholder }}
        </label>
    </div>
</div>
