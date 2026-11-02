@php($errorKey = 'answers.'.$key)
@if($question['type'] === 'multi')
<fieldset aria-describedby="error-{{ $key }}"><legend class="font-medium text-lg mb-2">{{ $question['label'] }}{{ $question['optional'] ? ' (opcionalno)' : ' (obavezno)' }}</legend>
<div class="grid sm:grid-cols-2 gap-3">
@foreach($question['options'] as $option)
@php($optionId = 'answer-'.$service.'-'.$key.'-'.$loop->index)
<label for="{{ $optionId }}" wire:key="{{ $optionId }}" class="flex gap-3 bg-secondary p-3 rounded-xl focus-within:ring-2 focus-within:ring-primary"><input id="{{ $optionId }}" type="checkbox" wire:model="answers.{{ $key }}" value="{{ $option }}" aria-describedby="error-{{ $key }}" aria-invalid="{{ $errors->has($errorKey) || $errors->has($errorKey.'.*') ? 'true' : 'false' }}" class="mt-1">{{ $option }}</label>
@endforeach
</div></fieldset>
@else
<label for="answer-{{ $key }}" class="block font-medium text-lg mb-2">{{ $question['label'] }}{{ $question['optional'] ? ' (opcionalno)' : ' (obavezno)' }}</label>
@if($question['type'] === 'select')
<select id="answer-{{ $key }}" wire:model.live="answers.{{ $key }}" aria-describedby="error-{{ $key }}" aria-invalid="{{ $errors->has($errorKey) ? 'true' : 'false' }}" class="w-full bg-secondary p-3 rounded-xl focus:ring-2 focus:ring-primary">
<option value="">Odaberite odgovor</option>
@foreach($question['options'] as $option)<option value="{{ $option }}">{{ $option }}</option>@endforeach
</select>
@elseif($question['type'] === 'textarea')
<textarea id="answer-{{ $key }}" wire:model="answers.{{ $key }}" rows="4" maxlength="4000" aria-describedby="error-{{ $key }}" aria-invalid="{{ $errors->has($errorKey) ? 'true' : 'false' }}" class="w-full bg-secondary p-3 rounded-xl focus:ring-2 focus:ring-primary"></textarea>
@else
<input id="answer-{{ $key }}" type="{{ $question['type'] }}" wire:model="answers.{{ $key }}" maxlength="500" aria-describedby="error-{{ $key }}" aria-invalid="{{ $errors->has($errorKey) ? 'true' : 'false' }}" class="w-full bg-secondary p-3 rounded-xl focus:ring-2 focus:ring-primary">
@endif
@endif
@if($errors->has($errorKey) || $errors->has($errorKey.'.*'))
<div id="error-{{ $key }}" role="alert" tabindex="-1" class="text-red-700">
    @error($errorKey)<p>{{ $message }}</p>@enderror
    @error($errorKey.'.*')<p>{{ $message }}</p>@enderror
</div>
@endif
