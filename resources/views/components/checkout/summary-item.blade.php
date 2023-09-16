<div @class([
        "flex items-center justify-between",
        "border-t boder-white border-opacity-10 pt-6 text-white" => $isLast ?? false,
    ])>
    <dt class="text-primary-200">{{ $title }}</dt>
    <dd class="text-secondary-300">@money((int)$value)</dd>
</div>