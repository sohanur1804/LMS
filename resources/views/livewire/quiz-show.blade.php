<div>
    @foreach ($quiz->questions as $question)
        <div
            class="mb-4">
            <h4 class="font-bold">{{ $question->name }}</h4>
            <div class="flex">
                <div class="mr-2">
                    <input wire:model="answer" value="a,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_a-{{ $question->id }}" type="radio">
                    <label for="answer_a-{{ $question->id }}">{{ $question->answer_a }}</label>
                </div>

                <div class="mr-2">
                    <input wire:model="answer" value="b,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_b-{{ $question->id }}" type="radio">
                    <label for="answer_b-{{ $question->id }}">{{ $question->answer_b }}</label>
                </div>

                <div class="mr-2">
                    <input wire:model="answer" value="c,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_c-{{ $question->id }}" type="radio">
                    <label for="answer_c-{{ $question->id }}">{{ $question->answer_c }}</label>
                </div>

                <div class="mr-2">
                    <input wire:model="answer" value="d,{{ $question->id }}" wire:change.prevent="check"
                        id="answer_d-{{ $question->id }}" type="radio">
                    <label for="answer_d-{{ $question->id }}">{{ $question->answer_d }}</label>
                </div>
            </div>
        </div>
    @endforeach
</div>
