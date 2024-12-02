<div>
    <div class="flex items-center flex-col">
        {{-- {{ $infolist }} --}}
        <strong>Visi:</strong>
        <div class="text-center">
            {!! $caketum->visi !!}
        </div>
        <br />
        <strong>Misi:</strong>
        <div class="text-justify">
            {!! $caketum->misi !!}
        </div>
    </div>
    {{-- {{ $infolist->render() }} --}}
</div>
