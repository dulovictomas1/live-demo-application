<div class="section-item">

    <input type="hidden" name="sections[{{ $index }}][type]" value="txt_blok">

    <div class="pole">
        <input type="text" name="sections[{{ $index }}][title]" placeholder="Nadpis sekcie" value="{{ $section['title'] ?? '' }}">
    </div>

    <div class="pole">
        <textarea name="sections[{{ $index }}][content]" placeholder="Textový obsah sekcie">{{ $section['content'] ?? '' }}</textarea>
    </div>

    <button type="button" class="remove-section">
        Zmazať sekciu x
    </button>

</div>