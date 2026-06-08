<div class="section-item">    

    <input type="hidden" name="sections[{{ $index }}][type]" value="half_blok">    

    <div class="hlaf-wrapper">
        <div class="half">

            <div class="pole">
                <input type="text" name="sections[{{ $index }}][left_title]" placeholder="Nadpis bloku 1" value="{{ $section['left_title'] ?? '' }}">
            </div>

            <div class="pole">
                <textarea name="sections[{{ $index }}][left_content]" placeholder="Textový obsah">{{ $section['left_title'] ?? '' }}</textarea>
            </div>

        </div>

        <div class="half">

            <div class="pole">
                <input type="text" name="sections[{{ $index }}][right_title]" placeholder="Nadpis bloku 2" value="{{ $section['right_title'] ?? '' }}">
            </div>

            <div class="pole">
                <textarea name="sections[{{ $index }}][right_content]" placeholder="Textový obsah">{{ $section['right_content'] ?? '' }}</textarea>
            </div>

        </div>
    </div>

    <button type="button" class="remove-section">
        Zmazať sekciu x
    </button>
</div>